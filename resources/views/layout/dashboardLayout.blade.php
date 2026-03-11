<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
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

<body class="bg-[#0f1117]">

    @vite('resources/js/app.js')
    <div class="bg-[#0f1117] flex min-h-screen w-full">
        @auth
        <!-- Sidebar -->
        <livewire:sidebar />
        @endauth
        <!-- Main Content -->
        <div class="ml-[12em] flex-1 overflow-y-auto h-screen p-6">
            @yield('content')
        </div>

    </div>


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
        const btn = document.getElementById('darkModeToggle');
        const icon = document.getElementById('darkModeIcon');
        const label = document.getElementById('darkModeLabel');

        btn.onclick = () => {
            if (label.textContent === 'Dark Mode') {
                icon.className = 'hgi hgi-stroke hgi-sun-01 text-white';
                label.textContent = 'Light Mode';
            } else {
                icon.className = 'hgi hgi-stroke hgi-moon text-white';
                label.textContent = 'Dark Mode';
            }
        };

        // Load saved theme from localStorage
        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        // Toggle theme
        toggleBtn.addEventListener('click', () => {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>
</body>

</html>