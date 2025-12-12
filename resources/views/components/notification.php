<div id="notificationsidebar" class="w-[14em] fixed hidden right-10 top-18 bg-[#182b3c] p-5 rounded-br-md z-55 rounded-md shadow-md">
    <div class="flex flex-col space-y-4">
        
        <!-- Notification Header -->
        <h3 class="text-white text-sm font-semibold border-b border-gray-600 pb-2">Notifications</h3>
        
        <!-- Notification Items -->
        <div class="space-y-3 max-h-[300px] overflow-y-auto">
            
            <!-- Notification 1 -->
            <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
                <div class="w-8 h-8 flex-shrink-0">
                    <img class="w-full h-full rounded-full object-cover" 
                         src="{{ asset('img/ninogprofile.jpg') }}" 
                         alt="User">
                </div>
                <div>
                    <p class="text-white text-xs">Someone upvoted your post</p>
                    <span class="text-gray-400 text-xs">2 min ago</span>
                </div>
            </a>

            <!-- Notification 2 -->
            <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
                <div class="w-8 h-8 flex-shrink-0">
                    <img class="w-full h-full rounded-full object-cover" 
                         src="{{ asset('img/ninogprofile.jpg') }}" 
                         alt="User">
                </div>
                <div>
                    <p class="text-white text-xs">Someone upvoted your post</p>
                    <span class="text-gray-400 text-xs">5 min ago</span>
                </div>
            </a>

            <!-- Notification 3 -->
            <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
                <div class="w-8 h-8 flex-shrink-0">
                    <img class="w-full h-full rounded-full object-cover" 
                         src="{{ asset('img/ninogprofile.jpg') }}" 
                         alt="User">
                </div>
                <div>
                    <p class="text-white text-xs">Someone upvoted your post</p>
                    <span class="text-gray-400 text-xs">1 hour ago</span>
                </div>
            </a>

        </div>

        <!-- View All -->
        <!-- <a href="/notifications" class="text-center text-[#31A871] text-xs hover:underline pt-2 border-t border-gray-600">
            View All Notifications
        </a> -->

    </div>
</div>

<script>
    const notifSidebar = document.getElementById('notificationsidebar');
    const notifIcon = document.getElementById('notifIcon');


    notifIcon.addEventListener('click', () => {
        notifSidebar.classList.toggle('hidden');
    });



</script>