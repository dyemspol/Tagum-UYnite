<nav class="bg-[#182B3C] fixed top-0 left-0 w-full z-30">
    <div class="flex h-16 justify-between w-full items-center mx-auto sm:px-10 py-2 shadow-md px-5">
        <div class="flex justify-center items-center">
            <div id="menuicon" class="lg:hidden cursor-pointer"><i class="fa-solid fa-bars text-white text-xl"></i></div>
             <a href="/"> <div class="w-11 h-auto lg:block hidden"><img class="w-full h-full" src="{{ asset('img/LOGO.png') }}"
                    alt="logo">
            </div></a>
        </div>
        <div class="relative w-120 hidden sm:flex">
            <x-heroicon-o-magnifying-glass
                class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white w-5 h-5" />

            <input type="text" placeholder="Search..."
                class="bg-[#122333] w-full text-white rounded-md pl-9 pr-2 py-2 focus:outline-none" />
        </div>



    @if (!auth()->check())
    <button id = "loginBt" class="bg-[#31a87100] border-[1px] py-1 px-4 text-white rounded-sm font-light">Login</button>
    @endif

    <div id="profilemenu" class="w-10 h-10 cursor-pointer" @click="$dispatch('toggle-profile-sidebar')">
        <img class="w-full h-full rounded-full object-cover" src="{{ asset('img/ninogprofile.jpg') }}" alt="">
    </div>
       
     
    </div>
</nav>



{{-- mobile version leftsidebar --}}

<div id="mobileSidebar"
    class="fixed lg:hidden mt-16 left-0 h-16 w-full h-full bg-[#0c0c0cb2] opacity-0 pointer-events-none transition-all duration-300 z-40">

    <div class="w-[14em] bg-[#182b3c] p-5 rounded-br-md transform -translate-x-full transition-all duration-300"
        id="sidebarPanel">

        <div class="flex flex-col space-y-5">
            <div class="w-11 h-auto"><img class="w-full h-full" src="{{ asset('img/LOGO.png') }}" alt="">
            </div>
            <div
                class="flex items-center space-x-3 hover:bg-[#31A871] transition duration-150 py-3 px-1 rounded-sm group">
                <i class="fa-solid fa-house text-[#31A871] text-normal group-hover:text-white"></i>
                <span class="text-white text-sm group-hover:text-white">Home</span>
            </div>


            <div class="flex items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group cursor-pointer">
                <i class="fa-solid fa-fire-flame-curved text-[#31A871] group-hover:text-white"></i>
                <span class="text-white text-sm group-hover:text-white">Latest</span>
            </div>

            <div class="flex items-center space-x-3 py-2 px-1 rounded-sm hover:bg-[#31A871] group cursor-pointer">
                <i class="fa-solid fa-house text-[#31A871] group-hover:text-white"></i>
                <span class="text-white text-sm group-hover:text-white">Popular</span>
            </div>

            <div class="flex items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group cursor-pointer">
                <i class="fa-solid fa-earth-asia text-[#31A871] group-hover:text-white"></i>
                <span class="text-white text-sm group-hover:text-white">All</span>
            </div>

            @auth
            <div id="createPostBtn" class="cursor-pointer block px-4 py-2 bg-blue-600 text-white rounded">
                Create Post
            </div>
            @endauth

            @guest
            <div id="createPostBtnGuest" class="cursor-pointer block px-4 py-2 bg-gray-600 text-white rounded">
                Create Post
            </div>
            @endguest




        </div>



        <hr class ="mt-7 mb-4 border-gray-600">

        <div class="flex flex-col gap-2 mb-4">
            <h1 class="text-white font-semibold">Post category</h1>

            <div class="relative hidden sm:flex">
                <x-heroicon-o-magnifying-glass
                    class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white w-4 h-4" />

                <input type="text" placeholder="Search categories..."
                    class="bg-[#122333] w-full text-white rounded-md pl-9 pr-2 py-1 focus:outline-none text-sm " />
            </div>
        </div>


        <div class="space-y-2">
            <div class="flex justify-between items-center">
                <p class="text-white font-light text-sm">Land Slide</p>
                <div class="bg-[#122333] rounded-full w-6 h-6 flex justify-center items-center">
                    <p class="text-white">5</p>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-white font-light text-sm">Water Leaks</p>
                <div class="bg-[#122333] rounded-full w-6 h-6 flex justify-center items-center">
                    <p class="text-white">2</p>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-white font-light text-sm">Broken Road</p>
                <div class="bg-[#122333] rounded-full w-6 h-6 flex justify-center items-center">
                    <p class="text-white">1</p>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-white font-light text-sm">Electric Outage</p>
                <div class="bg-[#122333] rounded-full w-6 h-6 flex justify-center items-center">
                    <p class="text-white">4</p>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-white font-light text-sm">Land Slide</p>
                <div class="bg-[#122333] rounded-full w-6 h-6 flex justify-center items-center">
                    <p class="text-white">2</p>
                </div>
            </div>
        </div>



    </div>



</div>




