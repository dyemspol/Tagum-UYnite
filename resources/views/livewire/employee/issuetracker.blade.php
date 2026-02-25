<div>
    <h2 class="text-xl font-semibold text-white mb-6">Issue Tracker</h2>

    <!-- Kanban Board -->
    <div class="grid grid-cols-3 gap-4">

        <!-- Column 1: Critical -->
        <div class="bg-[#173a5c] rounded-2xl shadow-lg overflow-hidden">
            <!-- Column Header -->
            <div class="px-5 py-4 bg-[#1e4a73] flex items-center justify-between border-b border-white/10">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                    <h3 class="text-white font-semibold text-sm">Critical</h3>
                </div>
                <span id="criticalCount" class="text-xs bg-red-500/20 text-red-400 border border-red-500/30 px-2 py-0.5 rounded-full font-medium">1</span>
            </div>

            <!-- Cards -->
            <div id="criticalList" class="p-3 flex flex-col gap-3 min-h-[400px] list">
                <!-- Card -->
                <div class="bg-[#0f2a43] border border-white/10 rounded-xl p-4 cursor-grab hover:border-red-500/40 transition-all duration-200">
                    <div class="flex items-start justify-between mb-3">
                        <span class="text-xs bg-purple-500/15 text-purple-400 border border-purple-500/25 px-2 py-0.5 rounded-full">Security</span>
                        <span class="text-blue-300 text-xs font-mono">#1021</span>
                    </div>
                    <p class="text-white text-sm font-medium mb-1">Broken gate lock Unit 4B</p>
                    <p class="text-gray-400 text-xs mb-3">Reported by <span class="text-gray-300">Jose R.</span></p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-xs">07/10/25</span>
                        <i class="hgi hgi-stroke hgi-view text-lg text-gray-400 hover:text-blue-400 cursor-pointer transition-colors"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 2: Ongoing -->
        <div class="bg-[#173a5c] rounded-2xl shadow-lg overflow-hidden">
            <!-- Column Header -->
            <div class="px-5 py-4 bg-[#1e4a73] flex items-center justify-between border-b border-white/10">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
                    <h3 class="text-white font-semibold text-sm">Ongoing</h3>
                </div>
                <span id="ongoingCount" class="text-xs bg-yellow-400/20 text-yellow-400 border border-yellow-400/30 px-2 py-0.5 rounded-full font-medium">1</span>
            </div>

            <!-- Cards -->
            <div id="ongoingList" class="p-3 flex flex-col gap-3 min-h-[400px] list">
                <!-- Card -->
                <div class="bg-[#0f2a43] border border-white/10 rounded-xl p-4 cursor-grab hover:border-yellow-400/40 transition-all duration-200">
                    <div class="flex items-start justify-between mb-3">
                        <span class="text-xs bg-red-500/15 text-red-400 border border-red-500/25 px-2 py-0.5 rounded-full">Noise</span>
                        <span class="text-blue-300 text-xs font-mono">#1020</span>
                    </div>
                    <p class="text-white text-sm font-medium mb-1">Loud construction Unit 5F</p>
                    <p class="text-gray-400 text-xs mb-3">Reported by <span class="text-gray-300">Carlo M.</span></p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-xs">05/10/25</span>
                        <i class="hgi hgi-stroke hgi-view text-lg text-gray-400 hover:text-blue-400 cursor-pointer transition-colors"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 3: Resolved -->
        <div class="bg-[#173a5c] rounded-2xl shadow-lg overflow-hidden">
            <!-- Column Header -->
            <div class="px-5 py-4 bg-[#1e4a73] flex items-center justify-between border-b border-white/10">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-green-400"></span>
                    <h3 class="text-white font-semibold text-sm">Resolved</h3>
                </div>
                <span id="resolvedCount" class="text-xs bg-green-400/20 text-green-400 border border-green-400/30 px-2 py-0.5 rounded-full font-medium">1</span>
            </div>

            <!-- Cards -->
            <div id="resolvedList" class="p-3 flex flex-col gap-3 min-h-[400px] list">
                <!-- Card -->
                <div class="bg-[#0f2a43] border border-white/10 rounded-xl p-4 cursor-grab hover:border-green-400/40 transition-all duration-200">
                    <div class="flex items-start justify-between mb-3">
                        <span class="text-xs bg-blue-500/15 text-blue-400 border border-blue-500/25 px-2 py-0.5 rounded-full">Plumbing</span>
                        <span class="text-blue-300 text-xs font-mono">#1012</span>
                    </div>
                    <p class="text-white text-sm font-medium mb-1">Clogged drain Unit 1C</p>
                    <p class="text-gray-400 text-xs mb-3">Reported by <span class="text-gray-300">Ben G.</span></p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-xs">28/09/25</span>
                        <i class="hgi hgi-stroke hgi-view text-lg text-gray-400 hover:text-blue-400 cursor-pointer transition-colors"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
const lists = document.querySelectorAll('.list');

lists.forEach(list => {
  new Sortable(list, {
    group: 'shared',
    animation: 150,
    ghostClass: 'opacity-50'
  });
});
</script>