<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Community')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-[#122333] min-h-screen">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Login Modal --}}
    @include('components.login')


  

    @include('components.createPostModal')
  <div class="pt-[140px]">

        {{-- MAIN GRID WITH SIDE BARS --}}
        <div class="grid    
            grid-cols-1 
            md:grid-cols-[1fr_1fr] 
            lg:grid-cols-[18rem_minmax(600px,650px)] 
            lg:gap-60 px-5 sm:px-10">

            {{-- LEFT SIDEBAR --}}
            <div class="hidden md:block">
                @include('components.leftSideBar')
            </div>

            {{-- PAGE CONTENT  --}}
            <div class="text-white">


                {{-- profile name and picture section --}}
                    <div class="flex items-center gap-2 mb-7">
                        <div class="h-26 w-26"><img class="w-full rounded-full object-cover h-full" src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                        <div class="">
                            <p class="text-white text-3xl">James Paul Castador</p>
                           <div class="flex gap-2 items-center mt-1">
                             <p class="text-white text-sm opacity-60">2 Total Post</p>
                             <button class="text-white border-[1px] opacity-60 text-xs py-[0.1em] cursor-pointer px-2 ">Edit Profile</button>
                           </div>
                        </div>
                    </div>


                    <div class="flex gap-12 my-3">
                        <p class="cursor-pointer" id="postsTab">Posts</p>
                        <p class="cursor-pointer" id="trackIssueTab">Track issue</p>

                    </div>
                    <hr class="mb-7 opacity-60 z-10 ">
                    <div id="postsSection" class=" space-y-3 max-w-[650px] mx-auto w-full">
                        <x-postCard/>
                        <x-postCard/>
                        <x-postCard/>
                    </div>
                    <div id="trackIssueSection" class="flex justify-center">
                        <div class="bg-[#0f1f2f] border border-[#1e3246] px-3 py-3 rounded-lg w-full max-w-[50em]">
                            <div class="flex items-center justify-between gap-3 mb-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10">
                                        <img class="w-full h-full rounded-full object-cover" src="{{ asset('img/yaoyapo.jpg') }}" alt="profile">
                                    </div>
                                    <div class="leading-tight">
                                        <p class="text-white text-sm">Khristian Jay Malavar</p>
                                        <p class="text-xs text-[#9fb1c5]">November 4, 2025 <span class="mx-1">•</span> Broken Road</p>
                                    </div>
                                </div>
                                <span class="text-sm bg-lime-500 text-[#122333] px-3 py-1 rounded-2xl">Pending</span>
                            </div>
                            <p class="text-white text-base">Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂</p>
                        </div>
                         </div>

                    </div>


            </div>

            {{-- RIGHT SIDEBAR --}}
            {{-- <div class="hidden md:block">
                @include('components.rightSideBar')
            </div> --}}

        </div>

   
    @vite('resources/js/postPreview.js')
    <script>
        const postsTab = document.getElementById('postsTab');
        const trackIssueTab = document.getElementById('trackIssueTab');
        const postsSection = document.getElementById('postsSection');
        const trackIssueSection = document.getElementById('trackIssueSection');

        postsTab.addEventListener('click', () => {
            postsSection.classList.remove('hidden');
            trackIssueSection.classList.add('hidden');
        });

        trackIssueTab.addEventListener('click', () => {
            postsSection.classList.add('hidden');
            trackIssueSection.classList.remove('hidden');
        });
    </script>
</body>



</html>
