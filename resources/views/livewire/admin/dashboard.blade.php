<div x-data="{ 
       
        showStaffModal: false, 
        selectedStaff: null 
    }" 
    @close-modal.window="showStaffModal = false">
<div>
    <div class="">
        <h2 class="text-xl font-semibold text-white mb-6">Super Admin Overview</h2>

        {{-- KPI Cards--}}
        <div class="grid grid-cols-1 grid-row-2 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <!-- Card 1: Total Staff -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a]">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 text-sm">Total Staff</span>
                    <i class="fa-solid fa-users text-gray-400"></i>
                </div>
                <div class="mt-3">
                    <h2 class="text-3xl font-bold text-white">{{ $totalStaff ?? 0 }}</h2>
                    <p class="text-green-500 text-sm mt-1">All registered staff</p>
                </div>
            </div>

            <!-- Card 2: Total by Department -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a]">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 text-sm">Total by Department</span>
                    <i class="fa-solid fa-building text-gray-400"></i>
                </div>
                <div class="mt-3">
                    <h2 class="text-3xl font-bold text-white">{{ $totalDepartments ?? 0 }}</h2>
                    <p class="text-green-500 text-sm mt-1">Departments with staff</p>
                </div>
            </div>

            <!-- Card 3: Total Account Reviews -->
            <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a]">
                <div class="flex justify-between items-start">
                    <span class="text-gray-300 text-sm">Pending Accounts</span>
                    <i class="fa-solid fa-user-clock text-gray-400"></i>
                </div>
                <div class="mt-3">
                    <h2 class="text-3xl font-bold text-white">{{ $totalPendingAccounts ?? 0 }}</h2>
                    <p class="text-green-500 text-sm mt-1">Accounts waiting for review</p>
                </div>
            </div>
        </div>

        <div class="mt-6 bg-[#1a1d29] p-4 rounded-lg shadow border border-[#2a2d3a]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-white font-medium text-lg">Newly Registered Users</h2>
                <a href="{{ route('accountReview') }}" class="text-[#00d4aa] hover:text-[#00e6b8] text-sm font-semibold">See All →</a>
            </div>

            <div class="space-y-3 max-h-[250px] overflow-y-auto hide-scrollbar">
                <!-- Sample User Item -->
                

               
                <div class="flex justify-between items-center bg-[#252836] p-3 rounded">
                    <div>
                        <p class="text-white text-sm">Pedro Reyes</p>
                        <p class="text-xs text-gray-300">Registered · 3 Hours ago</p>
                    </div>
                    <button @click="showStaffModal = true" class="text-white bg-[#2a2d3a] hover:bg-[#363944] px-2 py-1 rounded">View</button>
                </div>
                <!-- Add more items as needed -->
            </div>
        </div>
    </div>
</div>

<div/>

@include('components.staffAccountDetails')