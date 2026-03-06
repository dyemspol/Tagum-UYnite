<div>
    <div class="max-w-4xl mx-auto w-full">
        <h2 class="text-2xl font-semibold text-white mb-2">Staff Account Settings</h2>
        <p class="text-gray-400 mb-8">Manage the details and basic information for your staff account.</p>

        <!-- Account Details Section -->
        <div class="mb-10 ">
            <div class="mb-4">
                <h3 class="text-lg font-medium text-white">Account Information</h3>
                <p class="text-sm text-gray-400">Basic information about your staff profile</p>
            </div>
            
            <div class="bg-[#12151e] border border-[#2a2d3a] rounded-sm overflow-hidden">
                <div class="grid grid-cols-2">
                    <div class="border-b border-r border-[#2a2d3a] p-4">
                        <label class="block text-xs text-gray-500 mb-1">First Name</label>
                        <input type="text" value="{{ Auth::user()->first_name ?? '' }}" class="w-full bg-transparent text-white outline-none border-none focus:ring-1 focus:ring-green-500 p-1.5 -ml-1.5 rounded">
                    </div>
                    <div class="border-b border-[#2a2d3a] p-4">
                        <label class="block text-xs text-gray-500 mb-1">Last Name</label>
                        <input type="text" value="{{ Auth::user()->last_name ?? '' }}" class="w-full bg-transparent text-white outline-none border-none focus:ring-1 focus:ring-green-500 p-1.5 -ml-1.5 rounded">
                    </div>
                    
                    <div class="border-b border-r border-[#2a2d3a] p-4">
                        <label class="block text-xs text-gray-500 mb-1">Username</label>
                        <input type="text" value="{{ Auth::user()->username ?? '' }}" class="w-full bg-transparent text-white outline-none border-none focus:ring-1 focus:ring-green-500 p-1.5 -ml-1.5 rounded">
                    </div>
                    <div class="border-b border-[#2a2d3a] p-4">
                        <label class="block text-xs text-gray-500 mb-1">Email Address</label>
                        <input type="email" value="{{ Auth::user()->email ?? '' }}" class="w-full bg-transparent text-white outline-none border-none focus:ring-1 focus:ring-green-500 p-1.5 -ml-1.5 rounded">
                    </div>

                    <div class="border-r border-[#2a2d3a] p-4">
                        <label class="block text-xs text-gray-500 mb-1">Department</label>
                        <input type="text" value="{{ Auth::user()->department->department_name ?? 'Assigned Department' }}" class="w-full bg-transparent text-gray-500 outline-none border-none p-1.5 -ml-1.5 rounded cursor-not-allowed" readonly disabled>
                    </div>
                    <div class="p-4">
                        <label class="block text-xs text-gray-500 mb-1">Role</label>
                        <input type="text" value="{{ ucfirst(Auth::user()->role ?? 'Employee') }}" class="w-full bg-transparent text-gray-500 outline-none border-none p-1.5 -ml-1.5 rounded cursor-not-allowed" readonly disabled>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="mb-8">
            <div class="mb-4">
                <h3 class="text-lg font-medium text-white">Contact & Address</h3>
                <p class="text-sm text-gray-400">Additional contact information</p>
            </div>
            
            <div class="bg-[#12151e] border border-[#2a2d3a] rounded-sm overflow-hidden">
                <div class="grid grid-cols-2">
                    <div class="border-b border-r border-[#2a2d3a] p-4 col-span-2 md:col-span-1">
                        <label class="block text-xs text-gray-500 mb-1">Address</label>
                        <input type="text" value="{{ Auth::user()->address ?? '' }}" placeholder="Enter your full address" class="w-full bg-transparent text-white outline-none border-none focus:ring-1 focus:ring-green-500 p-1.5 -ml-1.5 rounded">
                    </div>
                    
                    <div class="border-b border-[#2a2d3a] p-4 col-span-2 md:col-span-1">
                        <label class="block text-xs text-gray-500 mb-1">Barangay</label>
                        <input type="text" value="{{ Auth::user()->barangay->name ?? '' }}" placeholder="Select Barangay" class="w-full bg-transparent text-white outline-none border-none focus:ring-1 focus:ring-green-500 p-1.5 -ml-1.5 rounded">
                    </div>

                    <div class="border-r border-[#2a2d3a] p-4">
                        <label class="block text-xs text-gray-500 mb-1">Phone Number</label>
                        <input type="text" placeholder="Phone Number" class="w-full bg-transparent text-white outline-none border-none focus:ring-1 focus:ring-green-500 p-1.5 -ml-1.5 rounded placeholder-gray-700">
                    </div>
                    <div class="p-4">
                        <label class="block text-xs text-gray-500 mb-1">Date of Birth</label>
                        <input type="date" value="{{ Auth::user()->date_of_birth ? \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('Y-m-d') : '' }}" class="w-full bg-transparent text-white outline-none border-none focus:ring-1 focus:ring-green-500 p-1.5 -ml-1.5 rounded" style="color-scheme: dark;">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex">
            <button type="button" class="bg-[#c2c4cb] hover:bg-white text-gray-800 font-bold py-2 px-6 rounded shadow transition duration-200">
                SAVE CHANGES
            </button>
        </div>

    </div>
</div>