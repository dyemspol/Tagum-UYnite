<div>
    <div class="">
        <h2 class="text-xl font-semibold text-white mb-10">Reports Management</h2>
        <div class="p-6 min-h-screen text-white font-sans">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] p-4 rounded-lg shadow border border-[#2a2d3a]">
                    <p class="text-sm">Total Reports</p>
                    <p class="text-2xl font-bold">{{ $totalReports }}</p>
                </div>
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] p-4 rounded-lg shadow border border-[#2a2d3a]">
                    <p class="text-sm">Pending</p>
                    <p class="text-2xl font-bold text-yellow-400">{{ $totalPending }}</p>
                </div>
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] p-4 rounded-lg shadow border border-[#2a2d3a]">
                    <p class="text-sm">Ongoing</p>
                    <p class="text-2xl font-bold text-purple-500">{{ $totalOngoing }}</p>
                </div>
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] p-4 rounded-lg shadow border border-[#2a2d3a]">
                    <p class="text-sm">Completed</p>
                    <p class="text-2xl font-bold text-green-500">{{ $totalResolved }}</p>
                </div>
            </div>


            <div class="flex gap-2 mb-4">
                <button wire:click="filterReports('all')" class="px-3 py-1 {{ $statusFilter == 'all' ? 'bg-[#00d4aa] text-[#0f1117] font-semibold' : 'bg-[#252836]' }} rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">All</button>
                <button wire:click="filterReports('pending')" class="px-3 py-1 {{ $statusFilter == 'pending' ? 'bg-[#00d4aa] text-[#0f1117] font-semibold' : 'bg-[#252836]' }} rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Pending</button>
                <button wire:click="filterReports('in_review')" class="px-3 py-1 {{ $statusFilter == 'in_review' ? 'bg-[#00d4aa] text-[#0f1117] font-semibold' : 'bg-[#252836]' }} rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Ongoing</button>
                <button wire:click="filterReports('resolved')" class="px-3 py-1 {{ $statusFilter == 'resolved' ? 'bg-[#00d4aa] text-[#0f1117] font-semibold' : 'bg-[#252836]' }} rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Completed</button>
            </div>


            <div class="bg-[#1a1d29] rounded-lg overflow-auto max-h-[420px] hide-scrollbar border border-[#2a2d3a]">
                <table class="min-w-full text-left text-gray-200 text-sm">
                    <thead class="bg-[#252836]">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Issue name</th>
                            <th class="px-4 py-3">Reported by</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 rounded-r-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
                            <td class="px-4 py-4 text-[#00d4aa]">#{{ $report->report_id }}</td>
                            <td class="px-4 py-4">{{ $report->title }}</td>
                            <td class="px-4 py-4">{{ ucfirst($report->user->first_name) }} {{ ucfirst($report->user->last_name) }}</td>
                            <td class="px-4 py-4">{{ $report->created_at->format('m/d/Y') }}</td>
                            <td class="px-4 py-4 font-semibold
                                {{ $report->report_status == 'pending' ? 'text-yellow-400' : '' }}
                                {{ $report->report_status == 'in_review' ? 'text-purple-500' : '' }}
                                {{ $report->report_status == 'resolved' ? 'text-green-500' : '' }}
                            ">
                                {{ ucfirst($report->report_status == 'in_review' ? 'Ongoing' : ($report->report_status == 'resolved' ? 'Completed' : $report->report_status)) }}
                            </td>
                            <td class="px-4 py-4 flex gap-2">
                                <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                                <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>


    </div>
</div>