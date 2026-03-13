<div class="fixed" x-data>
    <div class="w-[17.5em] bg-[#182b3cd5] light:bg-white h-[40em] p-5 rounded-md shadow-lg border border-transparent light:border-gray-200 transition-colors duration-300">
        <div class="flex flex-col space-y-6">
            <a href="/" wire:navigate
                class="flex items-center space-x-3 transition duration-150 py-3 px-1 rounded-sm group {{ request()->routeIs('homepage') ? 'bg-[#31A871]' : 'hover:bg-[#31A871]' }}">
                <i class="fa-solid fa-house {{ request()->routeIs('homepage') ? 'text-white' : 'text-[#31A871] group-hover:text-white' }} text-normal"></i>
                <span class="text-white light:text-gray-800 text-sm">Home</span>
            </a>


            <a href="/latest" wire:navigate class="flex items-center space-x-4 py-2 px-1 rounded-sm group cursor-pointer {{ request()->routeIs('latest') ? 'bg-[#31A871]' : 'hover:bg-[#31A871]' }}">
                <i class="fa-solid fa-fire-flame-curved {{ request()->routeIs('latest') ? 'text-white' : 'text-[#31A871] group-hover:text-white' }}"></i>
                <span class="text-white light:text-gray-800 text-sm">Latest</span>
            </a>

            <a href="/popular" wire:navigate class="flex items-center space-x-3 py-2 px-1 rounded-sm group cursor-pointer {{ request()->routeIs('popular') ? 'bg-[#31A871]' : 'hover:bg-[#31A871]' }}">
                <i class="fa-solid fa-house {{ request()->routeIs('popular') ? 'text-white' : 'text-[#31A871] group-hover:text-white' }}"></i>
                <span class="text-white light:text-gray-800 text-sm">Popular</span>
            </a>

            {{-- <div class="flex items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group cursor-pointer">
                <i class="fa-solid fa-earth-asia text-[#31A871] group-hover:text-white"></i>
                <span class="text-white text-sm group-hover:text-white">All</span>
            </div> --}}

            @auth
            @if(auth()->user()->is_verified == 1)
            <div id="createPostBtDesktop" class="flex cursor-pointer items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group">
                <i class="fa-solid fa-plus text-[#31A871] group-hover:text-white"></i>
                <span class="text-white light:text-gray-800 text-sm group-hover:text-white">Create Post</span>
            </div>
            @else
            <div class="flex cursor-not-allowed items-center space-x-4 py-2 px-1 rounded-sm opacity-50 bg-gray-800/20 group">
                <i class="fa-solid fa-plus text-gray-500"></i>
                <span class="text-gray-500 text-sm italic">Verification Required</span>
            </div>
            @endif
            @endauth
            @guest
            <div id="createPostBtGuest" class="flex cursor-pointer items-center space-x-4 py-2 px-1 rounded-sm hover:bg-[#31A871] group">
                <i class="fa-solid fa-plus text-[#31A871] group-hover:text-white"></i>
                <span class="text-white light:text-gray-800 text-sm group-hover:text-white">Create Post</span>
            </div>
            @endguest

        </div>



        <hr class="mt-7 mb-4 border-gray-600 light:border-gray-100">

        <div class="flex flex-col gap-2 mb-4">
            <h1 class="text-white light:text-gray-800 font-semibold">Post category</h1>

            <div class="relative hidden sm:flex">
                <x-heroicon-o-magnifying-glass
                    class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white light:text-gray-400 w-4 h-4" />

                <input
                    id="categorySearchDesktop"
                    type="text"
                    placeholder="Search categories..."
                    class="bg-[#122333] light:bg-[#f3f4f6] w-full text-white light:text-gray-800 rounded-md pl-9 pr-2 py-1 focus:outline-none text-sm transition-colors border light:border-gray-200" />
            </div>
        </div>
        <div id="desktopCategoryList" class="overflow-y-scroll hide-scrollbar">
            @foreach($departments as $department)
            <div class="category-item py-2"
                data-category="{{ strtolower($department->category) }}">

                <label class="flex items-center justify-between cursor-pointer select-none">

                    <p class="text-white light:text-gray-600 text-sm font-light">
                        {{ $department->category }}
                    </p>

                    <!-- Hidden checkbox -->
                    <input
                        type="checkbox"
                        value="{{ $department->id }}"
                        @change="$dispatch('toggle-category', { id: {{ $department->id }} })"
                        class="peer hidden" />

                    <!-- Simple circle -->
                    <span
                        class="w-4 h-4 rounded-full border border-gray-400
                   flex items-center justify-center
                   transition peer-checked:border-[#31A871]
                   peer-checked:bg-[#31A871]">
                    </span>

                </label>
            </div>

            @endforeach
        </div>





    </div>



</div>

<script>
    function initDesktopSidebar() {
        // --- Create Post Button Logic ---
        const authBtn = document.getElementById('createPostBtDesktop');
        const guestBtn = document.getElementById('createPostBtGuest');

        if (authBtn) {
            authBtn.addEventListener('click', () => {
                const modal = document.getElementById('createPostModal');
                if (modal) {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                }
                window.dispatchEvent(new Event('openCreatePostModal'));
            });
        }

        if (guestBtn) {
            guestBtn.addEventListener('click', () => {
                window.location.href = "/login";
            });
        }

        // --- Category Search Logic ---
        const searchInputDesktop = document.getElementById('categorySearchDesktop');
        const desktopCategoriesContainer = document.getElementById('desktopCategoryList');

        if (searchInputDesktop && desktopCategoriesContainer) {
            // Only query items within this specific container
            const desktopCategories = desktopCategoriesContainer.querySelectorAll('.category-item');

            searchInputDesktop.addEventListener('input', function() {
                const searchValue = this.value.toLowerCase();

                desktopCategories.forEach(category => {
                    const text = category.dataset.category;

                    if (text.includes(searchValue)) {
                        category.classList.remove('hidden');
                    } else {
                        category.classList.add('hidden');
                    }
                });
            });
        }
    }

    document.addEventListener('DOMContentLoaded', initDesktopSidebar);
    document.addEventListener('livewire:navigated', initDesktopSidebar);
</script>