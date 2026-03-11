<div>
    <section
        class="fixed bg-[#12151e] rounded-tr-4xl rounded-br-4xl h-screen w-[12em] flex flex-col py-5 justify-between">
        <!-- Top part: logo + menu -->
        <div>

            <div class="flex justify-center items-center mb-4">
                <div class="relative inline-block group">
                    <img class="w-24 h-24 rounded-2xl object-cover border border-[#2a2d3a] shadow-2xl transition-all duration-300 group-hover:opacity-80"
                        src="{{ $department->department_photo ?? asset('img/LOGO.png') }}"
                        alt="Department Logo">
                    <label for="dept_photo_input" class="absolute -bottom-2 -right-2 bg-[#00d4aa] w-8 h-8 rounded-full flex items-center justify-center text-[#0f1117] shadow-lg border-2 border-[#12151e] cursor-pointer hover:scale-110 active:scale-95 transition-all">
                        <i class="fa-solid fa-camera text-xs" wire:loading.remove wire:target="departmentPhoto"></i>
                        <i class="fa-solid fa-spin fa-spinner text-xs" wire:loading wire:target="departmentPhoto"></i>
                    </label>
                    <input wire:model="departmentPhoto" type="file" id="dept_photo_input" class="hidden" accept="image/*">
                </div>
            </div>


            <div class="text-center text-white text-sm mt-3">
                {{ $department->department_name ?? 'Admin' }}
            </div>
            <hr class="my-5 text-[#2a2d3a]">
            <!-- EMPLOYEE NAV MENU -->
            <div class="flex flex-col pl-2 space-y-8">
                @if ($user->role == 'employee')
                <a href="{{ route('employee.dashboard') }}" class="flex items-center space-x-2">

                    <img class="w-7 h-7" src="{{ asset('img/dashboardIcon.png') }}" alt="">
                    <span
                        class="{{ request()->routeIs('employee.dashboard') ? 'text-green-500' : 'text-white' }} font-medium  hover:text-green-500 transition duration-300">
                        Dashboard
                    </span>
                </a>
                <a href="{{ route('tracker') }}" class="flex items-center space-x-3">
                    <img class="w-6 h-6" src="{{ asset('img/track_issue_logo.png') }}" alt="">
                    <span class="{{ request()->routeIs('tracker') ? 'text-green-500' : 'text-white' }} font-medium hover:text-green-500 transition duration-300">Issues</span>
                </a>
                <a href="{{ route('map') }}" class="flex items-center space-x-3">
                    <img class="w-6 h-6" src="{{ asset('img/Location.png') }}" alt="">
                    <span class="{{ request()->routeIs('map') ? 'text-green-500' : 'text-white' }} font-medium hover:text-green-500 transition duration-300">Map</span>
                </a>
                <a href="{{ route('messages') }}" class="flex items-center space-x-3 pl-1">
                    <i class="fa-regular fa-comment text-white" style="font-size: 1.25rem;"></i>
                    <span class="{{ request()->routeIs('messages') ? 'text-green-500' : 'text-white' }} font-medium hover:text-green-500 transition duration-300">Messages</span>
                </a>
                <a href="{{ route('reports') }}" class="flex items-center space-x-3 pl-1">
                    <i class="hgi hgi-stroke hgi-account-setting-01 text-white" style="font-size: 1.25rem;"></i>
                    {{-- <i class="fa-regular fa-comment text-white" style="font-size: 1.25rem;"></i> --}}
                    <span class="{{ request()->routeIs('reports') ? 'text-green-500' : 'text-white' }} font-medium hover:text-green-500 transition duration-300">Reports</span>
                </a>

                <a href="{{ route('settings') }}" class="flex items-center space-x-3 pl-1">
                    <i class="hgi hgi-stroke hgi-setting-07 text-white" style="font-size: 1.25rem;"></i>
                    {{-- <i class="fa-regular fa-comment text-white" style="font-size: 1.25rem;"></i> --}}
                    <span class="{{ request()->routeIs('settings') ? 'text-green-500' : 'text-white' }} font-medium hover:text-green-500 transition duration-300">Staff Profile</span>
                </a>
                @elseif($user->role == 'superadmin')
                <!-- SUPERADMIN NAV MENU -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <img class="w-7 h-7" src="{{ asset('img/dashboardIcon.png') }}" alt="">
                    <span class="{{ request()->routeIs('dashboard') ? 'text-green-500' : 'text-white' }} font-medium hover:text-green-500 transition duration-300">Dashboard</span>
                </a>
                <a href="{{ route('staffAccounts') }}" class="flex items-center space-x-3">
                    <img class="w-6 h-6" src="{{ asset('img/Survey.png') }}" alt="">
                    <span class="{{ request()->routeIs('staffAccounts') ? 'text-green-500' : 'text-white' }} font-medium hover:text-green-500 transition duration-300">Accounts</span>
                </a>
                <a href="{{ route('accountReview') }}" class="flex items-center space-x-3">
                    <img class="w-6 h-6" src="{{ asset('img/Person.png') }}" alt="">
                    <span class="{{ request()->routeIs('accountReview') ? 'text-green-500' : 'text-white' }} font-medium hover:text-green-500 transition duration-300">Review</span>
                </a>
                @endif
            </div>
        </div>
        <!-- Bottom part: dark mode + logout -->
        <div class="flex flex-col pl-2 space-y-5 pb-2">
            <!-- Dark Mode Toggle -->
            <!-- <button id="darkModeToggle" type="button" class="flex items-center space-x-3">
                        <i id="darkModeIcon" class="hgi hgi-stroke hgi-moon text-white" style="font-size: 1.4rem;"></i>
                        <span id="darkModeLabel" class="text-white font-medium">Dark Mode</span>
                    </button> -->

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center space-x-3">
                    <i class="hgi hgi-stroke hgi-logout-01 text-white" style="font-size: 1.4rem;"></i>
                    <span class="text-white font-medium  hover:text-green-500 transition duration-300 ">Logout</span>
                </button>
            </form>
        </div>
    </section>
</div>