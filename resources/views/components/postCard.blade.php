@props(['isProfilePage' => false])

<div class="{{ $isProfilePage ? '' : 'flex items-center md:items-start justify-center lg:items-center' }}">

    <div class="bg-[#182b3cd5] py-3 w-[85%] max-w-[45em] lg:max-w-[50em] rounded-lg">
        <div class="flex px-3 gap-3 items-center justify-between mb-3">
           <div class="space-x-3 flex items-center">
             <div class="w-11 h-11 "><img class="w-full h-full rounded-full object-cover"
                     src="{{ asset('img/yaoyapo.jpg') }}" alt=""></div>
             <div class="">
                 <p class="font-normal text-sm text-white">James Paul Silayan</p>
                 <p class="font-light text-[#ffffffa4] text-xs">November 20, 2025 <span>•</span> Broken Road </p>
             </div>
           </div>
           <div class=""><p class="text-sm bg-amber-400 rounded-2xl px-1">Active</p></div>
        </div>
        <div class="">
            <p class="px-3 text-xs font-light line-clamp-2 text-white pb-2"><span>"</span>Free massage ang inyong likod
                ani. Palihog, hinay-hinay lang! 😂<span>"</span></p>
        </div>
        <div class="grid grid-cols-3 grid-rows-1">
            <div class="w-full h-auto"><img src="{{ asset('img/ninogprofile.jpg') }}" alt=""></div>
            <div class="w-full h-auto"><img src="{{ asset('img/ninogprofile.jpg') }}" alt=""></div>
            <div class="w-full h-auto "><img src="{{ asset('img/ninogprofile.jpg') }}" alt=""></div>
            


        </div>
       

        <div class="my-2 pl-3 flex space-x-1 items-center">
            <div id="voteBtn" class="flex space-x-0.5 items-center bg-[#354a5c00] rounded-xl px-2 py-1 cursor-pointer hover:bg-[#354a5c] transition-all duration-150"> <svg class="w-6 h-6 text-[#31A871]" data-slot="icon"
                    fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z">
                    </path>
                </svg><span class="text-white text-sm">5</span></div>

            <div id="downvoteBtn" class="flex space-x-0.5 items-center bg-[#354a5c00] rounded-xl px-2 py-1 cursor-pointer hover:bg-[#354a5c] transition-all duration-150"> <svg class="w-6 h-6 text-[#31A871]" data-slot="icon" fill="none" stroke-width="1.5"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg><span class="text-white text-sm">5</span></div>

            <button type="button" class="comment-toggle-btn flex items-center space-x-1 text-[#31A871] hover:text-white transition-colors px-2 py-1 rounded-xl" aria-label="Toggle comments">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 10h10M7 14h5m-9 3.5V6.8c0-1.01.82-1.8 1.84-1.8h12.32C18.18 5 19 5.79 19 6.8v8.4c0 1.01-.82 1.8-1.84 1.8H9.2L5.5 17.5Z"/>
                </svg>
            </button>
        </div>

        {{-- Comment Section --}}
        <div class="mt-3 px-3 pb-2 hidden comment-section">
            <p class="text-xs font-semibold text-white mb-2">Comments</p>

            {{-- Existing comments (static for now) --}}
            <div class="space-y-2 max-h-40 overflow-y-auto pr-1">
                <div class="flex items-start gap-2">
                    <div class="w-7 h-7">
                        <img class="w-full h-full rounded-full object-cover" src="{{ asset('img/yaoyapo.jpg') }}" alt="user">
                    </div>
                    <div class="bg-[#101b27] rounded-lg px-3 py-2 w-full">
                        <p class="text-[11px] font-semibold text-white">Juan Dela Cruz</p>
                        <p class="text-[11px] text-[#ffffffa4]">Grabe kaayo ni nga dalan oy, salamat sa pag-share.</p>
                    </div>
                </div>
                <div class="flex items-start gap-2">
                    <div class="w-7 h-7">
                        <img class="w-full h-full rounded-full object-cover" src="{{ asset('img/ninogprofile.jpg') }}" alt="user">
                    </div>
                    <div class="bg-[#101b27] rounded-lg px-3 py-2 w-full">
                        <p class="text-[11px] font-semibold text-white">Maria Santos</p>
                        <p class="text-[11px] text-[#ffffffa4]">Unsa kahay plano sa LGU ani? Kinahanglan gyud ni og action.</p>
                    </div>
                </div>
            </div>

            {{-- Add comment --}}
            <form class="mt-3 flex items-center gap-2">
                <input
                    type="text"
                    placeholder="Write a comment..."
                    class="flex-1 bg-[#101b27] border border-[#243447] text-[11px] text-white rounded-full px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#31A871]"
                >
                <button
                    type="submit"
                    class="text-[11px] font-semibold text-white bg-[#31A871] hover:bg-[#279060] px-3 py-1.5 rounded-full transition-colors duration-150"
                >
                    Post
                </button>
            </form>
        </div>
    </div>
    

</div>
<script>
    document.querySelectorAll('[id="voteBtn"]').forEach((upvoteBtn, index) => {
        const downvoteBtn = document.querySelectorAll('[id="downvoteBtn"]')[index];

        upvoteBtn.addEventListener("click", () => {
            if (upvoteBtn.classList.contains("bg-[#354a5c]")) {
                upvoteBtn.classList.remove("bg-[#354a5c]");
            } else {
                upvoteBtn.classList.add("bg-[#354a5c]");
                downvoteBtn.classList.remove("bg-[#354a5c]");
            }
        });

        downvoteBtn.addEventListener("click", () => {
            if (downvoteBtn.classList.contains("bg-[#354a5c]")) {
                downvoteBtn.classList.remove("bg-[#354a5c]");
            } else {
                downvoteBtn.classList.add("bg-[#354a5c]");
                upvoteBtn.classList.remove("bg-[#354a5c]");
            }
        });
    });

    document.querySelectorAll('.comment-toggle-btn').forEach((btn, index) => {
        const commentSection = document.querySelectorAll('.comment-section')[index];
        btn.addEventListener('click', () => {
            commentSection.classList.toggle('hidden');
        });
    });
</script>

