<!-- Modal -->
<div x-show="showStaffModal" x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/60"
      style="display: none;">

    <!-- Modal Panel -->
    <div class="relative w-full max-w-md mx-4 bg-[#0f2a43] rounded-2xl shadow-2xl border border-white/10 overflow-hidden">

        <!-- Header -->
        <div class="bg-[#173a5c] px-6 py-4 flex items-center border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                    <i class="fa-solid fa-user text-blue-400 text-sm"></i>
                </div>
                <div>
                    <h3 class="text-white font-semibold text-sm">Staff Details</h3>
                    <p class="text-blue-300 text-xs">#STF-001</p>
                </div>
            </div>

            <!-- Close Button -->
            <button @click="showStaffModal = false"
                    class="ml-auto text-gray-400 hover:text-white w-7 h-7 flex items-center justify-center rounded-lg">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <!-- Info Grid -->
        <div class="px-6 py-4 grid grid-cols-1 gap-3">

            <!-- Personal Details Section -->
            <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider px-1">Personal Details</p>

            <div class="grid grid-cols-2 gap-3">
                <div class="flex items-start gap-3 bg-[#173a5c]/60 rounded-xl px-4 py-3">
                    <i class="fa-solid fa-user text-blue-400 text-sm mt-0.5 w-4 flex-shrink-0"></i>
                    <div>
                        <p class="text-gray-400 text-xs mb-0.5">First Name</p>
                        <p class="text-white text-sm">John</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 bg-[#173a5c]/60 rounded-xl px-4 py-3">
                    <i class="fa-solid fa-user text-blue-400 text-sm mt-0.5 w-4 flex-shrink-0"></i>
                    <div>
                        <p class="text-gray-400 text-xs mb-0.5">Last Name</p>
                        <p class="text-white text-sm">Doe</p>
                    </div>
                </div>
            </div>

            <!-- Account Details Section -->
            <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider px-1 mt-1">Account Details</p>

            <div class="flex items-start gap-3 bg-[#173a5c]/60 rounded-xl px-4 py-3">
                <i class="fa-solid fa-envelope text-blue-400 text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div>
                    <p class="text-gray-400 text-xs mb-0.5">Email Address</p>
                    <p class="text-white text-sm truncate">john@example.com</p>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#173a5c]/60 rounded-xl px-4 py-3">
                <i class="fa-solid fa-building text-blue-400 text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div>
                    <p class="text-gray-400 text-xs mb-0.5">Department</p>
                    <p class="text-white text-sm">IT</p>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#173a5c]/60 rounded-xl px-4 py-3">
                <i class="fa-solid fa-id-badge text-blue-400 text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div>
                    <p class="text-gray-400 text-xs mb-0.5">Staff ID</p>
                    <p class="text-white text-sm font-mono">#STF-001</p>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#173a5c]/60 rounded-xl px-4 py-3">
                <i class="fa-solid fa-calendar text-blue-400 text-sm mt-0.5 w-4 flex-shrink-0"></i>
                <div>
                    <p class="text-gray-400 text-xs mb-0.5">Date Created</p>
                    <p class="text-white text-sm">2026-02-25</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 pb-6">
            <button @click="showStaffModal = false"
                    class="w-full py-2.5 rounded-xl bg-[#173a5c] hover:bg-[#1e4a73] text-gray-300 hover:text-white text-sm font-medium border border-white/10">
                Close
            </button>
        </div>

    </div>

</div>