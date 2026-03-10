<div x-data="{ open: false }" x-show="open" x-transition @click.outside="open = false"
    @open-edit-profile.window="open = true"
    @close-edit-profile.window="open = false"
    class="flex fixed inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm justify-center items-center overflow-y-auto py-5" style="display: none;">
    <div
        class="w-full h-auto max-w-2xl bg-gradient-to-b from-[#1F486C] to-[#0F1F2C]
             rounded-lg shadow-2xl p-8 my-5">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-white text-2xl font-semibold">Edit Profile</h1>
            <button @click="open = false"
                class="h-7 w-7 flex justify-center items-center rounded-full bg-[#31A871] cursor-pointer text-white">
                x
            </button>
        </div>

        @if (session()->has('error'))
        <div class="bg-red-500/20 border border-red-500 text-red-100 px-4 py-2 rounded mb-4 text-sm">
            {{ session('error') }}
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Profile Photo Column -->
            <div class="flex flex-col items-center">
                <div class="relative w-32 h-32 rounded-full overflow-hidden mb-3 bg-gray-700 shadow-lg border-2 border-white/20">
                    <img src="{{ $photo ? $photo->temporaryUrl() : ($user->profile_photo ? asset($user->profile_photo) : asset('img/noprofile.jpg')) }}"
                        alt="Profile" class="w-full h-full object-cover" />
                    <div wire:loading wire:target="photo" class="absolute inset-0 bg-black/50 flex items-center justify-center">
                        <div class="animate-spin h-6 w-6 border-2 border-white border-t-transparent rounded-full"></div>
                    </div>
                </div>
                <label for="uploadPhoto"
                    class="text-white border border-white/50 px-4 py-1.5 rounded text-sm hover:bg-white/10 cursor-pointer transition-all duration-200">
                    Change Photo
                </label>
                <input type="file" id="uploadPhoto" class="hidden" wire:model="photo" />
                <p class="text-xs text-white/50 mt-2">JPG, PNG or GIF. Max 2MB</p>
            </div>

            <!-- Profile Info Column -->
            <div class="md:col-span-2">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <!-- First Name -->
                    <div>
                        <label class="text-white text-sm mb-1.5 block">First Name</label>
                        <input type="text"
                            class="w-full bg-white/5 border border-white/20 rounded px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400 transition-all" wire:model="first_name" />
                        @error('first_name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <!-- Last Name -->
                    <div>
                        <label class="text-white text-sm mb-1.5 block">Last Name</label>
                        <input type="text"
                            class="w-full bg-white/5 border border-white/20 rounded px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400 transition-all" wire:model="last_name" />
                        @error('last_name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <!-- Barangay -->
                    <div>
                        <label class="text-white text-sm mb-1.5 block">Barangay</label>
                        <select wire:model="barangay_id" class="w-full bg-[#1F486C] border border-white/20 rounded px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400 transition-all">
                            <option value="" disabled>Select Barangay</option>
                            @foreach ($barangays ?? [] as $barangay)
                            <option value="{{ $barangay->id }}" class="bg-[#0F1F2C] text-white">
                                {{ $barangay->barangay_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('barangay_id') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="text-white text-sm mb-1.5 block">Email Address</label>
                        <input type="email"
                            class="w-full bg-white/5 border border-white/20 rounded px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400 transition-all" wire:model="email" />
                        @error('email') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="mt-8 border-t border-white/10 pt-6">
                    <h2 class="text-white text-lg font-semibold mb-4">Security Settings</h2>
                    
                    <!-- Current Password -->
                    <div class="mb-4">
                        <label class="text-white text-sm mb-1.5 block">Current Password <span class="text-xs text-white/40 font-normal">(Required to change password)</span></label>
                        <input type="password"
                            class="w-full bg-white/5 border border-white/20 rounded px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400 transition-all" wire:model="current_password" />
                        @error('current_password')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <!-- New Password -->
                        <div>
                            <label class="text-white text-sm mb-1.5 block">New Password</label>
                            <input type="password"
                                class="w-full bg-white/5 border border-white/20 rounded px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400 transition-all" wire:model="password" />
                            @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="text-white text-sm mb-1.5 block">Confirm New Password</label>
                            <input type="password"
                                class="w-full bg-white/5 border border-white/20 rounded px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-400 transition-all" wire:model="password_confirmation" />
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="mt-8">
                    <button
                        class="w-full bg-[#31A871] hover:bg-green-600 text-white font-semibold py-3 rounded-lg shadow-lg hover:shadow-green-500/20 transition-all duration-200 
                    disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center min-h-[52px]"
                        wire:click="updateProfile"
                        wire:loading.attr="disabled"
                        wire:target="updateProfile, photo">
                        <!-- State 1: Ready to Save -->
                        <span wire:loading.remove wire:target="updateProfile, photo">
                            Save Changes
                        </span>

                        <!-- State 2: Busy/Loading (Centered Row) -->
                        <div wire:loading wire:target="updateProfile, photo" class="flex items-center gap-2">
                            <div class="animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full"></div>
                            <span>Updating Profile...</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>