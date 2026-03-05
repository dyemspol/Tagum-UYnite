@props(['isProfilePage' => false, 'post', 'likes' => 0, 'dislikes' => 0, 'userReaction' => null])

@php
    // Make post card full-width on profile page, compact/centered elsewhere
    $isProfileRoute = request()->routeIs('profile');
@endphp

<div class="{{ ($isProfilePage || $isProfileRoute) ? '' : 'flex items-center md:items-start justify-center lg:items-center' }} my-4">

    <div class="bg-[#182b3cd5] py-3 rounded-lg {{ ($isProfilePage || $isProfileRoute) ? 'w-full' : 'w-[85%] max-w-[45em] lg:w-[41%] xl:w-[50%]' }}">
        <div class="flex px-3 gap-3 items-center justify-between mb-3">
           <div class="space-x-3 flex items-center">
             <div class="w-11 h-11 ">
                <img class="w-full h-full rounded-full object-cover"
                     src="{{ $post->user->profile_photo ? $post->user->profile_photo : asset('img/noprofile.jpg') }}" 
                     alt="{{ $post->user->username }}">
             </div>
             <div class="">
                 <p class="font-normal text-sm text-white">{{ $post->user->username ?? 'Unknown User' }}</p>
                 <p class="font-light text-[#ffffffa4] text-xs">
                    {{ $post->created_at->format('F d, Y') }}  at {{ $post->created_at->format('h:i A') }} <span>•</span> 
                        {{ $post->barangay->barangay_name ?? 'Unknown Location' }}
                    </p>
                </div>
            </div>
            <div class="">
                <p class="text-sm {{ $post->report_status == 'resolved' ? 'bg-lime-500' : 'bg-amber-400' }} rounded-2xl px-2 py-0.5 text-black font-medium">
                    {{ ucfirst(str_replace('_', ' ', $post->report_status)) }}
                </p>
            </div>
        </div>

        <div class="px-3 pb-2">
            <h3 class="text-white font-bold text-sm mb-1">{{ $post->title }}</h3>
            <p class="text-xs font-light line-clamp-2 text-white">
                {{ $post->content }}
            </p>
        </div>

        <!-- Swiper Carousel -->
        @if ($post->postImages && $post->postImages->count() > 0)
            <div x-data
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
                        @foreach ($post->postImages as $image)
                            <div class="swiper-slide flex items-center justify-center bg-black/20">
                                @if (str_contains($image->mime_type, 'video'))
                                    <video src="{{ $image->cdn_url }}" controls class="max-h-full max-w-full"></video>
                                @else
                                    <img src="{{ $image->cdn_url }}" alt="Post Image"
                                        class="w-full h-full object-contain bg-black">
                                @endif
                            </div>
                        @endforeach
                    </div>

                    @if ($post->postImages->count() > 1)
                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Navigation Buttons -->
                        <div class="swiper-button-next !scale-50 !opacity-50 hover:!opacity-80 transition-opacity"></div>
                        <div class="swiper-button-prev !scale-50 !opacity-50 hover:!opacity-80 transition-opacity"></div>
                    @endif
                </div>
            </div>
        @endif

        @guest
        <div class="my-2 pl-3 flex space-x-1 items-center">
            
            <!-- Guest Like Button (Opens Login) -->
            <button onclick="document.getElementById('loginModal').classList.remove('hidden'); document.getElementById('loginModal').classList.add('flex');"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150 bg-[#354a5c00] hover:bg-[#354a5c]">
                <svg class="w-6 h-6 text-[#31A871]" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white text-sm">{{ $likes }}</span>
            </button>

            <!-- Guest Dislike Button (Opens Login) -->
            <button onclick="document.getElementById('loginModal').classList.remove('hidden'); document.getElementById('loginModal').classList.add('flex');"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150 bg-[#354a5c00] hover:bg-[#354a5c]">
                <svg class="w-6 h-6 text-[#31A871]" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white text-sm">{{ $dislikes }}</span>
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
            <button @click="update('like'); $wire.toggleReaction('like')"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150"
                :class="reaction === 'like' ? 'bg-[#31A871] bg-opacity-20' : 'bg-[#354a5c00] hover:bg-[#354a5c]'">

                <svg class="w-6 h-6" :class="reaction === 'like' ? 'text-[#31A871]' : 'text-[#31A871]'"
                   :fill="'none'"  
                    :stroke="reaction === 'like' ? 'white' : '#31A871'"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white text-sm" x-text="likes"></span>
            </button>
            <!-- Dislike Button -->
            <button @click="update('dislike'); $wire.toggleReaction('dislike')"
    class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150"
    :class="reaction === 'dislike' ? 'bg-red-900 bg-opacity-20' : 'bg-[#354a5c00] hover:bg-[#354a5c]'">

    <svg class="w-6 h-6"
     :stroke="reaction === 'dislike' ? 'white' : '#31A871'"   
     :fill="'none'"  
     stroke-width="1.5" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
</svg>
    <span class="text-white text-sm" x-text="dislikes"></span>
</button>
            <button type="button"
            id="commentModalBtn"
            wire:click="$dispatch('openCommentModal', { postId: {{ $post->id }} })"
                class="flex cursor-pointer items-center space-x-1 text-[#31A871] hover:text-white transition-colors px-2 py-1 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7 10h10M7 14h5m-9 3.5V6.8c0-1.01.82-1.8 1.84-1.8h12.32C18.18 5 19 5.79 19 6.8v8.4c0 1.01-.82 1.8-1.84 1.8H9.2L5.5 17.5Z" />
                </svg>
                <span class="text-white text-sm">{{ $post->comments->count() }}</span>
            </button>
        </div>
        @endauth




        {{-- Comment Section (Placeholder for now) --}}
        {{-- Comment Section --}}
        {{-- <div class="mt-3 px-3 pb-2 comment-section"> --}}

            <!-- Existing comments -->
            {{-- <div class="space-y-3 mb-3">
                <div class="flex items-start space-x-2">
                    <img src="{{ asset('img/default-avatar.png') }}" class="w-8 h-8 rounded-full object-cover">
                    <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                        <p class="text-xs text-white font-medium">Username</p>
                        <p class="text-xs text-[#ffffffc7] font-light">
                            This is a sample comment content.
                        </p>
                    </div>
                </div>
            </div> --}}

            {{-- Add comment --}}
            {{-- <div class="flex items-center space-x-2">
                <img src="{{ auth()->user()->profile_photo ?? asset('img/noprofile.jpg') }}"
                    class="w-8 h-8 rounded-full object-cover">

                <input type="text" placeholder="Write a comment..."
                    class="w-full bg-[#1f3548] text-white text-xs px-3 py-2 rounded-xl outline-none focus:ring-1 focus:ring-[#31A871] placeholder:text-[#ffffff88]">

                <button class="text-[#31A871] hover:text-white transition-colors text-sm font-medium">
                    Post
                </button>
            </div>

        </div>  --}} 


    </div>
</div>

<div x-data="{ open: false, startIndex: 0 }"
     x-show="open"
     @keydown.escape.window="open = false"
     class="fixed inset-0 bg-black/90 flex items-center justify-center z-50 p-4"
     style="display: none;">

    <!-- Close Button -->
    <button @click="open = false"
            class="absolute top-4 right-4 text-white text-3xl z-50">&times;</button>

    <!-- Fullscreen Swiper -->
    <div class="swiper-fullscreen w-full max-w-4xl h-full">
        <div class="swiper-wrapper">
            @foreach($post->postImages as $image)
            <div class="swiper-slide flex items-center justify-center">
                @if(str_contains($image->mime_type, 'video'))
                    <video src="{{ $image->cdn_url }}" controls class="max-h-full max-w-full"></video>
                @else
                    <img src="{{ $image->cdn_url }}" alt="Post Image"
                         class="max-h-full max-w-full object-contain">
                @endif
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($post->postImages->count() > 1)
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        @endif
    </div>
</div>

