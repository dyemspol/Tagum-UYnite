<div
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4 {{$resolvedReport ? 'flex' : 'hidden'}} ">

    <div class="bg-[#1a1d29] light:bg-[#f8fafc] w-full max-w-lg rounded-3xl border border-[#2a2d3a] light:border-gray-200 overflow-hidden relative shadow-2xl transition-colors">
        @if($resolvedReport)
        <!-- CLOSE BUTTON -->
        <button wire:click="closeResolvedModal" class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full bg-black/50 light:bg-gray-100 text-white light:text-gray-800 z-50 hover:bg-black/70 light:hover:bg-gray-200 transition-all">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- HEADER -->
        <div class="p-4 flex items-center gap-3 border-b border-[#2a2d3a] light:border-gray-200 transition-colors">
            <div class="w-10 h-10 rounded-full border-2 border-green-500 p-0.5">
                <img src="{{ $resolvedReport->user->profile_photo ?? asset('img/noprofile.jpg') }}" class="w-full h-full rounded-full object-cover">
            </div>
            <div>
                <h3 class="text-white light:text-gray-900 font-bold text-sm transition-colors">{{ $resolvedReport->user->first_name . ' ' . $resolvedReport->user->last_name }}</h3>
                <p class="text-[#00d4aa] text-[10px] font-bold uppercase tracking-widest">Resolved Issue</p>
            </div>
        </div>

        <!-- CAROUSEL -->
        <div class="relative group" 
             x-data="{ 
                 initSwiper() {
                     this.$nextTick(() => {
                         const swiperEl = this.$el.querySelector('.storySwiper');
                         if (swiperEl) {
                             if (swiperEl.swiper) swiperEl.swiper.destroy(true, true);
                             new Swiper(swiperEl, {
                                 loop: true,
                                 slidesPerView: 1,
                                 spaceBetween: 10,
                                 pagination: {
                                     el: this.$el.querySelector('.swiper-pagination'),
                                     clickable: true,
                                 },
                                 navigation: {
                                     nextEl: this.$el.querySelector('.swiper-button-next'),
                                     prevEl: this.$el.querySelector('.swiper-button-prev'),
                                 },
                             });
                         }
                     });
                 }
             }" 
             x-init="initSwiper()"
             x-effect="if ('{{ $resolvedReport->id }}') initSwiper()">
            <div class="swiper storySwiper h-[500px]">
                <div class="swiper-wrapper">

                    @foreach($resolvedReport->postImages as $image)
                    <div class="swiper-slide">
                        <img src="{{ $image->cdn_url ?? asset('img/noimage.jpg') }}" class="w-full h-full object-cover">
                    </div>
                    @endforeach

                </div>
                @if($resolvedReport->postImages->count() > 1)
                <!-- NAVIGATION -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next !text-white !w-8 !h-8 !bg-black/20 !rounded-full after:!text-[10px]"></div>
                <div class="swiper-button-prev !text-white !w-8 !h-8 !bg-black/20 !rounded-full after:!text-[10px]"></div>
                @endif
            </div>
        </div>

        <!-- FOOTER / CONTENT AREA -->
        <div class="p-6 bg-[#12151e]/50 light:bg-white transition-colors">
            <h4 class="text-white light:text-gray-900 font-bold text-lg mb-2 transition-colors">Issue # {{$resolvedReport->report_id}} Successfully Resolved</h4>
            <p class="text-gray-400 light:text-gray-600 text-xs leading-relaxed transition-colors">
                This report has been verified and resolved by the local authorities. Thank you for your active participation in our community safety.
            </p>

            <button @click="Livewire.dispatch('openCommentModal', { postId: {{ $resolvedReport->id }} });" wire:click="closeResolvedModal" class="w-full mt-6 bg-[#31A871] text-white font-bold py-3 rounded-xl hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-[#31A871]/20">
                View Full Details
            </button>
        </div>
        @endif
    </div>
</div>