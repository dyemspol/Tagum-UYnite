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
</head>

<body class="bg-[#122333] min-h-screen">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Login Modal --}}
    @if (!Auth::check())
    <livewire:login-form/>
    @endif



    <livewire:create-post/>
    <div class="pt-[140px]">

        {{-- MAIN GRID WITH SIDE BARS --}}
        <div
            class="grid    
            grid-cols-1 
            md:grid-cols-[1fr_1fr] 
            lg:grid-cols-[18rem_minmax(600px,650px)] 
            lg:gap-60 px-5 sm:px-10">

            {{-- LEFT SIDEBAR --}}
            <div class="hidden md:block">
                @include('components.leftSideBar')
            </div>

            {{-- PAGE CONTENT  --}}
            <div class="text-white" x-data="{ activeTab: 'posts' }">


                {{-- profile name and picture section --}}
                <div class="flex items-center gap-2 mb-7">
                    <div class="h-26 w-26"><img class="w-full rounded-full object-cover h-full"
                            src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                    <div class="">
                        <p class="text-white text-3xl">{{ $user->first_name }} {{ $user->last_name }}</p>
                        <div class="flex gap-2 items-center mt-1">
                            <p class="text-white text-sm opacity-60">{{ $user->reports->count() }} Total Post</p>
                            <div id="profilemenu" class="w-10 h-10 cursor-pointer"
                        @click="$dispatch('open-edit-profile')">
                        <img class="w-full h-full rounded-full object-cover" src="{{ asset('img/ninogprofile.jpg') }}" alt="">
                    </div>
                        </div>
                    </div>
                </div>


                <div class="flex gap-12 my-3">
                    <p class="cursor-pointer pb-1 transition-all duration-200" 
                       @click="activeTab = 'posts'"
                       :class="activeTab === 'posts' ? 'text-[#31A871] border-b-2 border-[#31A871] opacity-100' : 'text-white opacity-60 hover:opacity-100'">
                       Posts
                    </p>
                    <p class="cursor-pointer pb-1 transition-all duration-200" 
                       @click="activeTab = 'track'"
                       :class="activeTab === 'track' ? 'text-[#31A871] border-b-2 border-[#31A871] opacity-100' : 'text-white opacity-60 hover:opacity-100'">
                       Track issue
                    </p>
                </div>
                <hr class="mb-7 opacity-60 z-10 ">
                <div id="postsSection" x-show="activeTab === 'posts'" class=" space-y-3 max-w-[650px] mx-auto w-full">
                    @forelse($user->reports as $post)
                        <livewire:post-card :post="$post" :key="$post->id" />
                    @empty
                        <div class="text-white text-center opacity-50 py-10">No posts yet.</div>
                    @endforelse
                </div>


                
                <div id="trackIssueSection" x-show="activeTab === 'track'" class="flex justify-center" style="display: none;">
                    @forelse($user->reports as $post)
                    <div class="bg-[#0f1f2f] border border-[#1e3246] px-3 py-3 rounded-lg w-full max-w-[50em]">
                        <div class="flex items-center justify-between gap-3 mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10">
                                    <img class="w-full h-full rounded-full object-cover"
                                        src="{{ asset('img/yaoyapo.jpg') }}" alt="profile">
                                </div>
                                <div class="leading-tight">
                                    <p class="text-white text-sm">{{ $user->first_name }} {{ $user->last_name }}</p>
                                    <p class="text-xs text-[#9fb1c5]">{{ $user->reports->first()->created_at->format('F j, Y') }} <span class="mx-1">•</span>
                                        {{ $user->reports->first()->title }}</p>
                                </div>
                            </div>
                            <span class="text-sm bg-lime-500 text-[#122333] px-3 py-1 rounded-2xl">{{ $user->reports->first()->report_status ? 'Pending' : 'Resolved' }}</span>
                        </div>
                        <p class="text-white text-base">{{ $user->reports->first()->description }}</p>
                    </div>
                    @empty
                        <div class="text-white text-center opacity-50 py-10">No posts yet.</div>
                    @endforelse
                </div>

            </div>


        </div>

        {{-- RIGHT SIDEBAR --}}
        {{-- <div class="hidden md:block">
                @include('components.rightSideBar')
            </div> --}}

    </div>


    @vite('resources/js/postPreview.js')

</body>



</html>
