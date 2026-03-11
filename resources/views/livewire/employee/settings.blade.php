<div>
    <div class="max-w-4xl mx-auto w-full">
        <h2 class="text-2xl light:text-gray-800 font-semibold text-white mb-2">Staff Profile</h2>
        <p class="text-gray-400 light:text-gray-600 mb-8">Manage your personal information and account security.</p>

        <!-- Flash Messages -->
        <div class="mb-6">
            @if(session()->has('success'))
            <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
            @endif
            @if(session()->has('error'))
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation"></i>
                <p class="text-sm font-medium">{{ session('error') }}</p>
            </div>
            @endif
        </div>

        <!-- Profile Bar Section -->
        <div class="mb-10 bg-[#12151e] light:bg-white border border-[#2a2d3a] light:border-gray-300 rounded-2xl p-6 flex items-center gap-6 shadow-xl shadow-black/20">
            <div class="relative flex-shrink-0">

                <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-[#2a2d3a] bg-[#0f1117]">
                    @if($profile_photo)
                    <img src="{{ $profile_photo->temporaryUrl() }}" alt="Profile" class="w-full h-full object-cover">
                    @else
                    <img src="{{ $user->profile_photo ?? asset('img/noprofile.jpg') }}" alt="Profile" class="w-full h-full object-cover">
                    @endif
                </div>
                <label for="avatar-input" class="absolute bottom-0 right-0 w-8 h-8 bg-[#00d4aa] rounded-full flex items-center justify-center text-[#0f1117] border-4 border-[#12151e] cursor-pointer hover:bg-[#00e6b8] transition-all">
                    <i class="fa-solid fa-camera text-[10px]"></i>
                    <input wire:model="profile_photo" id="avatar-input" type="file" class="hidden">
                </label>
            </div>

            <div class="flex-1">
                <div class="flex items-center gap-3 mb-1">
                    <h1 class="text-2xl font-bold light:text-gray-800 text-white tracking-tight">{{ $user->first_name }} {{ $user->last_name }}</h1>

                </div>
                <p class="text-gray-400 light:text-gray-600 text-sm flex items-center gap-2">
                    <i class="fa-solid fa-building text-xs text-gray-500"></i>
                    {{ $user->department->department_name ?? 'Staff Member' }}
                </p>
                <div class="mt-4 flex gap-4">
                    <!-- <div class="flex flex-col">
                        <span class="text-[10px] text-gray-500 uppercase font-bold tracking-widest">Employee Role</span>
                        <span class="text-sm font-semibold text-white capitalize">{{ $user->role }}</span>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Settings Info -->
        <div class="space-y-4 gap-10 ">
            <!-- Left: Labels -->
            <div class="md:col-span-1">
                <h3 class="text-lg font-semibold light:text-gray-800 text-white mb-1">Account Information</h3>
                <p class="text-sm text-gray-500 light:text-gray-600 leading-relaxed">Update your public profile information like your username and email address.</p>
            </div>

            <!-- Right: Form -->
            <div class="md:col-span-2 space-y-6">
                <div class="bg-[#12151e] light:bg-white border border-[#2a2d3a] light:border-gray-300 rounded-2xl overflow-hidden shadow-sm">
                    <div class="grid grid-cols-2">
                        <div class="border-b border-r border-[#2a2d3a] p-5">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase light:text-gray-900 tracking-widest mb-1.5">First Name</label>
                            <input type="text" value="{{ $user->first_name ?? '' }}" class="w-full bg-transparent text-gray-400 light:text-gray-900 outline-none border-none p-0 cursor-not-allowed" readonly disabled>
                        </div>
                        <div class="border-b border-[#2a2d3a] p-5">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase light:text-gray-900 tracking-widest mb-1.5">Last Name</label>
                            <input type="text" value="{{ $user->last_name ?? '' }}" class="w-full bg-transparent text-gray-400 light:text-gray-900 outline-none border-none p-0 cursor-not-allowed" readonly disabled>
                        </div>

                        <div class="border-b border-r border-[#2a2d3a] p-5">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase light:text-gray-900 tracking-widest mb-1.5">Username</label>
                            <input wire:model="username" type="text" class="w-full bg-transparent text-white light:text-gray-900 outline-none border-none p-0 focus:ring-0 placeholder-gray-700">
                        </div>
                        <div class="border-b border-[#2a2d3a] p-5">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase light:text-gray-900 tracking-widest mb-1.5">Email Address</label>
                            @if($user->email == null)
                            <input wire:model="email" type="email" class="w-full bg-transparent text-white light:text-gray-900 outline-none border-none p-0 focus:ring-0 placeholder-gray-700">
                            @else
                            <input type="email" value="{{ $user->email }}" class="w-full bg-transparent text-gray-400 light:text-gray-900 outline-none border-none p-0 cursor-not-allowed" readonly disabled>
                            @endif
                        </div>

                        <div class="border-r border-[#2a2d3a] p-5">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase light:text-gray-900 tracking-widest mb-1.5">Department</label>
                            <input type="text" value="{{ $user->department->department_name ?? 'N/A' }}" class="w-full bg-transparent text-gray-500 light:text-gray-900 outline-none border-none p-0 cursor-not-allowed" readonly disabled>
                        </div>
                        <div class="p-5">
                            <label class="block text-[10px] font-bold text-gray-500 uppercase light:text-gray-900 tracking-widest mb-1.5">Account ID</label>
                            <input type="text" value="#STF-{{ $user->id }}" class="w-full bg-transparent text-gray-500 light:text-gray-900 outline-none border-none p-0 cursor-not-allowed font-mono" readonly disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-12 border-[#2a2d3a]">



        <!-- Footer -->
        <div class="mt-12 flex justify-end pb-10">
            <button wire:click="updateProfile" wire:loading.attr="disabled" type="button" class="group relative px-8 py-3 bg-[#00d4aa] hover:bg-[#00e6b8] text-[#0f1117] font-bold rounded-xl transition-all shadow-lg shadow-[#00d4aa]/10 hover:shadow-[#00d4aa]/20 overflow-hidden">
                <span wire:loading.remove wire:target="updateProfile" class="relative z-10 flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    SAVE CHANGES
                </span>
                <span wire:loading wire:target="updateProfile" class="relative z-10 flex items-center gap-2">
                    <i class="fa-solid fa-spinner animate-spin"></i>
                    Processing...
                </span>
            </button>
        </div>
    </div>
</div>