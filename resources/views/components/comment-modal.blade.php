<div id="commentModal" class="{{ (isset($commentModal) && $commentModal) ? 'flex' : 'hidden' }} fixed inset-0 z-50 items-center justify-center bg-[#000000b6] bg-opacity-70 backdrop-blur-sm px-4">
    @if(isset($post) && $post)
    <div class="bg-[#182b3c] w-full max-w-lg md:max-w-xl rounded-xl relative shadow-2xl flex flex-col max-h-[90vh]">


        <button id="commentModalX" class="absolute top-3 right-3 text-white/70 hover:text-white text-2xl leading-none transition-colors z-30 p-2 bg-black/20 rounded-full w-8 h-8 flex items-center justify-center"
            wire:click="$set('commentModal', false)">
            &times;
        </button>


        <div class="px-5 py-3 border-b border-[#ffffff10] flex-shrink-0 bg-[#182b3c] rounded-t-xl z-20">
            <h2 class="text-white font-bold text-lg text-center">Post Details</h2>
        </div>


        <div class="overflow-y-auto hide-scrollbar custom-scrollbar flex-1 p-0 relative">


            <div class="bg-[#182b3cd5] pb-2">


                <div class="flex px-5 py-3 gap-3 items-center justify-between">
                    <div class="space-x-3 flex items-center">
                        <div class="w-10 h-10">
                            <img class="w-full h-full rounded-full object-cover"
                                src="{{ $post->user->profile_photo ? $post->user->profile_photo : asset('img/noprofile.jpg')}}"
                                alt="User">
                        </div>
                        <div>
                            <p class="font-normal text-sm text-white">{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
                            <p class="font-light text-[#ffffffa4] text-xs">
                                {{ $post->created_at->format('F j, Y') }} {{ $post->created_at->format('g:i A') }} <span>•</span> {{ $post->barangay->barangay_name }} , {{ $post->street_purok }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs {{ $post->report_status == 'resolved' ? 'bg-lime-500' : 'bg-amber-400' }} rounded-2xl px-2 py-0.5 text-black font-medium">
                            {{ ucfirst(str_replace('_', ' ', $post->report_status)) }}
                        </span>
                    </div>
                </div>

                <!-- Post Content -->
                <div class="px-5 pb-2">
                    <h3 class="text-white font-bold text-sm mb-1">{{ $post->title }}</h3>
                    <p class="text-sm font-light text-white leading-relaxed line-clamp-3">
                        {{ $post->description }}
                    </p>
                </div>

                <!-- Post Media (Swiper Carousel) -->
                @if ($post->postImages && $post->postImages->count() > 0)
                <div class="w-full mb-2"
                     x-data
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
                                <video src="{{ $image->cdn_url }}" controls class="w-full h-full object-contain bg-black"></video>
                                @else
                                <img src="{{ $image->cdn_url }}" class="w-full h-full object-contain bg-black">
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

                <!-- Like/Dislike Counts (Visual Only, No Buttons) -->
                <div class="px-5 py-2 flex items-center space-x-4">

                    <div class="flex items-center space-x-1">
                        <span class="text-[#ffffffa4] text-xs">{{ count($post->comments) }} comments</span>
                    </div>
                </div>

                <!-- Separator -->
                <div class="border-b border-[#ffffff10] mx-5 mb-2"></div>

                <!-- COMMENTS SECTION (Bottom) -->
                <div class="px-5 pt-2">
                    <!-- Comment List -->
                    <div class="space-y-4 pb-4">
                        @foreach ($comments as $comment)
                        <div class="flex items-start space-x-2">
                            <img src="{{ $comment->user->profile_photo ? $comment->user->profile_photo : asset('img/noprofile.jpg') }}"
                                class="w-8 h-8 rounded-full object-cover flex-shrink-0 mt-1">
                            <div class="flex-1">
                                <div class="bg-[#1f3548] rounded-2xl px-3 py-2 inline-block max-w-full {{ $comment->user->role == 'employee' ? 'border-l-2 border-[#31A871]' : '' }}">
                                    <div class="flex items-center gap-1.5 mb-0.5">
                                        <p class="text-xs text-white font-bold hover:underline cursor-pointer">
                                            {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                        </p>
                                        @if($comment->user->role == 'employee')
                                        <span class="bg-[#31A871] text-white text-[9px] px-1.5 py-0.5 rounded-md font-bold uppercase tracking-wider">Staff</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-[#ffffffdd] font-light">
                                        {{ $comment->comment_text }}
                                    </p>
                                </div>
                                <div class="flex items-center space-x-3 mt-1 ml-2">
                                    <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Like</span>
                                    <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Reply</span>
                                    <span class="text-[10px] text-[#ffffff66]">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <!-- Floating/Sticky Input Section -->
        <div class="p-3 bg-[#182b3c] border-t border-[#ffffff10] flex-shrink-0 rounded-b-xl z-20">
            <div class="flex items-center space-x-2">
                <img src="{{ auth()->user()->profile_photo ?? asset('img/noprofile.jpg') }}"
                    class="w-8 h-8 rounded-full object-cover flex-shrink-0">

                <div class="flex-1 relative">
                    <input type="text" placeholder="Write a comment..."
                        class="w-full bg-[#1f3548] text-white text-sm px-4 py-2 rounded-full outline-none focus:ring-1 focus:ring-[#31A871] placeholder:text-[#ffffff88] transition-all" wire:model="comment" wire:keydown.enter="submitComment">
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 text-[#31A871] hover:text-white p-1 rounded-full aspect-square flex items-center justify-center" wire:click="submitComment">
                        <svg class="w-5 h-5 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
    @endif
</div>
