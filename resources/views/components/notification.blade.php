<!-- Notification Sidebar -->
<div x-show="$store.notificationModal.open"  @click.self="$store.notificationModal.close()" class="w-[14em] z-30 fixed right-10 top-20 bg-[#182b3c] h-auto p-5 rounded-md shadow-md">
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
         @forelse($notifications as $notif)
        <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
          <div class="w-8 h-8 shrink-0">
            <img class="w-full h-full rounded-full object-cover" 
                 src="{{ $notif->user->profile_photo ? $notif->user->profile_photo : asset('img/noprofile.jpg') }}"
                 alt="User">
          </div>
          <div>
           <p class="text-white text-xs">
                    <span class="font-bold">{{ $notif->user->username }}</span>
                    @if($notif->type === 'comment')
                        commented on your post: <span class="text-gray-400 italic">"{{ Str::limit($notif->content, 20) }}"</span>
                    @else
                        liked your post
                    @endif
                </p>
                <span class="text-gray-400 text-xs">{{ $notif->created_at->diffForHumans() }}</span>
          </div>
        </a>
        @empty
        <div class="flex items-center justify-center p-2">
            <p class="text-gray-400 text-xs">No notifications</p>
        </div>
        @endforelse
  
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
  

  
  
  