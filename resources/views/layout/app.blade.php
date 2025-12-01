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
    @include('components.login')

    <livewire:signup-form />

    @include('components.createPostModal')
    <div class="pt-20">

        {{-- MAIN GRID WITH SIDE BARS --}}
        <div class="grid 
            grid-cols-1 
            md:grid-cols-[1fr_16rem] 
            lg:grid-cols-[18rem_minmax(400px,1.1fr)_18rem] 
            gap-4 px-5 sm:px-10">

            {{-- LEFT SIDEBAR --}}
            <div class="hidden lg:block">
                @include('components.leftSideBar')
            </div>

            {{-- PAGE CONTENT  --}}
            <div class="space-y-4">
                @yield('content')
            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="hidden md:block">
                @include('components.rightSideBar')
            </div>

        </div>

    </div>

    @livewireScripts

</body>
</html>