{{-- profilesidebar --}}
{{-- right-[-40%] --}}
<div x-data="{ open: false }" 
     @toggle-profile-sidebar.window="open = !open"
     @click.outside="open = false"
     :class="open ? 'block' : 'hidden'"
     id="profilesidebar" 
     class="fixed right-2 top-16 w-48 bg-[#182b3c] rounded-md shadow-lg overflow-hidden transition-all duration-300 z-50">
    <div class="w-[14em] bg-[#182b3c] p-5 rounded-br-md">
        <div class="flex flex-col space-y-6">
            <a href="/profile" class="flex items-center space-x-3">
                <div class="w-9 h-9">
                    <img class="w-full h-full rounded-full object-cover" src="{{ asset('img/ninogprofile.jpg') }}" alt="">
                </div>
                <p class="text-white text-sm">View Profile</p>
               
            </a>

            <a href="#" id="recentpostlink" class="flex lg:hidden items-center space-x-3 py-2 px-1 rounded-sm hover:bg-[#31A871] transition duration-150 cursor-pointer">
                <i class="fa-solid fa-clock text-[#31A871]"></i>
                <span class="text-white text-sm">Recent Post</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="flex items-center space-x-3 py-2 px-1 rounded-sm hover:bg-[#31A871] transition duration-150 cursor-pointer">
                @csrf
                <i class="fa-solid fa-sign-out text-[#31A871]"></i>
                <span class="text-white text-sm">Sign out</span>
            </form>
        </div>
    </div>
</div>

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
    
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- MOBILE SIDEBAR ---
        const loginBtn = document.getElementById('loginBt');
        const loginModal = document.getElementById('loginModal');
        const menuIcon = document.getElementById('menuicon');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const sidebarPanel = document.getElementById('sidebarPanel');
        


        if (loginBtn) {
            loginBtn.addEventListener('click', function() {
                loginModal.classList.remove('hidden');
                loginModal.classList.add('flex');
            });
        }
        
        if (loginModal) {
            loginModal.addEventListener('click', function(e) {
                // If the click target is the overlay itself, close the modal
                if (e.target === loginModal) {
                    loginModal.classList.remove('flex');
                    loginModal.classList.add('hidden');
                }
            });
        }
        


        menuIcon.addEventListener('click', function() {
            mobileSidebar.classList.toggle('opacity-0');
            mobileSidebar.classList.toggle('pointer-events-none');
            sidebarPanel.classList.toggle('-translate-x-full');
        });
    
        // Close mobile sidebar if click outside panel
        mobileSidebar.addEventListener('click', function(e) {
            if (e.target === mobileSidebar) {
                mobileSidebar.classList.add('opacity-0', 'pointer-events-none');
                sidebarPanel.classList.add('-translate-x-full');
            }
        });
    
        // --- PROFILE SIDEBAR ---
       // Wait until DOM is loaded

});


document.addEventListener('DOMContentLoaded', function() {
        
        const mobileSidebar = document.getElementById('mobileSidebar');
        const sidebarPanel = document.getElementById('sidebarPanel');

        // --- CREATE POST MODAL ---
        const createPostBtnMobile = document.getElementById('createPostBtnMobile');
        const createPostBtnDesktop = document.getElementById('createPostBt');
        const createPostModal = document.getElementById('createPostModal');
        const createPostClose = document.getElementById('createPostModalX');
    
        // Function to open create post modal
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
    
        // Add event listeners for both mobile and desktop buttons
        if (createPostBtnMobile) {
            createPostBtnMobile.addEventListener('click', openCreatePostModal);
        }
        if (createPostBtnDesktop) {
            createPostBtnDesktop.addEventListener('click', openCreatePostModal);
        }
    
        createPostClose.addEventListener('click', function() {
            createPostModal.classList.add('hidden');
            createPostModal.classList.remove('flex');
        });
    
        // --- RECENT POST MODAL ---
        const recentPostBtn = document.getElementById('recentpostlink');
        const recentPostModal = document.getElementById('recentpostcontainer');
        const recentPostClose = document.getElementById('recentpostX');
    
        recentPostBtn.addEventListener('click', function(e) {
            e.preventDefault();
            recentPostModal.classList.remove('hidden');
            recentPostModal.classList.add('flex');
            profileSidebar.classList.add('max-h-0'); // hide profile sidebar
        });
    
        recentPostClose.addEventListener('click', function() {
            recentPostModal.classList.add('hidden');
            recentPostModal.classList.remove('flex');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    const openLoginBtn = document.getElementById('openLogin');
    const loginModal = document.getElementById('loginModal');
    
    if (openLoginBtn && loginModal) {
        openLoginBtn.addEventListener('click', function(e) {
            e.preventDefault();
            loginModal.classList.remove('hidden');
        });
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const authBtn = document.getElementById('createPostBtn');
    const guestBtn = document.getElementById('createPostBtnGuest');

    if (authBtn) {
        authBtn.addEventListener('click', () => {
            Livewire.dispatch('openCreatePostModal');
        });
    }

    if (guestBtn) {
        guestBtn.addEventListener('click', () => {
            window.location.href = "/login";
        });
    }
});


    </script>

