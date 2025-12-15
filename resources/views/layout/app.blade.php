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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    @livewireStyles

</head>

<body class="bg-[#122333] min-h-screen">

    @include('components.comment-modal')
    @include('components.navbar')
    @include('components.postCardModal')
    @include('components.editprofile')
    @include('components.notificationModal')

    {{-- Login Modal --}}
    @if(!Auth::check())
    <livewire:login-form />
    @endif

    

    <livewire:create-post />
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
    @vite('resources/js/notifModalToggle.js')
    @vite('resources/js/postPreview.js')
    @vite('resources/js/autocompleteLocation.js')
    @stack('scripts')
    <script>
        // Global store to toggle the shared comment modal from any component
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
        });
    </script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

        @livewireScripts
    @guest
    @vite('resources/js/Homepage.js')
    @endguest
</body>



</html>
