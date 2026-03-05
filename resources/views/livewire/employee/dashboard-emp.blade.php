<div>
    <div class="">
        <h2 class="text-xl font-semibold text-white mb-6">City Overview</h2>
        {{-- KPI Cards--}}
        <div class="grid grid-cols-1 grid-row-2 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836]
rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a]">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 text-sm">New Reports</span>
                    <i class="fa-solid fa-file-lines text-gray-400"></i>
                </div>
                <div class="mt-3 ">
                    <h2 class="text-3xl font-bold text-white">{{ $newReports ? $newReports->count() : 0 }}</h2>
                    <p class="text-sm mt-1 {{ $newReportsPercentage >= 0 ? ($newReportsPercentage > 0 ? 'text-red-500' : 'text-gray-400') : 'text-green-500' }}">
                        @if($newReportsPercentage > 0)
                        ↑ +{{ number_format($newReportsPercentage, 1) }}%
                        @elseif($newReportsPercentage < 0)
                            ↓ {{ number_format($newReportsPercentage, 1) }}%
                            @else
                            No change
                            @endif
                            <span class="text-gray-400">from yesterday</span>
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a]">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 text-sm">Active Issue</span>
                    <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                </div>
                <div class="mt-3">
                    <h2 class="text-3xl font-bold text-white">{{ $activeIssues ? $activeIssues->count() : 0 }}</h2>
                    <p class="text-gray-400 text-sm mt-1">Urgent attention needed</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a]">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 text-sm">Resolved Week</span>
                    <i class="fa-solid fa-circle-check text-green-500"></i>
                </div>
                <div class="mt-3">
                    <h2 class="text-3xl font-bold text-white">{{ $resolvedWeek ? $resolvedWeek->count() : 0 }}</h2>
                    <p class="text-gray-400 text-sm mt-1">Finalized in last 7 days</p>
                </div>
            </div>



        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <!-- Recent User Reports -->
            <div class="col-span-2 bg-[#1a1d29] p-4 rounded-lg shadow max-h-[250px] overflow-y-auto hide-scrollbar border border-[#2a2d3a]">
                <h2 class="font-medium text-white text-lg mb-4">Recent User Reports (News Feed)</h2>
                <div class="space-y-3">
                    @foreach($newReports as $report)
                    <div class="flex justify-between items-center bg-[#252836] p-3 rounded">
                        <div>
                            <p class="font-regular text-sm text-white">{{ $report->title }} - {{$report->street_purok}}, {{ $report->barangay->barangay_name}}, Tagum</p>
                            <p class="text-xs text-red-500">{{ $report->priority_level }} · {{ $report->created_at->diffForHumans() }}</p>
                        </div>
                        <button class="text-white">→</button>
                    </div>
                    @endforeach



                </div>
            </div>


            <!-- Critical Watchlist -->
            <div class="bg-[#1a1d29] p-4 rounded-lg overflow-y-auto w-full hide-scrollbar border border-[#2a2d3a]">
                <h2 class="font-medium text-white text-lg mb-4"><span><i class="fa-solid text-[#fd0000] pr-2 fa-exclamation"></i></span>Critical Watchlist</h2>
                <div class="space-y-3">
                    @foreach($criticalIssues as $active)
                    <div class="flex justify-between items-center bg-[#252836] p-3 rounded">
                        <div>
                            <p class="text-white text-sm">{{$active-> title}} - {{$active->street_purok}}, {{$active->barangay->barangay_name}}, Tagum</p>
                            <p class="text-xs text-red-500">{{$active->priority_level}} · {{$active->created_at->diffForHumans()}}</p>
                        </div>
                        <form action={{route('tracker')}} method="GET">
                            @csrf
                            <button type=submit class="bg-[#ff00003b]  text-[#e40000] px-2 py-1 rounded hover:bg-[#ff000050]">Resolve</button>
                        </form>
                    </div>
                    @endforeach
                </div>
                @if($criticalIssues->count() > 0)
                <form action={{route('tracker')}} method="GET">
                    @csrf
                    <button type=submit class="w-full mt-4 bg-gray-500 text-white py-2 rounded">View All →</button>
                </form>
                @else
                <p class="text-gray-400 text-sm mt-1">No critical issues</p>
                @endif
            </div>
            <!-- <div class="bg-[#1a1d29] p-4 rounded-lg shadow border border-[#2a2d3a]">
                <h3 class="text-white mb-2">Issues by Category</h3>
                <canvas id="issuesBarChart"></canvas>
            </div> -->

        </div>
    </div>
</div>