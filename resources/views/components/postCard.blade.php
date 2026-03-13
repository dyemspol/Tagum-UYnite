@props(['isProfilePage' => false, 'post', 'likes' => 0, 'dislikes' => 0, 'userReaction' => null])

@php
// Make post card full-width on profile page, compact/centered elsewhere
$isProfileRoute = request()->routeIs('profile');
@endphp

<div class="{{ ($isProfilePage || $isProfileRoute) ? '' : 'flex items-center md:items-start justify-center lg:items-center' }} my-4"
    x-data="{ showFullscreen: false, fullscreenImage: '' }">

    <div class="bg-[#182b3cd5] light:bg-white py-3 rounded-lg border border-transparent light:border-gray-200 shadow-md transition-colors {{ ($isProfilePage || $isProfileRoute) ? 'w-full' : 'w-[85%] max-w-[45em] lg:w-[41%] xl:w-[50%]' }}">
        <div class="flex px-3 gap-3 items-center justify-between mb-3">
            <div class="space-x-3 flex items-center">
                <div class="w-11 h-11 ">
                    <img class="w-full h-full rounded-full object-cover"
                        src="{{ $post->user->profile_photo ? $post->user->profile_photo : asset('img/noprofile.jpg') }}"
                        alt="{{ $post->user->username }}">
                </div>
                <div class="">
                    <p class="font-normal text-sm text-white light:text-gray-900">{{ $post->user->username ?? 'Unknown User' }}</p>
                    <p class="font-light text-[#ffffffa4] light:text-gray-500 text-xs">
                        {{ $post->created_at->format('F d, Y') }} at {{ $post->created_at->format('h:i A') }} <span>•</span>
                        {{ $post->barangay->barangay_name ?? 'Unknown Location' }}
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                @if($post->post_status == 'removed')
                <p class="text-sm bg-red-500 rounded-2xl px-2 py-0.5 text-white font-medium">
                    Taken Down
                </p>
                @else
                <p class="text-sm {{ $post->report_status == 'resolved' ? 'bg-lime-500' : 'bg-amber-400' }} rounded-2xl px-2 py-0.5 text-black font-medium">
                    {{ ucfirst(str_replace('_', ' ', $post->report_status)) }}
                </p>
                @endif
                @if($isProfilePage || $isProfileRoute)
                @if($post->post_status != 'removed')
                <i wire:click="deletePost({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?" class="hgi hgi-stroke hgi-delete-01 text-xl text-[#31A871] hover:text-red-300 cursor-pointer"></i>
                @endif
                @endif
            </div>
        </div>


        <div class="px-3 pb-2">
            <h3 class="text-white light:text-gray-900 font-bold text-sm mb-1">{{ $post->title }}</h3>
            <p class="text-xs font-light line-clamp-2 text-white light:text-gray-700">
                {{ $post->content }}
            </p>
        </div>

        <!-- Swiper Carousel -->
        @if ($post->postImages && $post->postImages->count() > 0)
        <div wire:ignore x-data
            x-init="$nextTick(() => {
                     const el = $el.querySelector('.swiper');
                     if (el) {
                         if (el.swiper) { el.swiper.destroy(true, true); }
                         new Swiper(el, {
                             loop: true,
                             slidesPerView: 1,
                             spaceBetween: 10,
                             pagination: {
                                 el: el.querySelector('.swiper-pagination'),
                                 clickable: true,
                             },
                             navigation: {
                                 nextEl: el.querySelector('.swiper-button-next'),
                                 prevEl: el.querySelector('.swiper-button-prev'),
                             },
                         });
                     }
                 })">
            <div class="swiper h-80 w-full">
                <div class="swiper-wrapper">
                    @foreach ($post->postImages as $index => $image)
                    <div class="swiper-slide flex items-center justify-center bg-black/20 group cursor-zoom-in"
                        @if (!str_contains($image->mime_type, 'video'))
                        @click="fullscreenImage = '{{ $image->cdn_url }}'; showFullscreen = true"
                        @endif>
                        @if (str_contains($image->mime_type, 'video'))
                        <video src="{{ $image->cdn_url }}" controls class="max-h-full max-w-full"></video>
                        @else
                        <img src="{{ $image->cdn_url }}" alt="Post Image"
                            class="w-full h-full object-contain bg-black transition-transform duration-500 group-hover:scale-105">
                        @endif
                    </div>
                    @endforeach
                </div>

                @if ($post->postImages->count() > 1)
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation Buttons -->
                <div class="swiper-button-next !text-white !w-8 !h-8 !bg-black/20 !rounded-full after:!text-[10px]"></div>
                <div class="swiper-button-prev !text-white !w-8 !h-8 !bg-black/20 !rounded-full after:!text-[10px]"></div>
                @endif
            </div>
        </div>
        @endif

        @guest
        <div class="my-2 pl-3 flex space-x-1 items-center">

            <!-- Guest Like Button (Opens Login) -->
            <button onclick="document.getElementById('loginModal').classList.remove('hidden'); document.getElementById('loginModal').classList.add('flex');"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150 bg-[#354a5c00] hover:bg-[#354a5c] light:hover:bg-gray-100">
                <svg class="w-6 h-6 text-[#31A871]" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white light:text-gray-600 text-sm">{{ $likes }}</span>
            </button>

            <!-- Guest Dislike Button (Opens Login) -->
            <button onclick="document.getElementById('loginModal').classList.remove('hidden'); document.getElementById('loginModal').classList.add('flex');"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150 bg-[#354a5c00] hover:bg-[#354a5c] light:hover:bg-gray-100">
                <svg class="w-6 h-6 text-[#31A871]" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white light:text-gray-600 text-sm">{{ $dislikes }}</span>
            </button>

            <button onclick="document.getElementById('loginModal').classList.remove('hidden'); document.getElementById('loginModal').classList.add('flex');"
                class="flex items-center space-x-1 text-[#31A871] hover:text-white transition-colors px-2 py-1 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 10h10M7 14h5m-9 3.5V6.8c0-1.01.82-1.8 1.84-1.8h12.32C18.18 5 19 5.79 19 6.8v8.4c0 1.01-.82 1.8-1.84 1.8H9.2L5.5 17.5Z" />
                </svg>
            </button>
        </div>
        @endguest
        @auth
        @if($post->post_status != 'removed')
        <div class="my-2 pl-3 flex space-x-1 items-center" x-data="{
            reaction: @js($userReaction),
            likes: @js($likes),
            dislikes: @js($dislikes),
            update(type) {
                // 1. If clicking the same reaction, remove it (Toggle Off)
                if (this.reaction === type) {
                    this.reaction = null;
                    if (type === 'like') this.likes--;
                    else this.dislikes--;
                }
                // 2. If clicking a new reaction (Switch or Add)
                else {
                    // Remove old reaction counts first
                    if (this.reaction === 'like') this.likes--;
                    if (this.reaction === 'dislike') this.dislikes--;
        
                    // Apply new reaction
                    this.reaction = type;
                    if (type === 'like') this.likes++;
                    else this.dislikes++;
                }
            }
        }">
            @if(auth()->user()->is_verified == 1)
            <button @click="update('like'); $wire.toggleReaction('like')"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150"
                :class="reaction === 'like' ? 'bg-[#31A871] bg-opacity-20' : 'bg-[#354a5c00] hover:bg-[#354a5c] light:hover:bg-gray-100'">

                <svg class="w-6 h-6" :class="reaction === 'like' ? 'text-[#31A871]' : 'text-[#31A871]'"
                    :fill="'none'"
                    :stroke="reaction === 'like' ? 'white' : '#31A871'"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white light:text-gray-600 text-sm" x-text="likes"></span>
            </button>
            <!-- Dislike Button -->
            <button @click="update('dislike'); $wire.toggleReaction('dislike')"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150"
                :class="reaction === 'dislike' ? 'bg-red-900 bg-opacity-20' : 'bg-[#354a5c00] hover:bg-[#354a5c] light:hover:bg-gray-100'">

                <svg class="w-6 h-6"
                    :stroke="reaction === 'dislike' ? 'white' : '#31A871'"
                    :fill="'none'"
                    stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white light:text-gray-600 text-sm" x-text="dislikes"></span>
            </button>
            <button type="button"
                id="commentModalBtn"
                wire:click="$dispatch('openCommentModal', { postId: {{ $post->id }} })"
                class="flex cursor-pointer items-center space-x-1 text-[#31A871] hover:text-white transition-colors px-2 py-1 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7 10h10M7 14h5m-9 3.5V6.8c0-1.01.82-1.8 1.84-1.8h12.32C18.18 5 19 5.79 19 6.8v8.4c0 1.01-.82 1.8-1.84 1.8H9.2L5.5 17.5Z" />
                </svg>
                <span class="text-white light:text-gray-600 text-sm">{{ $post->comments->count() }}</span>
            </button>
            @else
            <button type="button"
                id="commentModalBtn"
                onclick="document.getElementById('loginModal').classList.remove('hidden'); document.getElementById('loginModal').classList.add('flex');"
                class="flex cursor-pointer items-center space-x-1 text-[#31A871] hover:text-white transition-colors px-2 py-1 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7 10h10M7 14h5m-9 3.5V6.8c0-1.01.82-1.8 1.84-1.8h12.32C18.18 5 19 5.79 19 6.8v8.4c0 1.01-.82 1.8-1.84 1.8H9.2L5.5 17.5Z" />
                </svg>
                <span class="text-white light:text-gray-600 text-sm">{{ $post->comments->count() }}</span>
            </button>
            @endauth
        </div>
        @endif
        @endauth

    </div>

    <!-- FULLSCREEN VIEWER -->
    <div x-show="showFullscreen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @keydown.escape.window="showFullscreen = false"
        class="fixed inset-0 z-[10000] bg-black/95 backdrop-blur-md flex items-center justify-center p-4 sm:p-10"
        style="display: none;">

        <!-- CLOSE BUTTON -->
        <button @click="showFullscreen = false"
            class="absolute top-6 right-6 text-white hover:text-[#31A871] transition-colors z-[10001]">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- IMAGE CONTAINER -->
        <div class="max-w-5xl w-full h-full flex items-center justify-center" @click.outside="showFullscreen = false">
            <img :src="fullscreenImage"
                class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-all duration-300"
                alt="Post Full Resolution">
        </div>
    </div>
</div>