@props(['isProfilePage' => false, 'post', 'likes' => 0, 'dislikes' => 0, 'userReaction' => null])

<div class="{{ $isProfilePage ? '' : 'flex items-center md:items-start justify-center lg:items-center' }} my-4">

    <div class="bg-[#182b3cd5] py-3 w-[85%] max-w-[45em] lg:max-w-[50em] rounded-lg">
        <div class="flex px-3 gap-3 items-center justify-between mb-3">
           <div class="space-x-3 flex items-center">
             <div class="w-11 h-11 ">
                <img class="w-full h-full rounded-full object-cover"
                     src="{{ $post->user->profile_photo_path ? asset('storage/' . $post->user->profile_photo_path) : asset('img/default-avatar.png') }}" 
                     alt="{{ $post->user->username }}">
             </div>
             <div class="">
                 <p class="font-normal text-sm text-white">{{ $post->user->username ?? 'Unknown User' }}</p>
                 <p class="font-light text-[#ffffffa4] text-xs">
                    {{ $post->created_at->format('F d, Y') }} <span>•</span> 
                    {{ $post->barangay->barangay_name ?? 'Unknown Location' }}
                 </p>
             </div>
           </div>
           <div class="">
                <p class="text-sm bg-amber-400 rounded-2xl px-2 py-0.5 text-black font-medium">
                    {{ $post->report_status == 'Pending' ? 'Pending' : 'Pending' }}
                </p>
           </div>
        </div>
        
        <div class="px-3 pb-2">
            <h3 class="text-white font-bold text-sm mb-1">{{ $post->title }}</h3>
            <p class="text-xs font-light line-clamp-2 text-white">
                {{ $post->content }}
            </p>
        </div>

        <!-- Carousel Container -->
        @if($post->postImages && $post->postImages->count() > 0)
        <div class="relative w-full carousel-container group" id="carousel-{{ $post->id }}">
            <div class="carousel-wrapper overflow-hidden relative">
                <div class="carousel-track flex transition-transform duration-300 ease-in-out" style="transform: translateX(0%)">
                    <!-- Carousel Items -->
                    @foreach($post->postImages as $image)
                    <div class="carousel-slide w-full flex-shrink-0 bg-black/20 flex items-center justify-center h-80">
                        @if(str_contains($image->mime_type, 'video'))
                            <video src="{{ $image->cdn_url }}" controls class="max-h-full max-w-full"></video>
                        @else
                            <img src="{{ $image->cdn_url }}" alt="Post Image" class="w-full h-full object-contain bg-black">
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            
            @if($post->postImages->count() > 1)
            <!-- Navigation Arrows -->
            <button class="carousel-prev absolute left-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white rounded-full p-2 z-10 transition-all opacity-0 group-hover:opacity-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="carousel-next absolute right-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white rounded-full p-2 z-10 transition-all opacity-0 group-hover:opacity-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <!-- Dots Indicator -->
            <div class="carousel-dots flex justify-center gap-2 absolute bottom-2 left-0 right-0">
                @foreach($post->postImages as $index => $image)
                <button class="carousel-dot w-2 h-2 rounded-full {{ $index === 0 ? 'bg-[#31A871]' : 'bg-gray-600' }} transition-all shadow-sm" data-slide="{{ $index }}"></button>
                @endforeach
            </div>
            @endif
        </div>
        @endif
       

        <div class="my-2 pl-3 flex space-x-1 items-center" 
                x-data="{ 
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
             <button 
                @click="update('like'); $wire.toggleReaction('like')"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150"
                :class="reaction === 'like' ? 'bg-[#31A871] bg-opacity-20' : 'bg-[#354a5c00] hover:bg-[#354a5c]'"> 
            
                <svg class="w-6 h-6" 
                    :class="reaction === 'like' ? 'text-[#31A871]' : 'text-[#31A871]'"
                    :fill="reaction === 'like' ? 'currentColor' : 'none'" 
                    stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white text-sm" x-text="likes"></span>
            </button>
            <!-- Dislike Button -->
            <button 
                @click="update('dislike'); $wire.toggleReaction('dislike')"
                class="flex space-x-0.5 items-center rounded-xl px-2 py-1 cursor-pointer transition-all duration-150"
                :class="reaction === 'dislike' ? 'bg-red-900 bg-opacity-20' : 'bg-[#354a5c00] hover:bg-[#354a5c]'"> 
        
                <svg class="w-6 h-6" 
                    :class="reaction === 'dislike' ? 'text-red-500' : 'text-[#31A871]'"
                    :fill="reaction === 'dislike' ? 'currentColor' : 'none'" 
                    stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
                <span class="text-white text-sm" x-text="dislikes"></span>
            </button>
            <button type="button" class="flex items-center space-x-1 text-[#31A871] hover:text-white transition-colors px-2 py-1 rounded-xl"
            @click="update('like')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 10h10M7 14h5m-9 3.5V6.8c0-1.01.82-1.8 1.84-1.8h12.32C18.18 5 19 5.79 19 6.8v8.4c0 1.01-.82 1.8-1.84 1.8H9.2L5.5 17.5Z"/>
                </svg>
            </button>
        </div>
        
        {{-- Comment Section (Placeholder for now) --}}
        <div class="mt-3 px-3 pb-2 hidden comment-section">
             <!-- Comments would go here -->
        </div>

    </div>
</div>

<script>
    // Carousel logic (same as before)
    document.querySelectorAll('.carousel-container').forEach((container) => {
        const track = container.querySelector('.carousel-track');
        const slides = container.querySelectorAll('.carousel-slide');
        const prevBtn = container.querySelector('.carousel-prev');
        const nextBtn = container.querySelector('.carousel-next');
        const dots = container.querySelectorAll('.carousel-dot');
        
        let currentSlide = 0;
        const totalSlides = slides.length;

        function updateCarousel() {
            if(!track) return;
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.remove('bg-gray-600');
                    dot.classList.add('bg-[#31A871]');
                } else {
                    dot.classList.remove('bg-[#31A871]');
                    dot.classList.add('bg-gray-600');
                }
            });
            if (prevBtn) prevBtn.style.opacity = currentSlide === 0 ? '0.5' : '1';
            if (nextBtn) nextBtn.style.opacity = currentSlide === totalSlides - 1 ? '0.5' : '1';
        }

        if (prevBtn) prevBtn.addEventListener('click', () => { if (currentSlide > 0) { currentSlide--; updateCarousel(); } });
        if (nextBtn) nextBtn.addEventListener('click', () => { if (currentSlide < totalSlides - 1) { currentSlide++; updateCarousel(); } });
        dots.forEach((dot, index) => dot.addEventListener('click', () => { currentSlide = index; updateCarousel(); }));
        updateCarousel();
    });
</script>
