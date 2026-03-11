<div x-data="{ 
       
        showStaffModal: false, 
        selectedStaff: null 
    }"
    @close-modal.window="showStaffModal = false">
    <div>
        <div class="">
            <h2 class="text-xl font-semibold text-white light:text-gray-900 mb-6 transition-colors">Super Admin Overview</h2>

            {{-- KPI Cards--}}
            <div class="grid grid-cols-1 grid-row-2 sm:grid-cols-2 md:grid-cols-3 gap-6">

                <!-- Card 1: Total Staff -->
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <div class="flex justify-between items-start">
                        <span class="text-gray-300 light:text-gray-600 text-sm transition-colors">Total Staff</span>
                        <i class="fa-solid fa-users text-gray-400 light:text-gray-500 transition-colors"></i>
                    </div>
                    <div class="mt-3">
                        <h2 class="text-3xl font-bold text-white light:text-gray-900 transition-colors">{{ $staff ?? 0 }}</h2>
                        <p class="text-green-500 text-sm mt-1 transition-colors">All registered staff</p>
                    </div>
                </div>

                <!-- Card 2: Total by Department -->
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <div class="flex justify-between items-start">
                        <span class="text-gray-300 light:text-gray-600 text-sm transition-colors">Total by Department</span>
                        <i class="fa-solid fa-building text-gray-400 light:text-gray-500 transition-colors"></i>
                    </div>
                    <div class="mt-3">
                        <h2 class="text-3xl font-bold text-white light:text-gray-900 transition-colors">{{ $staffdepartment ?? 0 }}</h2>
                        <p class="text-green-500 text-sm mt-1 transition-colors">Departments with staff</p>
                    </div>
                </div>

                <!-- Card 3: Total Account Reviews -->
                <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] light:from-white light:to-gray-100 rounded-xl p-5 flex flex-col justify-between shadow-md border border-[#2a2d3a] light:border-gray-200 transition-colors">
                    <div class="flex justify-between items-start">
                        <span class="text-gray-300 light:text-gray-600 text-sm transition-colors">Pending Accounts</span>
                        <i class="fa-solid fa-user-clock text-gray-400 light:text-gray-500 transition-colors"></i>
                    </div>
                    <div class="mt-3">
                        <h2 class="text-3xl font-bold text-white light:text-gray-900 transition-colors">{{ $users ?? 0 }}</h2>
                        <p class="text-yellow-500 text-sm mt-1 transition-colors">Accounts waiting for review</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 bg-[#1a1d29] light:bg-[#f8fafc] p-4 rounded-lg shadow border border-[#2a2d3a] light:border-gray-200 transition-colors">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-white light:text-gray-900 font-medium text-lg transition-colors">Newly Registered Users</h2>
                    <a href="{{ route('accountReview') }}" class="text-[#00d4aa] hover:text-[#00e6b8] text-sm font-semibold transition-colors">See All →</a>
                </div>

                <div class="space-y-3 max-h-[250px] overflow-y-auto hide-scrollbar">
                    <!-- Sample User Item -->


                    @foreach ($newusers as $user)
                    <div class="flex justify-between items-center bg-[#252836] light:bg-white p-3 rounded border border-transparent light:border-gray-200 transition-colors">
                        <div>
                            <p class="text-white light:text-gray-900 text-sm transition-colors">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</p>
                            <p class="text-xs text-gray-300 light:text-gray-500 transition-colors">Registered · {{ $user->created_at->diffForHumans() }}</p>
                        </div>
                        <i wire:click="showUser({{ $user->id }})" class="hgi hgi-stroke hgi-eye text-2xl text-[#00d4aa] hover:text-[#00e6b8] cursor-pointer transition-colors"></i>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('components.residentAccountDetails')
    <div />