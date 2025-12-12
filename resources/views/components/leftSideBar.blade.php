<div class="fixed">

    <div class="w-full bg-[#182b3cd5] h-full  p-5 rounded-md">
        <div class="flex flex-col space-y-6">
            <a href="/"
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
               <div id="createPostBt" class="flex cursor-pointer items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group" @click="$dispatch('openCreatePost')">
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
        
             <input type="text" placeholder="Search categories..."
                 class="bg-[#122333] w-full text-white rounded-md pl-9 pr-2 py-1 focus:outline-none text-sm " />
         </div>
       </div>
            
             @foreach($departments as $department)
              <div class="space-y-2">
                <label class="flex justify-between items-center cursor-pointer">
            
                    <p class="text-white font-light text-sm">{{ $department->category }}</p>
                    <input type="checkbox"
                           class="w-4 h-  accent-[#31A871] rounded-xl cursor-pointer" />
                </label>
            </div>
            @endforeach 
            



           
        
    </div>



</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    
    const authBtn = document.getElementById('createPostBt');
    const guestBtn = document.getElementById('createPostBtGuest');
    

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