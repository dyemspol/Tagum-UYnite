<div>
    <div class="">
        <h2 class="text-xl font-semibold text-white light:text-gray-900 mb-10 transition-colors">Reports Management</h2>
        <div class="p-6 min-h-screen text-white font-sans transition-colors">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 p-4 rounded-lg shadow border border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <p class="text-sm text-gray-300 light:text-gray-600 transition-colors">Total Reports</p>
                    <p class="text-2xl font-bold text-white light:text-gray-900 transition-colors">{{ $totalReports }}</p>
                </div>
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 p-4 rounded-lg shadow border border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <p class="text-sm text-gray-300 light:text-gray-600 transition-colors">Pending</p>
                    <p class="text-2xl font-bold text-yellow-400 transition-colors">{{ $totalPending }}</p>
                </div>
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 p-4 rounded-lg shadow border border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <p class="text-sm text-gray-300 light:text-gray-600 transition-colors">Ongoing</p>
                    <p class="text-2xl font-bold text-purple-500 transition-colors">{{ $totalOngoing }}</p>
                </div>
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 p-4 rounded-lg shadow border border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <p class="text-sm text-gray-300 light:text-gray-600 transition-colors">Completed</p>
                    <p class="text-2xl font-bold text-green-500 transition-colors">{{ $totalResolved }}</p>
                </div>
            </div>


            <div class="flex gap-2 mb-4">
                <button wire:click="filterReports('all')" class="px-3 py-1 {{ $statusFilter == 'all' ? 'bg-[#00d4aa] text-[#0f1117] font-semibold' : 'bg-[#252836] light:bg-white light:text-gray-700 light:border light:border-gray-300' }} rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">All</button>
                <button wire:click="filterReports('pending')" class="px-3 py-1 {{ $statusFilter == 'pending' ? 'bg-[#00d4aa] text-[#0f1117] font-semibold' : 'bg-[#252836] light:bg-white light:text-gray-700 light:border light:border-gray-300' }} rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Pending</button>
                <button wire:click="filterReports('in_review')" class="px-3 py-1 {{ $statusFilter == 'in_review' ? 'bg-[#00d4aa] text-[#0f1117] font-semibold' : 'bg-[#252836] light:bg-white light:text-gray-700 light:border light:border-gray-300' }} rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Ongoing</button>
                <button wire:click="filterReports('resolved')" class="px-3 py-1 {{ $statusFilter == 'resolved' ? 'bg-[#00d4aa] text-[#0f1117] font-semibold' : 'bg-[#252836] light:bg-white light:text-gray-700 light:border light:border-gray-300' }} rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Completed</button>
            </div>


            <div class="bg-[#1a1d29] light:bg-white rounded-lg overflow-auto max-h-[420px] hide-scrollbar border border-[#2a2d3a] light:border-gray-200 transition-colors">
                <table class="min-w-full text-left text-gray-200 light:text-gray-700 text-sm transition-colors">
                    <thead class="bg-[#252836] light:bg-gray-50 transition-colors">
                        <tr>
                            <th class="px-4 py-3 text-white light:text-gray-900 transition-colors">ID</th>
                            <th class="px-4 py-3 text-white light:text-gray-900 transition-colors">Issue name</th>
                            <th class="px-4 py-3 text-white light:text-gray-900 transition-colors">Reported by</th>
                            <th class="px-4 py-3 text-white light:text-gray-900 transition-colors">Date</th>
                            <th class="px-4 py-3 text-white light:text-gray-900 transition-colors">Status</th>
                            <th class="px-4 py-3 text-white light:text-gray-900 rounded-r-lg transition-colors">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr class="border-t border-[#2a2d3a] light:border-gray-200 hover:bg-[#252836] light:hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-4 text-[#00d4aa]">#{{ $report->report_id }}</td>
                            <td class="px-4 py-4 light:text-gray-900 transition-colors">{{ $report->title }}</td>
                            <td class="px-4 py-4 light:text-gray-900 transition-colors">{{ ucfirst($report->user->first_name) }} {{ ucfirst($report->user->last_name) }}</td>
                            <td class="px-4 py-4 light:text-gray-900 transition-colors">{{ $report->created_at->format('m/d/Y') }}</td>
                            <td class="px-4 py-4 font-semibold
                                {{ $report->report_status == 'pending' ? 'text-yellow-400' : '' }}
                                {{ $report->report_status == 'in_review' ? 'text-purple-500' : '' }}
                                {{ $report->report_status == 'resolved' ? 'text-green-500' : '' }}
                            ">
                                {{ ucfirst($report->report_status == 'in_review' ? 'Ongoing' : ($report->report_status == 'resolved' ? 'Completed' : $report->report_status)) }}
                            </td>
                            <td class="px-4 py-4 flex gap-2">
                                <i wire:click="viewReport({{ $report->id }})" class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300 cursor-pointer"></i>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>


    </div>
    @include('components.viewOnlyIssueModal')
</div>