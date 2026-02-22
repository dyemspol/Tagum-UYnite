<div>
    <div class="">
        <h2 class="text-xl font-semibold text-white mb-10">Issue Tracker</h2>
        <div class="flex space-x-6 text-white">
            <p id="activeIssueNavigation">Active Issue</p>
            <p id="scheduledNavigation">Scheduled</p>
            <p id="historyNavigation">History</p>
        </div>
        <hr class="text-[#ffffff1b] my-4">

        {{-- Active Issues SECTION --}}
        <div id="activeIssuesSection" class="bg-[#173a5c] p-6 rounded-2xl shadow-lg overflow-auto">

            <table class="w-full text-sm text-left text-gray-200">
                <thead>
                    <tr class="bg-[#244c72] text-white rounded-lg">
                        <th class="px-4 py-3 rounded-l-lg">Type</th>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Issue name</th>
                        <th class="px-4 py-3">Reported by</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 rounded-r-lg">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-t border-[#ffffff1a]">
                        <td class="px-4 py-4">Noise</td>
                        <td class="px-4 py-4 text-blue-300">#1023</td>
                        <td class="px-4 py-4">Saba ang karaoke</td>
                        <td class="px-4 py-4">Khristian divvv</td>
                        <td class="px-4 py-4">09/10/25</td>

                        <td class="px-4 py-4">
                            <span class="text-red-500 font-semibold">Critical</span>
                        </td>

                        <td class="px-4 py-4 flex space-x-1 items-center gap-2">
                            <i onclick="document.getElementById('issueModal').style.display = 'flex'" class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300 cursor-pointer"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        {{-- SCHEDULED SECTION --}}

        <div id="scheduledSection" class="bg-[#173a5c] p-6 rounded-2xl shadow-lg overflow-auto">

            <table class="w-full text-sm text-left text-gray-200">
                <thead>
                    <tr class="bg-[#244c72] text-white rounded-lg">
                        <th class="px-4 py-3 rounded-l-lg">Type</th>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Issue name</th>
                        <th class="px-4 py-3">Reported by</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 rounded-r-lg">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-t border-[#ffffff1a]">
                        <td class="px-4 py-4">Noise</td>
                        <td class="px-4 py-4 text-blue-300">#1023</td>
                        <td class="px-4 py-4">Saba ang karaoke</td>
                        <td class="px-4 py-4">Khristian divvv</td>
                        <td class="px-4 py-4">09/10/25</td>

                        <td class="px-4 py-4">
                            <span class="text-[#CFDE02] font-semibold">Ongoing</span>
                        </td>

                        <td class="px-4 py-4 flex space-x-1 items-center gap-2">
                            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        {{-- HISTORY SECTION --}}
        <div id="historySection" class="bg-[#173a5c] p-6 rounded-2xl shadow-lg overflow-auto">

            <table class="w-full text-sm text-left text-gray-200">
                <thead>
                    <tr class="bg-[#244c72] text-white rounded-lg">
                        <th class="px-4 py-3 rounded-l-lg">Type</th>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Issue name</th>
                        <th class="px-4 py-3">Reported by</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 rounded-r-lg">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-t border-[#ffffff1a]">
                        <td class="px-4 py-4">Noise</td>
                        <td class="px-4 py-4 text-blue-300">#1023</td>
                        <td class="px-4 py-4">Saba ang karaoke</td>
                        <td class="px-4 py-4">Khristian divvv</td>
                        <td class="px-4 py-4">09/10/25</td>

                        <td class="px-4 py-4">
                            <span class="text-[#00FF37] font-semibold">Resolved</span>
                        </td>

                        <td class="px-4 py-4 flex space-x-1 items-center gap-2">
                            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>




    </div>
</div>