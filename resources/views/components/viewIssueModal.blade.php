<!-- MODAL BACKDROP -->

<div
  id="viewIssueModal"
  class="fixed inset-0 bg-black/60 items-center justify-center z-50 {{ $selectedReport ? 'flex' : 'hidden' }}">
  @if($selectedReport)

  <!-- MODAL CONTAINER -->
  <div class="bg-[#1a1d29] w-full max-w-5xl rounded-3xl shadow-2xl flex overflow-hidden border border-[#2a2d3a] relative"
       x-data
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
                    <p class="font-medium">{{ $selectedReport->Street_Purok }}, {{ $selectedReport->barangay?->barangay_name ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- SWIPER CAROUSEL -->
        <div class="mt-8">
            <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-3">Attached Proof</p>
            <div class="swiper mySwiper h-80 rounded-2xl border border-[#2a2d3a]">
                <div class="swiper-wrapper">
                    @foreach($selectedReport->postImages as $image)
                    <div class="swiper-slide group">
                        <img src="{{ $image->cdn_url }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next !text-[#00d4aa]"></div>
                <div class="swiper-button-prev !text-[#00d4aa]"></div>
            </div>
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
        <div class="mb-6">
            <div class="relative group">
                <textarea 
                    wire:model="staffComment"
                    placeholder="Write a staff update..." 
                    class="w-full bg-[#1a1d29] border border-[#2a2d3a] rounded-2xl p-4 pr-12 text-xs text-white focus:outline-none focus:ring-1 focus:ring-[#00d4aa] min-h-[60px] transition-all resize-none shadow-inner"
                ></textarea>
                <button 
                    wire:click="addStaffComment"
                    class="absolute bottom-6 right-3 w-8 h-8 bg-[#00d4aa] rounded-xl flex items-center justify-center text-[#0f1117] hover:scale-110 active:scale-95 transition-all shadow-lg"
                >
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                </button>
            </div>
        </div>

        <!-- COMPACT CONTROLS -->
        <div class="space-y-4 bg-[#1a1d29] p-6 rounded-3xl border border-[#2a2d3a] shadow-2xl">
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
        </div>
    </div>
  </div>

  </div>
  @endif
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>