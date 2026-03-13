@php
$isProfilePage = request()->routeIs('profile'); // true if on profile page
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Community')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem("theme") === "light") {
            document.documentElement.classList.add("light");
        }
    </script>

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

<body class="bg-[#122333] light:bg-[#f8fafc] transition-colors min-h-screen py-22 px-5 sm:px-10" x-data>


    @include('components.navbar')


    <livewire:notif-modal />
    {{--
    <a href="/" class="text-white/60 hover:text-white transition-all duration-200 flex items-center gap-2 mb-6 group">
        <i class="fa-solid fa-arrow-left-long group-hover:-translate-x-1 transition-transform"></i>
        <span class="text-sm font-medium">Back to Home</span>
    </a> 
    --}}


    <livewire:chatbox />
    <livewire:edit-profile />





    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('commentModal', {
                open: false,
                show() {
                    this.open = true;
                },
                hide() {
                    this.open = false;
                }
            });

            Alpine.store('notificationModal', {
                open: false,
                toggle() {
                    this.open = !this.open;
                },
                close() {
                    this.open = false;
                }
            });
        });
    </script>

    @stack('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    @livewireScripts
    @guest
    @vite('resources/js/Homepage.js')
    @endguest
    @vite('resources/js/darkLightMode.js')
</body>



</html>