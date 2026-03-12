<div>
    <div class="">
        <h2 class="text-xl font-semibold light:text-gray-900 text-white mb-6">City Overview</h2>
        {{-- KPI Cards--}}
        <div class="grid grid-cols-1 grid-row-2 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 transition-colors
                    rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a] light:border-gray-200">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 light:text-gray-600 text-sm transition-colors">New Reports</span>
                    <i class="fa-solid fa-file-lines text-gray-400 light:text-gray-500 transition-colors"></i>
                </div>
                <div class="mt-3 ">
                    <h2 class="text-3xl font-bold text-white light:text-gray-900 transition-colors">{{ $newReports ? $newReports->count() : 0 }}</h2>
                    <p class="text-sm mt-1 {{ $newReportsPercentage >= 0 ? ($newReportsPercentage > 0 ? 'text-red-500' : 'text-gray-400 light:text-gray-500') : 'text-green-500' }} transition-colors">
                        @if($newReportsPercentage > 0)
                        ↑ +{{ number_format($newReportsPercentage, 1) }}%
                        @elseif($newReportsPercentage < 0)
                            ↓ {{ number_format($newReportsPercentage, 1) }}%
                            @else
                            No change
                            @endif
                            <span class="text-gray-400 light:text-gray-500">from yesterday</span>
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 transition-colors rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a] light:border-gray-200">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 light:text-gray-600 text-sm transition-colors">Active Issue</span>
                    <i class="fa-solid fa-triangle-exclamation text-red-500 transition-colors"></i>
                </div>
                <div class="mt-3">
                    <h2 class="text-3xl font-bold text-white light:text-gray-900 transition-colors">{{ $activeIssues ? $activeIssues->count() : 0 }}</h2>
                    <p class="text-gray-400 light:text-gray-500 text-sm mt-1 transition-colors">Urgent attention needed</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 transition-colors rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a] light:border-gray-200">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 light:text-gray-600 text-sm transition-colors">Resolved Week</span>
                    <i class="fa-solid fa-circle-check text-green-500 transition-colors"></i>
                </div>
                <div class="mt-3">
                    <h2 class="text-3xl font-bold text-white light:text-gray-900 transition-colors">{{ $resolvedWeek ? $resolvedWeek->count() : 0 }}</h2>
                    <p class="text-gray-400 light:text-gray-500 text-sm mt-1 transition-colors">Finalized in last 7 days</p>
                </div>
            </div>



        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <!-- Recent User Reports -->
            <div class="col-span-2 bg-[#1a1d29] light:bg-gray-50 p-4 rounded-lg shadow max-h-[250px] relative group overflow-hidden">
                <h2 class="font-medium text-white light:text-gray-900 text-lg mb-4">Recent User Reports (News Feed)</h2>
                <div class="space-y-3 max-h-[185px] overflow-y-auto hide-scrollbar pb-8">
                    @foreach($newReports as $report)
                    <div class="flex justify-between items-center bg-[#252836] light:bg-white p-3 rounded-xl border border-[#2a2d3a] light:border-gray-200 shadow-sm transition-all hover:translate-x-1 hover:bg-[#2d3142] light:hover:bg-gray-100">
                        <div>
                            <p class="font-regular text-sm light:text-gray-900 text-white">{{ $report->title }} - {{$report->street_purok}}, {{ $report->barangay->barangay_name}}, Tagum</p>
                            <p class="text-xs text-red-500 font-medium">{{ $report->priority_level }} · {{ $report->created_at->diffForHumans() }}</p>
                        </div>
                        <button class="text-white hover:text-gray-400 light:text-gray-600 transition-all hover:scale-125">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
                <!-- Fade Gray Effect -->
                <div class="absolute bottom-0 left-0 right-0 h-10 bg-linear-to-t from-[#1a1d29] light:from-gray-50 to-transparent pointer-events-none"></div>
            </div>


            <!-- Critical Watchlist -->
            <div class="bg-[#1a1d29] light:bg-gray-50 p-4 rounded-lg shadow overflow-y-auto w-full hide-scrollbar">
                <h2 class="font-medium text-white light:text-gray-900 text-lg mb-4"><span><i class="fa-solid text-[#fd0000] pr-2 fa-exclamation"></i></span>Critical Watchlist</h2>
                <div class="space-y-3">
                    @foreach($criticalIssues as $active)
                    <div class="flex justify-between items-center bg-[#252836] light:bg-white p-3 rounded-xl border border-[#2a2d3a] light:border-gray-200 shadow-sm transition-all hover:bg-[#2d3142] light:hover:bg-gray-100">
                        <div>
                            <p class="text-white light:text-gray-900 text-sm font-regular">{{$active->title}} - {{$active->street_purok}}, {{$active->barangay->barangay_name}}, Tagum</p>
                            <p class="text-xs text-red-500 font-medium">{{$active->priority_level}} · {{$active->created_at->diffForHumans()}}</p>
                        </div>
                        <form action="{{route('tracker')}}" method="GET">
                            @csrf
                            <button type="submit" class="bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200 ring-1 ring-red-500/20">Resolve</button>
                        </form>
                    </div>
                    @endforeach
                </div>
                @if($criticalIssues->count() > 0)
                <form action="{{route('tracker')}}" method="GET">
                    @csrf
                    <button type="submit" class="w-full mt-5 bg-gray-700 light:bg-white light:text-gray-700 light:border light:border-gray-200 text-white py-2.5 rounded-xl font-medium hover:bg-gray-600 light:hover:bg-gray-50 transition-all shadow-sm">View All →</button>
                </form>
                @else
                <p class="text-gray-400 text-sm mt-4 text-center">No critical issues</p>
                @endif
            </div>
            <!-- <div class="bg-[#1a1d29] p-4 rounded-lg shadow border border-[#2a2d3a]">
                <h3 class="text-white mb-2">Issues by Category</h3>
                <canvas id="issuesBarChart"></canvas>
            </div> -->

        </div>
    </div>
</div>