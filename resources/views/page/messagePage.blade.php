@php
    $isProfilePage = request()->routeIs('profile'); // true if on profile page
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Community')</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @livewireStyles

</head>

<body class="bg-[#122333] min-h-screen py-22 px-5 sm:px-10">


    @include('components.navbar')
    @include('components.postCardModal')
    @include('components.editprofile')
    @include('components.notificationModal')
<a href="/" class="text-white flex items-center gap-2">  <i class="fa-solid fa-less-than text-xs"></i>
    <p>Back</p>
</a>
  

    <div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-4 px-5 sm:px-10 mt-8">
        <!-- Left Sidebar - Departments -->
        <div class="bg-[#1a3447] rounded-lg p-6">
            <h2 class="text-white text-xl font-semibold mb-6">Departments</h2>
            
            <div class="space-y-3">
                <a href="#" class="flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-[#234156] p-3 rounded-lg transition">
                    <span class="text-sm">City Mayor's Office</span>
                    <span class="text-xs text-gray-500">#city-hall</span>
                </a>
                
                <a href="#" class="flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-[#234156] p-3 rounded-lg transition">
                    <span class="text-sm">City Engineering</span>
                    <span class="text-xs text-gray-500">#engineering</span>
                </a>
            </div>
        </div>

        <!-- Right Content Area - Messages -->
        <div class="bg-[#1a3447] rounded-lg flex flex-col h-[calc(100vh-200px)]">
            <!-- Header -->
            <div class="border-b border-gray-700 p-6">
                <h2 class="text-white text-xl font-semibold">City Mayor's Office</h2>
            </div>

            <!-- Messages Area -->
            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                <!-- Message 1 -->
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-building text-white text-sm"></i>
                    </div>
                    <div>
                        <div class="flex items-center space-x-2">
                            <span class="text-yellow-500 font-semibold">City Engineering</span>
                            <span class="text-gray-500 text-xs">9:40</span>
                        </div>
                        <p class="text-gray-300 text-sm mt-1">Received a non-potable reports from clientview, tagging them to high severity for tonight's town h...</p>
                    </div>
                </div>

                <!-- Message 2 -->
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-chart-line text-white text-sm"></i>
                    </div>
                    <div>
                        <div class="flex items-center space-x-2">
                            <span class="text-green-500 font-semibold">Traffic Management</span>
                            <span class="text-gray-500 text-xs">9:41</span>
                        </div>
                        <p class="text-gray-300 text-sm mt-1">NOT repairing outstanding or matched vehicles between 8am-3PM while roads are ongoing.</p>
                    </div>
                </div>

                <!-- Message 3 -->
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-semibold">TM</span>
                    </div>
                    <div>
                        <div class="flex items-center space-x-2">
                            <span class="text-green-500 font-semibold">You</span>
                            <span class="text-gray-500 text-xs">9:42</span>
                        </div>
                        <p class="text-gray-300 text-sm mt-1">Please also update the Team's Units feed and the report is marked relevant on redirect acc notified.</p>
                    </div>
                </div>
            </div>

            <!-- Message Input -->
            <div class="border-t border-gray-700 p-4">
                <div class="flex items-center space-x-2">
                    <input 
                        type="text" 
                        placeholder="Message #city-hall" 
                        class="flex-1 bg-[#0d1f2d] text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>


    @vite('resources/js/notifModalToggle.js')
    @vite('resources/js/postPreview.js')
    @vite('resources/js/autocompleteLocation.js')
    @stack('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
    @guest
        @vite('resources/js/Homepage.js')
    @endguest
</body>



</html>