<!-- Notification Sidebar -->
<div id="notificationsidebar" class="w-[14em] z-30 fixed hidden right-10 top-20 bg-[#182b3c] h-auto p-5 rounded-md shadow-md">
    <div class="flex flex-col h-full">
  
  <!-- Header -->
      <div class="flex justify-between items-center border-b pb-2 text-white">
        <div class="flex items-center gap-2">
          <p class="font-semibold">Notifications</p>
         
        </div>
        <i id="notifX" class="fa-solid fa-x text-xs cursor-pointer"></i>
      </div>
  
      <!-- Scrollable Notifications -->
      <div class="flex-1 overflow-y-auto space-y-3 mt-2 hide-scrollbar">
        <!-- Example Notification -->
        <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
          <div class="w-8 h-8 shrink-0">
            <img class="w-full h-full rounded-full object-cover" 
                 src="{{ asset('img/ninogprofile.jpg') }}" 
                 alt="User">
          </div>
          <div>
            <p class="text-white text-xs">Someone upvoted your post</p>
            <span class="text-gray-400 text-xs">2 min ago</span>
          </div>
        </a>
        <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
            <div class="w-8 h-8 shrink-0">
              <img class="w-full h-full rounded-full object-cover" 
                   src="{{ asset('img/ninogprofile.jpg') }}" 
                   alt="User">
            </div>
            <div>
              <p class="text-white text-xs">Someone upvoted your post</p>
              <span class="text-gray-400 text-xs">2 min ago</span>
            </div>
          </a>
         
         
         
          
  
        <!-- Duplicate as many notifications as needed -->
        <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
          <div class="w-8 h-8 shrink-0">
            <img class="w-full h-full rounded-full object-cover" 
                 src="{{ asset('img/ninogprofile.jpg') }}" 
                 alt="User">
          </div>
          <div>
            <p class="text-white text-xs">Someone commented on your post</p>
            <span class="text-gray-400 text-xs">5 min ago</span>
          </div>
        </a>
  
        <!-- Add more notifications here -->
        <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
          <div class="w-8 h-8 shrink-0">
            <img class="w-full h-full rounded-full object-cover" 
                 src="{{ asset('img/ninogprofile.jpg') }}" 
                 alt="User">
          </div>
          <div>
            <p class="text-white text-xs">Your post was shared</p>
            <span class="text-gray-400 text-xs">10 min ago</span>
          </div>
        </a>
  
      </div>

      <!-- Bottom "View all notifications" link -->
      <div class="mt-3">
        <hr class="border-gray-700 mb-2">
        <a
          href="{{ route('notifications') }}"
          id="viewAllNotificationsBottom"
          class="block w-full text-center text-[0.75rem] text-[#31A871] hover:underline py-1">
          View all notifications
        </a>
        <hr class="border-gray-700 mt-2">
      </div>
  
      
      </div>
  </div>