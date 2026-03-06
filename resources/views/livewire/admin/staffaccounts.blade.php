<div x-data="{ 
        showCreateModal: false, 
        showStaffModal: false, 
        selectedStaff: null 
    }" 
    @close-modal.window="showCreateModal = false">
    <div class="flex justify-between items-center  mb-10">
        <h2 class="text-xl font-semibold text-white">
            Staff Accounts
        </h2>

        <button type="button" @click="showCreateModal = true"
            class="bg-[#00d4aa] hover:bg-[#00e6b8] text-[#0f1117] font-semibold px-6 py-1 rounded-lg transition-all duration-300">
            Create Account
        </button>
    </div>
    <div id="staffAccountsSection" class="bg-[#1a1d29] p-6 rounded-2xl shadow-lg overflow-auto border border-[#2a2d3a]">
        @if (session()->has('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center justify-between transition-all duration-300">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-white/50 hover:text-white">&times;</button>
        </div>
        @endif

        @if (session()->has('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center justify-between transition-all duration-300">
            <span>{{ session('error') }}</span>
            <button @click="show = false" class="ml-4 text-white/50 hover:text-white">&times;</button>
        </div>
        @endif
        <table class="w-full text-sm text-left text-gray-200">
            <thead>
                <tr class="bg-[#252836] text-white rounded-lg">
                    <th class="px-4 py-3 rounded-l-lg">Staff ID</th>
                    <th class="px-4 py-3">Full Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Department</th>
                    <th class="px-4 py-3 rounded-r-lg">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr class="border-t border-[#2a2d3a]">
                    <td class="px-4 py-4 text-[#00d4aa]">#STF-{{ $user->id }}</td>
                    <td class="px-4 py-4">{{ $user->first_name . ' ' . $user->last_name }}</td>
                    <td class="px-4 py-4">{{ $user->email }}</td>
                    <td class="px-4 py-4">{{ $user->department?->department_name ?? 'N/A' }}</td>

                    <td class="px-4 py-4 flex gap-3 items-center">
                        <i @click="showStaffModal = true"
                        class="hgi hgi-stroke hgi-view text-2xl  hover:text-[#00c41a] transition-800"></i>
                        <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300 cursor-pointer"></i>
                    </td>
                </tr> 
                @endforeach

            </tbody>
        </table>

    </div>
    @include('components.staffAccountDetails')
    @include('components.staffCreateAccountModal')
</div>