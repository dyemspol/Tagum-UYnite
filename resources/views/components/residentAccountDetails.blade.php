<!-- Modal -->
<div
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 {{ $selectedUser ? 'flex' : 'hidden' }}">

    @if($selectedUser)
    <!-- Modal Panel -->
    <div class="relative w-full max-w-md mx-4 bg-[#12151e] rounded-2xl shadow-2xl border border-[#2a2d3a] overflow-hidden">

        <!-- Header -->
        <div class="bg-[#1a1d29] px-6 py-4 flex items-center border-b border-[#2a2d3a]">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-[#00d4aa]/20 flex items-center justify-center">
                    <i class="fa-solid fa-user text-[#00d4aa] text-sm"></i>
                </div>
                <div>
                    <h3 class="text-white font-semibold text-sm">Resident Details</h3>
                    <p class="text-[#00d4aa] text-xs">#RES-{{ $selectedUser->id }}</p>
                </div>
            </div>

            <!-- Close Button -->
            <button wire:click="closeUser"
                class="ml-auto text-gray-400 hover:text-white w-7 h-7 flex items-center justify-center rounded-lg">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <!-- Avatar Section -->
        <div class="flex flex-col items-center py-5 border-b border-[#2a2d3a] bg-[#12151e]">
            <div class="relative">
                <div class="w-20 h-20 rounded-full bg-[#1a1d29] border-2 border-[#00d4aa]/40 flex items-center justify-center overflow-hidden">
                    <i class="fa-solid fa-user text-[#00d4aa] text-3xl"></i>
                </div>
            </div>
            <p class="text-white font-semibold text-sm mt-3">{{ ucfirst($selectedUser->first_name) }} {{ ucfirst($selectedUser->last_name) }}</p>
            <p class="text-[#00d4aa] text-xs mt-0.5">{{ $selectedUser->department->department_name ?? 'Resident' }}</p>
        </div>

        <!-- Info Grid -->
        <div class="px-6 py-4 grid grid-cols-1 gap-3">

            <!-- Personal Details Section -->
            <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider px-1">Personal Details</p>

            <div class="grid grid-cols-2 gap-3">
                <div class="flex items-start gap-3 bg-[#1a1d29]/80 rounded-xl px-4 py-3">
                    <i class="fa-solid fa-user text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                    <div>
                        <p class="text-gray-400 text-xs mb-0.5">First Name</p>
                        <p class="text-white text-sm">{{ ucfirst($selectedUser->first_name) }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 bg-[#1a1d29]/80 rounded-xl px-4 py-3">
                    <i class="fa-solid fa-user text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                    <div>
                        <p class="text-gray-400 text-xs mb-0.5">Last Name</p>
                        <p class="text-white text-sm">{{ ucfirst($selectedUser->last_name) }}</p>
                    </div>
                </div>
            </div>

            <!-- Account Details Section -->
            <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider px-1 mt-1">Account Details</p>

            <div class="flex items-start gap-3 bg-[#1a1d29]/80 rounded-xl px-4 py-3">
                <i class="fa-solid fa-envelope text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div>
                    <p class="text-gray-400 text-xs mb-0.5">Email Address</p>
                    <p class="text-white text-sm truncate">{{ $selectedUser->email }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#1a1d29]/80 rounded-xl px-4 py-3">
                <i class="fa-solid fa-building text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div>
                    <p class="text-gray-400 text-xs mb-0.5">Address</p>
                    <p class="text-white text-sm">{{ Str::title($selectedUser->address ?? 'N/A') }}, {{ Str::title($selectedUser->barangay->barangay_name ?? 'N/A') }}, Tagum City</p>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#1a1d29]/80 rounded-xl px-4 py-3">
                <i class="fa-solid fa-id-badge text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div>
                    <p class="text-gray-400 text-xs mb-0.5">Resident ID</p>
                    <p class="text-white text-sm font-mono">#RES-{{ $selectedUser->id }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#1a1d29]/80 rounded-xl px-4 py-3">
                <i class="fa-solid fa-calendar text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div>
                    <p class="text-gray-400 text-xs mb-0.5">Date Created</p>
                    <p class="text-white text-sm">{{ $selectedUser->created_at->format('F j, Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 pb-6">
            <button wire:click="closeUser"
                class="w-full py-2.5 rounded-xl bg-[#1a1d29] hover:bg-[#252836] text-gray-300 hover:text-white text-sm font-medium border border-[#2a2d3a]">
                Close
            </button>
        </div>

    </div>
    @endif

</div>