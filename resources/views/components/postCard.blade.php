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
        <div class="w-full h-auto"><img src="{{ asset('img/ninogprofile.jpg') }}" alt=""></div>

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
        </div>
    </div>
    

</div>
<script>
    const upvoteBtn = document.getElementById("voteBtn");
    const downvoteBtn = document.getElementById("downvoteBtn");

    upvoteBtn.addEventListener("click", () => {
        if (upvoteBtn.classList.contains("bg-[#354a5c]")) {
            // If already active, deactivate
            upvoteBtn.classList.remove("bg-[#354a5c]");
        } else {
            // Activate upvote, deactivate downvote
            upvoteBtn.classList.add("bg-[#354a5c]");
            downvoteBtn.classList.remove("bg-[#354a5c]");
        }
    });

    downvoteBtn.addEventListener("click", () => {
        if (downvoteBtn.classList.contains("bg-[#354a5c]")) {
            // If already active, deactivate
            downvoteBtn.classList.remove("bg-[#354a5c]");
        } else {
            // Activate downvote, deactivate upvote
            downvoteBtn.classList.add("bg-[#354a5c]");
            upvoteBtn.classList.remove("bg-[#354a5c]");
        }
    });
</script>

