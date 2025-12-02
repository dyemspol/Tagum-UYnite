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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    @livewireStyles

</head>

<body class="bg-[#122333] min-h-screen">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Login Modal --}}
    <livewire:login-form />

    <livewire:signup-form />

    @include('components.createPostModal')
    <div class="pt-20">

        {{-- MAIN GRID WITH SIDE BARS --}}
        @php
            // Default to true if not defined
            $hasRightSidebar = $hasRightSidebar ?? true;
        @endphp

       <div class="grid 
    grid-cols-1 
    md:grid-cols-[16rem_minmax(1fr,1.1fr)] 
    lg:{{ $hasRightSidebar ? 'grid-cols-[18rem_minmax(400px,1.1fr)_18rem]' : 'grid-cols-[18rem_minmax(1fr,1.1fr)]' }} 
    gap-4 px-5 sm:px-10">


            {{-- LEFT SIDEBAR --}}
            <div class="hidden lg:block">
                @include('components.leftSideBar')
            </div>

            {{-- MAIN CONTENT --}}
            <div class="">
                @yield('content')
            </div>

            {{-- RIGHT SIDEBAR --}}
            @if ($hasRightSidebar)
                <div class="hidden lg:block">
                    @include('components.rightSideBar')
                </div>
            @endif

        </div>



    </div>
    @vite('resources/js/postPreview.js')
    @vite('resources/js/autocompleteLocation.js')

    @livewireScripts


</body>



</html>
