<!-- Modal -->
<div x-show="showStaffModal" 
     x-cloak 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">

    <!-- Modal Panel -->
    <div x-show="showStaffModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @click.away="showStaffModal = false"
         class="relative w-full max-w-md mx-4 bg-[#12151e] light:bg-[#f8fafc] rounded-2xl shadow-2xl border border-[#2a2d3a] light:border-gray-200 overflow-hidden transition-colors">

        <!-- Header -->
        <div class="bg-[#1a1d29] light:bg-white px-6 py-4 flex items-center border-b border-[#2a2d3a] light:border-gray-200 transition-colors">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-[#00d4aa]/20 flex items-center justify-center">
                    <i class="fa-solid fa-user text-[#00d4aa] text-sm"></i>
                </div>
                <div>
                    <h3 class="text-white light:text-gray-900 font-semibold text-sm transition-colors">Staff Details</h3>
                    <p class="text-[#00d4aa] text-xs" x-text="'#STF-' + (selectedStaff?.id || '000')"></p>
                </div>
            </div>

            <!-- Close Button -->
            <button @click="showStaffModal = false"
                class="ml-auto text-gray-400 hover:text-white w-7 h-7 flex items-center justify-center rounded-lg">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <!-- Avatar Section -->
        <div class="flex flex-col items-center py-5 border-b border-[#2a2d3a] light:border-gray-200 bg-[#12151e] light:bg-[#f8fafc] transition-colors">
            <div class="relative">
                <div class="w-20 h-20 rounded-full bg-[#1a1d29] light:bg-white border-2 border-[#00d4aa]/40 flex items-center justify-center overflow-hidden transition-colors">
                    <template x-if="selectedStaff?.profile_photo">
                        <img :src="'/storage/' + selectedStaff.profile_photo" alt="Profile" class="w-full h-full object-cover">
                    </template>
                    <template x-if="!selectedStaff?.profile_photo">
                        <i class="fa-solid fa-user text-[#00d4aa] text-3xl"></i>
                    </template>
                </div>
            </div>
            <p class="text-white light:text-gray-900 font-semibold text-sm mt-3 transition-colors" x-text="(selectedStaff?.first_name || '') + ' ' + (selectedStaff?.last_name || '')"></p>
            <p class="text-[#00d4aa] text-xs mt-0.5" x-text="(selectedStaff?.department || 'Staff')"></p>
        </div>

        <!-- Info Grid -->
        <div class="px-6 py-4 grid grid-cols-1 gap-3">

            <!-- Personal Details Section -->
            <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider px-1">Personal Details</p>

            <div class="grid grid-cols-2 gap-3">
                <div class="flex items-start gap-3 bg-[#1a1d29]/80 light:bg-white rounded-xl px-4 py-3 transition-colors">
                    <i class="fa-solid fa-user text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                    <div class="min-w-0">
                        <p class="text-gray-400 light:text-gray-500 text-xs mb-0.5 transition-colors">First Name</p>
                        <p class="text-white light:text-gray-900 text-sm truncate transition-colors" x-text="selectedStaff?.first_name || 'N/A'"></p>
                    </div>
                </div>

                <div class="flex items-start gap-3 bg-[#1a1d29]/80 light:bg-white rounded-xl px-4 py-3 transition-colors">
                    <i class="fa-solid fa-user text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                    <div class="min-w-0">
                        <p class="text-gray-400 light:text-gray-500 text-xs mb-0.5 transition-colors">Last Name</p>
                        <p class="text-white light:text-gray-900 text-sm truncate transition-colors" x-text="selectedStaff?.last_name || 'N/A'"></p>
                    </div>
                </div>
            </div>

            <!-- Account Details Section -->
            <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider px-1 mt-1">Account Details</p>

            <div class="flex items-start gap-3 bg-[#1a1d29]/80 light:bg-white rounded-xl px-4 py-3 transition-colors">
                <i class="fa-solid fa-envelope text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div class="min-w-0 flex-1">
                    <p class="text-gray-400 light:text-gray-500 text-xs mb-0.5 transition-colors">Email Address</p>
                    <p class="text-white light:text-gray-900 text-sm truncate transition-colors" x-text="selectedStaff?.email || 'N/A'"></p>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#1a1d29]/80 light:bg-white rounded-xl px-4 py-3 transition-colors">
                <i class="fa-solid fa-building text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div class="min-w-0 flex-1">
                    <p class="text-gray-400 light:text-gray-500 text-xs mb-0.5 transition-colors">Department</p>
                    <p class="text-white light:text-gray-900 text-sm truncate transition-colors" x-text="selectedStaff?.department || 'Staff'"></p>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#1a1d29]/80 light:bg-white rounded-xl px-4 py-3 transition-colors">
                <i class="fa-solid fa-calendar text-[#00d4aa] text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div class="min-w-0 flex-1">
                    <p class="text-gray-400 light:text-gray-500 text-xs mb-0.5 transition-colors">Date Created</p>
                    <p class="text-white light:text-gray-900 text-sm truncate transition-colors" x-text="selectedStaff?.created_at || 'N/A'"></p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 pb-6 text-right">
            <button @click="showStaffModal = false"
                class="w-full py-2.5 rounded-xl bg-[#1a1d29] light:bg-[#f1f5f9] hover:bg-[#252836] light:hover:bg-[#e2e8f0] text-gray-300 light:text-gray-800 hover:text-white light:hover:text-black text-sm font-medium border border-[#2a2d3a] light:border-gray-300 transition-all">
                Close
            </button>
        </div>

    </div>
</div>