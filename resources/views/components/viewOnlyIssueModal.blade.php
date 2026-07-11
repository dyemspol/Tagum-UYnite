<!-- MODAL BACKDROP -->

<div
    id="viewIssueModal"
    class="fixed inset-0 bg-black/60 items-center justify-center z-50 {{ $selectedReport ? 'flex' : 'hidden' }}">
    @if($selectedReport)

    <!-- MODAL CONTAINER -->
    <div class="bg-[#1a1d29] light:bg-[#f8fafc] w-full max-w-5xl rounded-3xl shadow-2xl flex overflow-hidden border border-[#2a2d3a] light:border-gray-200 relative transition-colors"
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
        <button wire:click="closeIssue" class="absolute top-6 right-6 w-10 h-10 flex items-center justify-center rounded-full bg-[#12151e] light:bg-gray-100 border border-[#2a2d3a] light:border-gray-200 text-gray-400 light:text-gray-500 hover:text-white light:hover:text-gray-900 hover:bg-[#2a2d3a] light:hover:bg-gray-200 transition-all z-20">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>


        <!-- LEFT PANE: PRIMARY DETAILS -->
        <div class="w-[55%] p-8 border-r border-[#2a2d3a] light:border-gray-200 overflow-y-auto hide-scrollbar max-h-[90vh] transition-colors">
            <!-- HEADER -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-white light:text-gray-900 tracking-tight transition-colors">Issue Details</h2>
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
                    <p class="text-white light:text-gray-900 text-lg font-semibold transition-colors">{{ $selectedReport->title }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Reported by</p>
                    <div class="flex items-center gap-2">

                        <p class="text-gray-200 light:text-gray-900 font-medium transition-colors">{{ $selectedReport->user->first_name }} {{ $selectedReport->user->last_name }}</p>
                    </div>
                </div>

                <div>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Date Reported</p>
                    <p class="text-gray-200 light:text-gray-900 font-medium transition-colors">{{ $selectedReport->created_at->format('M d, Y') }}</p>
                </div>

                <div class="col-span-2">
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Description</p>
                    <p class="text-gray-300 light:text-gray-800 leading-relaxed bg-[#12151e] light:bg-white p-4 rounded-xl border border-[#2a2d3a]/50 light:border-gray-200 transition-colors">
                        {{ $selectedReport->content }}
                    </p>
                </div>

                <div class="col-span-2">
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-1">Location</p>
                    <div class="flex items-center gap-2 text-gray-200 light:text-gray-900 transition-colors">
                        <i class="fa-solid fa-location-dot text-[#00d4aa]"></i>
                        <p class="font-medium">{{ ucwords($selectedReport->street_purok) }}, {{ Str::title($selectedReport->barangay?->barangay_name) ?? 'N/A' }} , Tagum City</p>
                    </div>
                </div>
            </div>

            <!-- SWIPER CAROUSEL -->
            <div class="mt-8">
                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest mb-3">Attached Proof</p>
                <div class="swiper mySwiper h-80 rounded-2xl border border-[#2a2d3a] light:border-gray-200 transition-colors">
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

        <!-- RIGHT PANE: COMMENTS + PASS ISSUE -->
        <div class="flex-1 bg-[#12151e]/50 light:bg-gray-100 p-8 flex flex-col max-h-[90vh] transition-colors overflow-y-auto hide-scrollbar">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-white light:text-gray-900 flex items-center gap-2 transition-colors">
                    <i class="fa-solid fa-comments text-[#00d4aa] text-sm"></i>
                    Post Comments
                </h3>
            </div>

            <!-- ACTUAL COMMENTS LIST -->
            <div class="space-y-3 mb-6 max-h-[240px] overflow-y-auto hide-scrollbar pr-1">
                @forelse($selectedReport->comments as $comment)
                <div class="p-4 bg-[#1a1d29] light:bg-white rounded-2xl border border-[#2a2d3a] light:border-gray-200 shadow-sm transition-colors">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-bold text-white light:text-gray-900 transition-colors">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</span>
                        <span class="text-[10px] text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-[11px] {{ str_starts_with($comment->comment_text, '[Passed to Department]') ? 'text-amber-400' : 'text-gray-300 light:text-gray-700' }} leading-relaxed transition-colors">
                        @if(str_starts_with($comment->comment_text, '[Passed to Department]'))
                            <i class="fa-solid fa-share-from-square mr-1"></i>
                        @endif
                        {{ $comment->comment_text }}
                    </p>
                </div>
                @empty
                <div class="flex flex-col items-center justify-center py-6 opacity-20 light:opacity-50 transition-opacity">
                    <i class="fa-solid fa-comment-slash text-4xl mb-2 text-gray-400"></i>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-center light:text-gray-600 transition-colors">No comments yet</p>
                </div>
                @endforelse
            </div>

            <!-- PASS ISSUE PANEL -->
            <div class="mt-auto">
                <!-- Flash Message -->
                @if(session()->has('success'))
                <div class="mb-4 px-4 py-2.5 bg-emerald-500/15 border border-emerald-500/30 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-400 text-xs"></i>
                    <span class="text-emerald-400 text-xs font-semibold">{{ session('success') }}</span>
                </div>
                @endif

                <div class="bg-[#1a1d29] light:bg-[#f1f5f9] p-6 rounded-3xl border border-amber-500/20 shadow-2xl space-y-4 relative overflow-hidden">
                    <!-- Accent Glow -->
                    <div class="absolute top-0 left-0 w-full h-0.5 bg-gradient-to-r from-amber-500/60 via-orange-400/40 to-transparent rounded-t-3xl"></div>

                    <!-- Header -->
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-xl bg-amber-500/15 border border-amber-500/20 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-share-from-square text-amber-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-white light:text-gray-900 transition-colors">Pass Issue</p>
                            <p class="text-[10px] text-gray-500 light:text-gray-400 transition-colors">Forward this report to another department</p>
                        </div>
                    </div>

                    <!-- Department Selector -->
                    <div>
                        <label class="text-[10px] text-gray-500 light:text-gray-500 font-bold uppercase tracking-widest mb-1.5 block">
                            Select Department
                        </label>
                        <select
                            wire:model="passToDepId"
                            class="w-full bg-[#12151e] light:bg-white border border-[#2a2d3a] light:border-gray-300 rounded-xl p-3 text-sm text-white light:text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-500/30 transition-all appearance-none">
                            <option value="">-- Choose department --</option>
                            @foreach($departments as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                            @endforeach
                        </select>
                        @error('passToDepId')
                        <p class="text-red-400 text-[10px] mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Reason Textarea -->
                    <div>
                        <label class="text-[10px] text-gray-500 light:text-gray-500 font-bold uppercase tracking-widest mb-1.5 block">
                            Reason for Passing
                        </label>
                        <textarea
                            wire:model="passReason"
                            rows="3"
                            placeholder="e.g. This issue falls under the jurisdiction of the Roads Department..."
                            class="w-full bg-[#12151e] light:bg-white border border-[#2a2d3a] light:border-gray-300 rounded-xl p-3 text-xs text-white light:text-gray-800 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-amber-500/30 transition-all resize-none"></textarea>
                        @error('passReason')
                        <p class="text-red-400 text-[10px] mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Button -->
                    <button
                        wire:click="passIssue"
                        wire:loading.attr="disabled"
                        class="w-full py-3 rounded-xl font-bold text-sm transition-all duration-200 active:scale-95 shadow-lg
                               bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400
                               text-[#0f1117] shadow-amber-500/20 flex items-center justify-center gap-2 disabled:opacity-60">
                        <span wire:loading.remove wire:target="passIssue">
                            <i class="fa-solid fa-share-from-square mr-1"></i>
                            Confirm & Pass Issue
                        </span>
                        <span wire:loading wire:target="passIssue" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                            Passing...
                        </span>
                    </button>
                </div>
            </div>
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