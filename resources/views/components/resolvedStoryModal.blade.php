<div x-data="{ 
    open: false, 
    swiper: null,
    story: {
        name: '',
        profile: '',
        images: []
    },
    initSwiper() {
        this.$nextTick(() => {
            if (this.swiper) this.swiper.destroy();
            this.swiper = new Swiper('.storySwiper', {
                loop: false,
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            });
        });
    }
}" 
@open-story.window="open = true; story = $event.detail; initSwiper();"
class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4"
x-show="open" 
x-cloak 
@click.self="open = false"
@keydown.escape.window="open = false">

    <div class="bg-[#1a1d29] w-full max-w-lg rounded-3xl border border-[#2a2d3a] overflow-hidden relative shadow-2xl">
        
        <!-- CLOSE BUTTON -->
        <button @click="open = false" class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full bg-black/50 text-white z-50 hover:bg-black/70 transition-all">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- HEADER -->
        <div class="p-4 flex items-center gap-3 border-b border-[#2a2d3a]">
            <div class="w-10 h-10 rounded-full border-2 border-blue-500 p-0.5">
                <img :src="story.profile" class="w-full h-full rounded-full object-cover">
            </div>
            <div>
                <h3 class="text-white font-bold text-sm" x-text="story.name"></h3>
                <p class="text-[#00d4aa] text-[10px] font-bold uppercase tracking-widest">Resolved Story</p>
            </div>
        </div>

        <!-- CAROUSEL -->
        <div class="relative group">
            <div class="swiper storySwiper h-[500px]">
                <div class="swiper-wrapper">
                    <template x-for="(img, idx) in story.images" :key="idx">
                        <div class="swiper-slide">
                            <img :src="img" class="w-full h-full object-cover">
                        </div>
                    </template>
                </div>
                
                <!-- NAVIGATION -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next !text-white !w-8 !h-8 !bg-black/20 !rounded-full after:!text-[10px]"></div>
                <div class="swiper-button-prev !text-white !w-8 !h-8 !bg-black/20 !rounded-full after:!text-[10px]"></div>
            </div>
        </div>

        <!-- FOOTER / CONTENT AREA -->
        <div class="p-6 bg-[#12151e]/50">
            <h4 class="text-white font-bold text-lg mb-2">Issue Successfully Resolved</h4>
            <p class="text-gray-400 text-xs leading-relaxed">
                This report has been verified and resolved by the local authorities. Thank you for your active participation in our community safety.
            </p>
            
            <button class="w-full mt-6 bg-[#00d4aa] text-[#12151e] font-bold py-3 rounded-xl hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-[#00d4aa]/10">
                View Full Details
            </button>
        </div>
    </div>
</div>
