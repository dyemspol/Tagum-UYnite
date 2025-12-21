        <nav class="bg-[#182B3C] fixed top-0 left-0 w-full z-30">
            <div class="flex h-16 justify-between w-full items-center mx-auto sm:px-10 py-2 shadow-md px-5">
                <div class="flex justify-center items-center">
                    <div id="menuicon" class="lg:hidden cursor-pointer"><i class="fa-solid fa-bars text-white text-xl"></i></div>
                    <a href="/"> <div class="w-11 h-auto lg:block hidden"><img class="w-full h-full" src="{{ asset('img/LOGO.png') }}"
                            alt="logo">
                    </div></a>
                </div>
                <div class="relative flex-1 sm:flex-none sm:w-[30rem] mx-3 sm:mx-0 flex items-center">
                    <form class="w-full relative" x-data @submit.prevent="Livewire.navigate('/search?search=' + $el.querySelector('input').value)">
                        <x-heroicon-o-magnifying-glass
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white w-5 h-5 z-10" />

                        <input type="text" placeholder="Search..."
                            class="bg-[#122333] w-full text-white rounded-md pl-9 pr-2 py-2 focus:outline-none" />
                    </form>
                </div>



                @if (!auth()->check())
                <button id="loginBt" class="bg-[#31a87100] border-[1px] py-1 px-4 text-white rounded-sm font-light">
                    Login
                </button>
            @endif
        
            @auth

            <div class="flex items-center gap-5">
                <a href="{{ route('message') }}"><i class="fa-regular fa-message text-[#31A871] text-2xl group-hover:text-white cursor-pointer "></i></a>
                
                <i id="notifIcon" @click="$store.notificationModal.toggle()" class="fa-regular fa-bell text-[#31A871] text-2xl text-normal group-hover:text-white cursor-pointer"></i>
                <div id="profilemenu" class="w-10 h-10 cursor-pointer">
                    <img class="w-full h-full rounded-full object-cover" 
                        src="{{ Auth::user()->profile_photo ? asset(Auth::user()->profile_photo) : asset('img/ninogprofile.jpg') }}" 
                        alt="Profile">
                </div>
            </div>
            @endauth
            
            
            
            
            </div>
        </nav>



        {{-- mobile version leftsidebar --}}

        <div id="mobileSidebar"
            class="fixed lg:hidden mt-16 left-0 h-16 w-full h-full bg-[#0c0c0cb2] opacity-0 pointer-events-none transition-all duration-300 z-40">

            <div class="w-[14em] bg-[#182b3c] h-[41em] p-5 rounded-br-md transform -translate-x-full transition-all duration-300"
                id="sidebarPanel">

                <div class="flex flex-col space-y-6">
                    <a href="/" wire:navigate
                        class="flex items-center space-x-3 transition duration-150 py-3 px-1 rounded-sm group {{ request()->routeIs('homepage') ? 'bg-[#31A871]' : 'hover:bg-[#31A871]' }}">
                        <i class="fa-solid fa-house {{ request()->routeIs('homepage') ? 'text-white' : 'text-[#31A871] group-hover:text-white' }} text-normal"></i>
                        <span class="text-white text-sm">Home</span>
                </a>
        
        
                    <a href="/latest" wire:navigate class="flex items-center space-x-4 py-2 px-1 rounded-sm group cursor-pointer {{ request()->routeIs('latest') ? 'bg-[#31A871]' : 'hover:bg-[#31A871]' }}">
                        <i class="fa-solid fa-fire-flame-curved {{ request()->routeIs('latest') ? 'text-white' : 'text-[#31A871] group-hover:text-white' }}"></i>
                        <span class="text-white text-sm">Latest</span>
                    </a>
        
                    <a href="/popular" wire:navigate class="flex items-center space-x-3 py-2 px-1 rounded-sm group cursor-pointer {{ request()->routeIs('popular') ? 'bg-[#31A871]' : 'hover:bg-[#31A871]' }}">
                        <i class="fa-solid fa-house {{ request()->routeIs('popular') ? 'text-white' : 'text-[#31A871] group-hover:text-white' }}"></i>
                        <span class="text-white text-sm">Popular</span>
                    </a>
        
                    {{-- <div class="flex items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group cursor-pointer">
                        <i class="fa-solid fa-earth-asia text-[#31A871] group-hover:text-white"></i>
                        <span class="text-white text-sm group-hover:text-white">All</span>
                    </div> --}}
        
                    @auth
                    <div id="createPostBtMobile" class="flex cursor-pointer items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group" @click="$dispatch('openCreatePost')">
                        <i class="fa-solid fa-plus text-[#31A871] group-hover:text-white"></i>
                        <span  class="text-white text-sm group-hover:text-white">Create Post</span>
                    </div> 
                    @endauth
                    @guest
                        <div id="createPostBtGuest" class="flex cursor-pointer items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group" @click="$dispatch('openCreatePost')">
                        <i class="fa-solid fa-plus text-[#31A871] group-hover:text-white"></i>
                        <span  class="text-white text-sm group-hover:text-white">Create Post</span>
                    </div>
                    @endguest
                    
                </div>
        



                <hr class ="mt-7 mb-4 border-gray-600">

                <div class="flex flex-col gap-2 mb-4">
                    <h1 class="text-white font-semibold">Post category</h1>
                
                    <div class="relative hidden sm:flex">
                        <x-heroicon-o-magnifying-glass
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white w-4 h-4" />
                
                        <input
                            id="categorySearchMobile"
                            type="text"
                            placeholder="Search categories..."
                            class="bg-[#122333] w-full text-white rounded-md pl-9 pr-2 py-1 focus:outline-none text-sm"
                        />
                    </div>
                
                    <!-- Scrollable categories -->
                    <div id="mobileCategoryList" class="overflow-y-scroll hide-scrollbar max-h-80 mt-2">
                        @foreach($departments as $department)
                        <div class="category-item space-y-2" data-category="{{ strtolower($department->category) }}">
                            <label class="flex justify-between items-center space-y-4 cursor-pointer">
                                <p class="text-white font-light text-sm">
                                    {{ $department->category }}
                                </p>
                                <input type="checkbox"
                                    value="{{ $department->id }}"
                                    @change="Livewire.dispatch('toggle-category', { id: {{ $department->id }} })"
                                    class="w-4 h-4 accent-[#31A871] rounded cursor-pointer" />
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                



            </div>



        </div>




        {{-- profilesidebar --}}
        {{-- right-[-40%] --}}
        @auth
        {{-- <div id="profilesidebar" class="fixed inset-0 flex justify-center items-center  bg-black/50 hidden"> --}}
            <div id="profilesidebar"  class="w-[14em] fixed hidden right-10 top-18 bg-[#182b3c] p-5 rounded-br-md z-55 rounded-md shadow-md">
                <div class="flex flex-col space-y-6">
                    
                    <!-- View Profile -->
                    <a href="/profile" class="flex items-center space-x-3">
                        <div class="w-9 h-9">
                            <img class="w-full h-full rounded-full object-cover" 
                                src="{{ Auth::user()->profile_photo ? asset(Auth::user()->profile_photo) : asset('img/noprofile.jpg') }}" 
                                alt="Profile Photo">
                        </div>
                        <p class="text-white text-sm">View Profile</p>
                    </a>

                    <!-- Recent Post (for mobile) -->
                    <a href="#" id="notifLink" 
                    class="flex lg:hidden items-center space-x-3 py-2 px-1 rounded-sm hover:bg-[#31A871] transition duration-150 cursor-pointer">
                        <i class="fa-solid fa-clock text-[#31A871]"></i>
                        <span class="text-white text-sm">Notification</span>
                    </a>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST" 
                        class="flex items-center space-x-3 py-2 px-1 rounded-sm hover:bg-[#31A871] transition duration-150 cursor-pointer">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-sign-out text-[#31A871] hover:text-white"></i>
                            <span class="text-white text-sm">Sign out</span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
        @endauth


        <div id="recentpostcontainer" class="fixed justify-center items-center w-full h-screen hidden md:hidden z-60 bg-[#1f1f1f46] "> 
            <div class="bg-[#182b3c] shadow-lg p-5 rounded-lg text-white w-[27em]  h-[50em] hide-scrollbar overflow-auto">
                <div class="flex justify-between items-center mb-2">
                    <p class="text-">Recent Post</p>
                    <i id="recentpostX" class="fa-solid fa-x text-xs"></i>
                </div>
            
                <div class="mt-2 space-y-4">
                
                    <div class=" rounded-md">
                        <div class="flex gap-2 items-center mb-3">
                            <div class="w-10 h-10 "><img class="w-full h-full rounded-full object-cover"
                                    src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                            <div class="">
                                <p class="font-normal text-sm">James Paul Silayan</p>
                                <p class="font-light text-[#ffffffa4] text-xs" >15 days ago</p>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-xs font-light line-clamp-2"><span>"</span>Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂<span>"</span></p>
                        </div>
                        <hr class ="my-3 border-gray-600">
                    </div>
            
                    
                    <div class="rounded-md">
                        <div class="flex gap-2 items-center mb-3">
                            <div class="w-10 h-10 "><img class="w-full h-full rounded-full object-cover"
                                    src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                            <div class="">
                                <p class="text-sm font-normal">James Paul Silayan</p>
                                <p class="font-light text-[#ffffffa4] text-xs" >15 days ago</p>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-xs font-light line-clamp-2"><span>"</span>Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂<span>"</span></p>
                        </div>
                        <hr class =" my-3 border-gray-600">
                    </div>
            
                    <div class="rounded-md">
                        <div class="flex gap-2 items-center mb-3">
                            <div class="w-10 h-10 "><img class="w-full h-full rounded-full object-cover"
                                    src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                            <div class="">
                                <p class="text-sm font-normal">James Paul Silayan</p>
                                <p class="font-light text-[#ffffffa4] text-xs" >15 days ago</p>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-xs font-light line-clamp-2"><span>"</span>Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂<span>"</span></p>
                        </div>
                        <hr class =" my-3 border-gray-600">
                    </div>
                    <div class="rounded-md">
                        <div class="flex gap-2 items-center mb-3">
                            <div class="w-10 h-10 "><img class="w-full h-full rounded-full object-cover"
                                    src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                            <div class="">
                                <p class="text-sm font-normal">James Paul Silayan</p>
                                <p class="font-light text-[#ffffffa4] text-xs" >15 days ago</p>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-xs font-light line-clamp-2"><span>"</span>Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂<span>"</span></p>
                        </div>
                        <hr class =" my-3 border-gray-600">
                    </div>
                    <div class="rounded-md">
                        <div class="flex gap-2 items-center mb-3">
                            <div class="w-10 h-10 "><img class="w-full h-full rounded-full object-cover"
                                    src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                            <div class="">
                                <p class="text-sm font-normal">James Paul Silayan</p>
                                <p class="font-light text-[#ffffffa4] text-xs" >15 days ago</p>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-xs font-light line-clamp-2"><span>"</span>Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂<span>"</span></p>
                        </div>
                        <hr class =" my-3 border-gray-600">
                    </div>
                    <div class="rounded-md">
                        <div class="flex gap-2 items-center mb-3">
                            <div class="w-10 h-10 "><img class="w-full h-full rounded-full object-cover"
                                    src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                            <div class="">
                                <p class="text-sm font-normal">James Paul Silayan</p>
                                <p class="font-light text-[#ffffffa4] text-xs" >15 days ago</p>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-xs font-light line-clamp-2"><span>"</span>Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂<span>"</span></p>
                        </div>
                        <hr class =" my-3 border-gray-600">
                    </div>
                    <div class="rounded-md">
                        <div class="flex gap-2 items-center mb-3">
                            <div class="w-10 h-10 "><img class="w-full h-full rounded-full object-cover"
                                    src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
                            <div class="">
                                <p class="text-sm font-normal">James Paul Silayan</p>
                                <p class="font-light text-[#ffffffa4] text-xs" >15 days ago</p>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-xs font-light line-clamp-2"><span>"</span>Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂<span>"</span></p>
                        </div>
                        <hr class =" my-3 border-gray-600">
                    </div>
                    
            
            
            
            
            
                </div>
            
            
            </div>
            </div>
        <script>
        function initNavbarScripts() {
            // --- MOBILE SIDEBAR ---
            const loginBtn = document.getElementById('loginBt');
            const loginModal = document.getElementById('loginModal');
            const menuIcon = document.getElementById('menuicon');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const sidebarPanel = document.getElementById('sidebarPanel');
            
            if (loginBtn) {
                loginBtn.onclick = function() {
                    loginModal.classList.remove('hidden');
                    loginModal.classList.add('flex');
                };
            }
            
            if (loginModal) {
                loginModal.onclick = function(e) {
                    if (e.target === loginModal) {
                        loginModal.classList.remove('flex');
                        loginModal.classList.add('hidden');
                    }
                };
            }
            
            if (menuIcon) {
                menuIcon.onclick = function() {
                    mobileSidebar.classList.toggle('opacity-0');
                    mobileSidebar.classList.toggle('pointer-events-none');
                    sidebarPanel.classList.toggle('-translate-x-full');
                };
            }
        
            if (mobileSidebar) {
                // Close mobile sidebar if click outside panel
                mobileSidebar.onclick = function(e) {
                    if (e.target === mobileSidebar) {
                        mobileSidebar.classList.add('opacity-0', 'pointer-events-none');
                        sidebarPanel.classList.add('-translate-x-full');
                    }
                };
            }

            // --- PROFILE MENU ---
            const profileMenu = document.getElementById('profilemenu');
            const profileSidebar = document.getElementById('profilesidebar');
            
            if (profileMenu && profileSidebar) {
                profileMenu.onclick = function() {
                    profileSidebar.classList.toggle('hidden');
                };
            }
        
            // --- CREATE POST MODAL ---
            const createPostBtnMobile = document.getElementById('createPostBtMobile');
            const createPostModal = document.getElementById('createPostModal');
            const createPostClose = document.getElementById('createPostModalX');
        
            function openCreatePostModal() {
                createPostModal.classList.remove('hidden');
                createPostModal.classList.add('flex');
                // Hide mobile sidebar when modal opens
                if (mobileSidebar) {
                    mobileSidebar.classList.add('opacity-0', 'pointer-events-none');
                    sidebarPanel.classList.add('-translate-x-full');
                }
                window.dispatchEvent(new Event('openCreatePostModal'));
            }
        
            if (createPostBtnMobile) {
                createPostBtnMobile.onclick = openCreatePostModal;
            }
        
            if (createPostClose) {
                createPostClose.onclick = function() {
                    createPostModal.classList.add('hidden');
                    createPostModal.classList.remove('flex');
                };
            }
        
            // --- RECENT POST MODAL ---
            const recentPostBtn = document.getElementById('recentpostlink');
            const recentPostModal = document.getElementById('recentpostcontainer');
            const recentPostClose = document.getElementById('recentpostX');
        
            if (recentPostBtn && recentPostModal) {
                recentPostBtn.onclick = function(e) {
                    e.preventDefault();
                    recentPostModal.classList.remove('hidden');
                    recentPostModal.classList.add('flex');
                }; 
            }
        
            if (recentPostClose && recentPostModal) {
                recentPostClose.onclick = function() {
                    recentPostModal.classList.add('hidden');
                    recentPostModal.classList.remove('flex');
                };
            }

            // --- LOGIN MODAL LINK ---
            const openLoginBtn = document.getElementById('openLogin');
            
            if (openLoginBtn && loginModal) {
                openLoginBtn.onclick = function(e) {
                    e.preventDefault();
                    loginModal.classList.remove('hidden');
                };
            }

            // --- UNIVERSAL SEARCH (Mobile & Category Filtering) ---
            // --- MOBILE CATEGORY SEARCH ---
            const searchInputMobile = document.getElementById('categorySearchMobile');
            const mobileCategoryList = document.getElementById('mobileCategoryList');
            
            if (searchInputMobile && mobileCategoryList) {
                const mobileCategories = mobileCategoryList.querySelectorAll('.category-item');

                searchInputMobile.oninput = function () {
                    const searchValue = this.value.toLowerCase();

                    mobileCategories.forEach(category => {
                        const text = category.dataset.category;

                        if (text.includes(searchValue)) {
                            category.classList.remove('hidden');
                        } else {
                            category.classList.add('hidden');
                        }
                    });
                };
            }
        }

        document.addEventListener('DOMContentLoaded', initNavbarScripts);
        document.addEventListener('livewire:navigated', initNavbarScripts);
    </script>
