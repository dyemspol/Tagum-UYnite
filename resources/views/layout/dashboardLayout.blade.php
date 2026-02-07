<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',"Dashboard")</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   <link rel="stylesheet" href="https://use.hugeicons.com/font/icons.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 flex ">

    <!-- Sidebar -->
    <section class="fixed bg-[#13314f] rounded-tr-4xl rounded-br-4xl h-screen w-[12em] flex flex-col py-5 justify-between">
        <!-- Top part: logo + menu -->
        <div>
            <div class="flex justify-center mb-4">
                <img class="w-15 h-auto" src="{{ asset('img/LOGO.png') }}" alt="">
            </div>
            <div class="text-center text-white text-sm mt-3">Engineering Office</div>
            <hr class="my-5 text-[#ffffff3d]">

            <div class="flex flex-col pl-2 space-y-8">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <img class="w-7 h-7" src="{{ asset('img/dashboardIcon.png') }}" alt="">
                    <span class="text-white font-medium">Dashboard</span>
                </a>
                <a href="{{ route('tracker') }}" class="flex items-center space-x-3">
                    <img class="w-6 h-6" src="{{ asset('img/track_issue_logo.png') }}" alt="">
                    <span class="text-white font-medium">Issues</span>
                </a>
                <a href="{{ route('map') }}" class="flex items-center space-x-3">
                    <img class="w-6 h-6" src="{{ asset('img/Location.png') }}" alt="">
                    <span class="text-white font-medium">Map</span>
                </a>
                <a href="{{ route('messages') }}" class="flex items-center space-x-3 pl-1">
                    <i class="fa-regular fa-comment text-white" style="font-size: 1.25rem;"></i>
                    <span class="text-white font-medium">Messages</span>
                </a>
                <a href="{{ route('reports') }}" class="flex items-center space-x-3 pl-1">
                  <i class="hgi hgi-stroke hgi-account-setting-01 text-white" style="font-size: 1.25rem;"></i>
                    {{-- <i class="fa-regular fa-comment text-white" style="font-size: 1.25rem;"></i> --}}
                    <span class="text-white font-medium">Reports</span>
                </a>
            </div>
        </div>

        <!-- Bottom part: logout -->
        <a href="{{ route('adminlogin') }}" class="flex items-center space-x-3 pl-2">
            <img class="w-6 h-6" src="{{ asset('img/Logout.png') }}" alt="">
            <span class="text-white font-medium">Logout</span>
        </a>
    </section>

    <!-- Main Content -->
    <div class="ml-[12em] flex-1 overflow-y-auto h-screen p-6">
        @yield('content')
    </div>

</div>
@include('components.viewIssueModal')
@vite('js/charts/barchart.js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@vite("resources/js/track_issue_sections.js")
</body>

</html>
