<div x-data="{ 
        showIssueModal: false,  
    }"
    @close-modal.window="showIssueModal = false">
    <div>
        <h2 class="text-xl font-semibold text-white light:text-gray-900 mb-6 transition-colors">Issue Tracker</h2>

        <div class="mb-4">
            @if(session()->has('success'))
            <div class="bg-green-500/20 text-green-400 border border-green-500/30 px-2 py-0.5 rounded-full font-medium">{{ session('success') }}</div>
            @endif
            @if(session()->has('error'))
            <div class="bg-red-500/20 text-red-400 border border-red-500/30 px-2 py-0.5 rounded-full font-medium">{{ session('error') }}</div>
            @endif
        </div>
        <!-- Kanban Board -->
        <div class="grid grid-cols-3 gap-4">

            <!-- Column 1: Critical -->
            <div class="bg-[#1a1d29] light:bg-[#f8fafc] rounded-2xl shadow-lg overflow-hidden border border-[#2a2d3a] light:border-gray-200 transition-colors">
                <!-- Column Header -->
                <div class="px-5 py-4 bg-[#252836] light:bg-white flex items-center justify-between border-b border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                        <h3 class="text-white light:text-gray-900 font-semibold text-sm transition-colors">Critical</h3>
                    </div>
                    <span id="criticalCount" class="text-xs bg-red-500/20 text-red-400 border border-red-500/30 px-2 py-0.5 rounded-full font-medium">{{ $high->count() }}</span>
                </div>

                <!-- Cards -->
                <div id="criticalList" data-priority="high" class="p-3 flex flex-col gap-3 min-h-[400px] list">
                    <!-- Card -->
                    @foreach($high as $report)
                    <div data-id="{{ $report->id }}" wire:key="high-{{ $report->id }}" class="bg-[#12151e] light:bg-white border border-[#2a2d3a] light:border-gray-200 rounded-xl p-4 cursor-grab hover:border-red-500/40 light:hover:border-red-500 transition-all duration-200 light:shadow-sm">
                        <div class="flex items-start justify-between mb-3">
                            <span class="text-xs bg-purple-500/15 text-purple-400 border border-purple-500/25 px-2 py-0.5 rounded-full">{{ $categories }}</span>
                            <span class="text-[#00d4aa] text-xs font-mono">#{{ $report->report_id }}</span>
                        </div>
                        <p class="text-white light:text-gray-900 text-sm font-medium mb-1 transition-colors">{{ $report->title }}</p>
                        <p class="text-gray-400 light:text-gray-500 text-xs mb-3 transition-colors">Reported by <span class="text-gray-300 light:text-gray-700">{{ $report->user->first_name }} {{ $report->user->last_name }}</span></p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 light:text-gray-400 text-xs transition-colors">{{ $report->created_at->format('d/m/Y') }}</span>
                            <i wire:click="viewIssue({{ $report->id }})" class="hgi hgi-stroke hgi-view text-lg text-gray-400 hover:text-[#00d4aa] cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Column 2: Ongoing -->
            <div class="bg-[#1a1d29] light:bg-[#f8fafc] rounded-2xl shadow-lg overflow-hidden border border-[#2a2d3a] light:border-gray-200 transition-colors">
                <!-- Column Header -->
                <div class="px-5 py-4 bg-[#252836] light:bg-white flex items-center justify-between border-b border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-orange-400"></span>
                        <h3 class="text-white light:text-gray-900 font-semibold text-sm transition-colors">Medium</h3>
                    </div>
                    <span id="ongoingCount" class="text-xs bg-orange-400/20 text-orange-400 border border-orange-400/30 px-2 py-0.5 rounded-full font-medium">{{ $medium->count() }}</span>
                </div>

                <!-- Cards -->
                <div id="ongoingList" data-priority="medium" class="p-3 flex flex-col gap-3 min-h-[400px] list">
                    <!-- Card -->
                    @foreach($medium as $report)
                    <div data-id="{{ $report->id }}" wire:key="medium-{{ $report->id }}" class="bg-[#12151e] light:bg-white border border-[#2a2d3a] light:border-gray-200 rounded-xl p-4 cursor-grab hover:border-yellow-400/40 light:hover:border-orange-400 transition-all duration-200 light:shadow-sm">
                        <div class="flex items-start justify-between mb-3">
                            <span class="text-xs bg-red-500/15 text-red-400 border border-red-500/25 px-2 py-0.5 rounded-full">{{ $categories }}</span>
                            <span class="text-[#00d4aa] text-xs font-mono">#{{ $report->report_id }}</span>
                        </div>
                        <p class="text-white light:text-gray-900 text-sm font-medium mb-1 transition-colors">{{ $report->title }}</p>
                        <p class="text-gray-400 light:text-gray-500 text-xs mb-3 transition-colors">Reported by <span class="text-gray-300 light:text-gray-700">{{ $report->user->first_name }} {{ $report->user->last_name }}</span></p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 light:text-gray-400 text-xs transition-colors">{{ $report->created_at->format('d/m/Y') }}</span>
                            <i wire:click="viewIssue({{ $report->id }})" class="hgi hgi-stroke hgi-view text-lg text-gray-400 hover:text-[#00d4aa] cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Column 3: Resolved -->
            <div class="bg-[#1a1d29] light:bg-[#f8fafc] rounded-2xl shadow-lg overflow-hidden border border-[#2a2d3a] light:border-gray-200 transition-colors">
                <!-- Column Header -->
                <div class="px-5 py-4 bg-[#252836] light:bg-white flex items-center justify-between border-b border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
                        <h3 class="text-white light:text-gray-900 font-semibold text-sm transition-colors">Low</h3>
                    </div>
                    <span id="resolvedCount" class="text-xs bg-yellow-400/20 text-yellow-400 border border-yellow-400/30 px-2 py-0.5 rounded-full font-medium">{{ $low->count() }}</span>
                </div>

                <!-- Cards -->
                <div id="resolvedList" data-priority="low" class="p-3 flex flex-col gap-3 min-h-[400px] list">
                    <!-- Card -->
                    @foreach($low as $report)
                    <div data-id="{{ $report->id }}" wire:key="low-{{ $report->id }}" class="bg-[#12151e] light:bg-white border border-[#2a2d3a] light:border-gray-200 rounded-xl p-4 cursor-grab hover:border-green-400/40 light:hover:border-green-400 transition-all duration-200 light:shadow-sm">
                        <div class="flex items-start justify-between mb-3">
                            <span class="text-xs bg-[#00d4aa]/15 text-[#00d4aa] border border-[#00d4aa]/25 px-2 py-0.5 rounded-full">{{ $categories }}</span>
                            <span class="text-[#00d4aa] text-xs font-mono">{{ $report->report_id }}</span>
                        </div>
                        <p class="text-white light:text-gray-900 text-sm font-medium mb-1 transition-colors">{{ $report->title }}</p>
                        <p class="text-gray-400 light:text-gray-500 text-xs mb-3 transition-colors">Reported by <span class="text-gray-300 light:text-gray-700">{{ $report->user->first_name }} {{ $report->user->last_name }}</span></p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 light:text-gray-400 text-xs transition-colors">{{ $report->created_at->format('d/m/Y') }}</span>
                            <i wire:click="viewIssue({{ $report->id }})" class="hgi hgi-stroke hgi-view text-lg text-gray-400 hover:text-[#00d4aa] cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('components.viewIssueModal', ['selectedReport' => $selectedReport])


    </div>


    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    @script
    <script>
        const lists = document.querySelectorAll('.list');

        lists.forEach(list => {
            new Sortable(list, {
                group: 'shared',
                animation: 150,
                ghostClass: 'opacity-50',

                onEnd: function(evt) {
                    let reportId = evt.item.getAttribute('data-id');
                    let newPriority = evt.to.getAttribute('data-priority');



                    $wire.updatePriority(reportId, newPriority);
                }
            });
        });
    </script>
    @endscript
</div>