<!-- MODAL BACKDROP -->

<div
    id="viewIssueModal"
    class="fixed inset-0 bg-black/60 items-center justify-center z-50 {{ $selectedReport ? 'flex' : 'hidden' }}">
    @if($selectedReport)

    <!-- MODAL CONTAINER -->
    <div class="bg-[#1a1d29] w-full max-w-5xl rounded-3xl shadow-2xl flex overflow-hidden border border-[#2a2d3a] relative"
        x-data="{ showFullscreen: false, fullscreenImage: '' }"
        x-init="$nextTick(() => {
    new Swiper('.mySwiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination', clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev',
        },
    });
})">
        <!-- CLOSE BUTTON -->
        <button wire:click="closeIssue" class="absolute top-6 right-6 w-10 h-10 flex items-center justify-center rounded-full bg-[#12151e] border border-[#2a2d3a] text-gray-400 hover:text-white hover:bg-[#2a2d3a] transition-all z-20">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>


        <!-- LEFT PANE: PRIMARY DETAILS -->
        <div class="w-[55%] p-8 border-r border-[#2a2d3a] overflow-y-auto hide-scrollbar max-h-[90vh]">
            <!-- HEADER -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">Issue Details</h2>
                    <p class="text-xs text-[#00d4aa] font-medium mt-1">#{{ $selectedReport->report_id}}</p>
                </div>
                <div class="px-3 py-1 bg-red-500/10 border border-red-500/20 rounded-full">
                    <span class="text-[10px] text-red-500 font-bold uppercase tracking-wider">{{ $selectedReport->report_status }}</span>
                </div>
            </div>

            <!-- CONTENT GRID -->
            <div class="grid grid-cols-2 gap-8 text-sm">
                <div class="col-span-2">
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Issue Name</p>
                    <p class="text-white text-lg font-semibold">{{ $selectedReport->title }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Reported by</p>
                    <div class="flex items-center gap-2">

                        <p class="text-gray-200 font-medium">{{ $selectedReport->user->first_name }} {{ $selectedReport->user->last_name }}</p>
                    </div>
                </div>

                <div>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Date Reported</p>
                    <p class="text-gray-200 font-medium">{{ $selectedReport->created_at->format('M d, Y') }}</p>
                </div>

                <div class="col-span-2">
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Description</p>
                    <p class="text-gray-300 leading-relaxed bg-[#12151e] p-4 rounded-xl border border-[#2a2d3a]/50">
                        {{ $selectedReport->content }}
                    </p>
                </div>

                <div class="col-span-2">
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Location</p>
                    <div class="flex items-center gap-2 text-gray-200">
                        <i class="fa-solid fa-location-dot text-[#00d4aa]"></i>
                        <p class="font-medium">{{ ucwords($selectedReport->street_purok) }}, {{ Str::title($selectedReport->barangay?->barangay_name) ?? 'N/A' }} , Tagum City</p>
                    </div>
                </div>
            </div>

            <!-- SWIPER CAROUSEL -->
            <div class="mt-8">
                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-3">Attached Proof</p>
                <div class="swiper mySwiper h-80 rounded-2xl border border-[#2a2d3a]">
                    <div class="swiper-wrapper">
                        @foreach($selectedReport->postImages as $image)
                        <div class="swiper-slide group cursor-zoom-in" @click="fullscreenImage = '{{ $image->cdn_url }}'; showFullscreen = true">
                            <img src="{{ $image->cdn_url }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next !text-[#00d4aa]"></div>
                    <div class="swiper-button-prev !text-[#00d4aa]"></div>
                </div>
                <p class="text-center text-[10px] text-gray-500 mt-2 italic">Click image to view full screen</p>
            </div>
        </div>

        <!-- RIGHT PANE: POST COMMENTS -->
        <div class="flex-1 bg-[#12151e]/50 p-8 flex flex-col max-h-[90vh]">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-comments text-[#00d4aa] text-sm"></i>
                    Post Comments
                </h3>

            </div>

            <!-- ACTUAL COMMENTS LIST -->
            <div class="flex-1 overflow-y-auto space-y-4 mb-8 hide-scrollbar pr-1">
                @forelse($selectedReport->comments as $comment)
                <div class="p-4 bg-[#1a1d29] rounded-2xl border border-[#2a2d3a] shadow-sm">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-bold text-white">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</span>
                        <span class="text-[10px] text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-[11px] text-gray-300 leading-relaxed">{{ $comment->comment_text }}</p>
                </div>
                @empty
                <div class="flex flex-col items-center justify-center h-full opacity-20">
                    <i class="fa-solid fa-comment-slash text-4xl mb-2 text-gray-400"></i>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-center">No comments yet</p>
                </div>
                @endforelse
            </div>

            <!-- COMMENT INPUT (SIMPLE LAYOUT) -->
            <!-- <div class="mb-6">
                <div class="relative group">
                    <textarea
                        wire:model="staffComment"
                        placeholder="Write a staff update..."
                        class="w-full bg-[#1a1d29] border border-[#2a2d3a] rounded-2xl p-4 pr-12 text-xs text-white focus:outline-none focus:ring-1 focus:ring-[#00d4aa] min-h-[60px] transition-all resize-none shadow-inner"></textarea>
                    <button
                        wire:click="addStaffComment"
                        class="absolute bottom-6 right-3 w-8 h-8 bg-[#00d4aa] rounded-xl flex items-center justify-center text-[#0f1117] hover:scale-110 active:scale-95 transition-all shadow-lg">
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                    </button>
                </div>
            </div> -->

            <!-- COMPACT CONTROLS -->
            <!-- <div class="space-y-4 bg-[#1a1d29] p-6 rounded-3xl border border-[#2a2d3a] shadow-2xl">
                <div>
                    <label class="text-[10px] text-gray-500 font-bold uppercase mb-2 block tracking-widest">Mark Status</label>
                    <select wire:model="statusUpdate" class="w-full bg-[#12151e] border border-[#2a2d3a] rounded-xl p-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#00d4aa]/30 transition-all">
                        <option value="pending">Pending</option>
                        <option value="in_review">Ongoing</option>
                        <option value="resolved">Resolved</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <button wire:click="updateStatus" class="w-full bg-[#00d4aa] py-3 rounded-xl text-[#0f1117] font-bold hover:bg-[#00e6b8] transition-all transform active:scale-95 shadow-lg shadow-[#00d4aa]/10">
                        Update Report
                    </button>
                    <div class="flex gap-2">
                        <button wire:click="takedown({{ $selectedReport->id }})" class="flex-1 py-2.5 rounded-xl border border-red-500/30 text-red-500 text-[10px] font-bold hover:bg-red-500/10 transition-all">
                            Take Down
                        </button>
                        <button wire:click="closeIssue" class="flex-1 py-2.5 rounded-xl border border-[#2a2d3a] text-gray-500 text-[10px] font-bold hover:bg-[#252836] hover:text-white transition-all">
                            Cancel
                        </button>
                    </div>
                </div>
            </div> -->
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
            <!-- <button @click="showFullscreen = false" 
                class="absolute top-6 right-6 text-white hover:text-red-500 transition-colors z-[10001]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="6 18L18 6M6 6l12 12" />
            </svg>
        </button> -->

            <!-- IMAGE CONTAINER -->
            <div class="max-w-5xl w-full h-full flex items-center justify-center" @click.outside="showFullscreen = false">
                <img :src="fullscreenImage"
                    class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-all duration-300"
                    alt="Proof Full Resolution">
            </div>
        </div>
    </div>

</div>
@endif
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>