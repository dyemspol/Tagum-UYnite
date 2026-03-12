<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem("theme") === "light") {
            document.documentElement.classList.add("light");
        }
    </script>
    <link rel="stylesheet" href="https://use.hugeicons.com/font/icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Glide.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="">

    @vite('resources/js/app.js')
    <div class="light:bg-[#ebebeb] bg-[#101116] transition-colors flex min-h-screen w-full">
        @auth
        <!-- Sidebar -->
        <livewire:sidebar />
        @endauth
        <!-- Main Content -->
        <div class="ml-[12em] flex-1 overflow-y-auto h-screen p-6">
            @yield('content')
        </div>

    </div>

    @vite('resources/js/darkLightMode.js')
    @vite('js/charts/barchart.js')
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/js/app.js')
    @vite('resources/js/track_issue_sections.js')
    {{-- @vite('js/charts/barchart.js') --}}
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/glide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @vite('resources/js/map.js')

    @vite('resources/js/track_issue_sections.js')
    @vite('resources/js/swipper.js')



    @stack('scripts')

    <script>
        //     // Keep only component-specific logic if needed
        //     const btn = document.getElementById('darkModeToggle');
        //     if (btn) {
        //         btn.onclick = () => {
        //             const label = document.getElementById('darkModeLabel');
        //             const icon = document.getElementById('darkModeIcon');
        //             if (label.textContent === 'Dark Mode') {
        //                 icon.className = 'hgi hgi-stroke hgi-sun-01 text-white';
        //                 label.textContent = 'Light Mode';
        //             } else {
        //                 icon.className = 'hgi hgi-stroke hgi-moon text-white';
        //                 label.textContent = 'Dark Mode';
        //             }
        //         };
        //     }
        // 
    </script>
</body>

</html>