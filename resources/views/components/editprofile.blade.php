{{-- <div id="editProfileModal"
    class="flex fixed inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm justify-center items-center overflow-y-auto py-5"> --}}
    <div 
    x-data="{ open: false }"
    x-show="open"
    x-transition
    @click.outside="open = false"
    @open-edit-profile.window="open = true" <!-- listens to button click -->
    class="flex fixed inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm justify-center items-center overflow-y-auto py-5"
>
    <div
        class="w-full h-auto max-w-md bg-gradient-to-b from-[#1F486C] to-[#0F1F2C]
             rounded-lg shadow-2xl p-8 my-5">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-white text-2xl font-semibold">Edit Profile</h1>
            <button id="editProfileModalX"
                class="h-7 w-7 flex justify-center items-center rounded-full bg-[#31A871] cursor-pointer text-white">
                x
            </button>
        </div>

        <!-- Profile Photo -->
        <div class="flex flex-col items-center mb-6">
            <div class="w-32 h-32 rounded-full overflow-hidden mb-3 bg-gray-700">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop"
                    alt="Profile" class="w-full h-full object-cover" />
            </div>
            <label for="uploadPhoto"
                class="text-white border border-white px-4 py-1 rounded text-sm hover:bg-blue-800 cursor-pointer transition">
                Change Photo
            </label>
            <input type="file" id="uploadPhoto" class="hidden" />
        </div>

        <!-- Full Name -->
        <div class="mb-4">
            <label class="text-white text-sm mb-2 block">Full Name</label>
            <input type="text"
                class="w-full bg-transparent border border-white rounded px-4 py-2 text-white focus:outline-none focus:border-blue-300" />
        </div>

        <!-- Email -->
        <div class="mb-6">
            <label class="text-white text-sm mb-2 block">Email</label>
            <input type="email"
                class="w-full bg-transparent border border-white rounded px-4 py-2 text-white focus:outline-none focus:border-blue-300" />
        </div>

        <!-- Change Password Section -->
        <h2 class="text-white  text-xl font-semibold mb-4">Change Password</h2>

        <!-- Current Password -->
        <div class="mb-4">
            <label class="text-white text-sm mb-2 block">Current Password</label>
            <input type="password"
                class="w-full bg-transparent border border-white rounded px-4 py-2 text-white focus:outline-none focus:border-blue-300" />
        </div>

        <!-- New Password -->
        <div class="mb-4">
            <label class="text-white text-sm mb-2 block">New Password</label>
            <input type="password"
                class="w-full bg-transparent border border-white rounded px-4 py-2 text-white focus:outline-none focus:border-blue-300" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <label class="text-white text-sm mb-2 block">Confirm Password</label>
            <input type="password"
                class="w-full bg-transparent border border-white rounded px-4 py-2 text-white focus:outline-none focus:border-blue-300" />
        </div>

        <!-- Save Button -->
        <button class="w-full bg-[#31A871] hover:bg-green-600 text-white font-semibold py-3 rounded transition">
            Save Change
        </button>
    </div>
</div>
