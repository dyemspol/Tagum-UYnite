<!-- Notification Sidebar -->
<div x-show="$store.notificationModal.open" @click.self="$store.notificationModal.close()" class="w-[17em] z-30 fixed right-10 top-20 bg-[#182b3c] light:bg-white h-auto p-5 rounded-md shadow-md border border-transparent light:border-gray-200 transition-colors">
  <div class="flex flex-col h-full">

    <!-- Header -->
    <div class="flex justify-between items-center border-b light:border-gray-200 pb-2 text-white light:text-gray-800">
      <div class="flex items-center gap-2">
        <p class="font-semibold">Notifications</p>

      </div>
      <i id="notifX" @click="$store.notificationModal.close()" class="fa-solid fa-x text-xs cursor-pointer"></i>
    </div>

    <!-- Scrollable Notifications -->
    <div class="flex-1 overflow-y-auto space-y-3 mt-2 hide-scrollbar">
      <!-- Example Notification -->
      @forelse($notifications as $notif)
      <a href="{{ route('profile') }}" class="flex items-center gap-3 p-2 hover:bg-[#234156] light:hover:bg-gray-100 rounded-lg transition-colors">
        <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-700 flex-shrink-0">
          <img class="w-full h-full rounded-full object-cover"
            src="{{ $notif['user']['profile_photo'] ?? asset('img/noprofile.jpg') }}"
            alt="User">
        </div>
         <div>
          <p class="text-white light:text-gray-800 text-xs">
            @if(in_array($notif['type'], ['comment', 'reaction']))
            <span class="font-bold text-white light:text-gray-900">{{ $notif['user']['username'] }}</span>
            @endif
            @if($notif['type'] === 'comment')
            commented on your post: <span class="text-gray-400 light:text-gray-500 italic">"{{ Str::limit($notif['comment_text'] ?? '', 20) }}"</span>
            @elseif($notif['type'] === 'reaction')
            liked your post
            @elseif($notif['type'] === 'resolved')
            Report #{{ $notif['report_id'] }} has been resolved
            @elseif($notif['type'] === 'takedown')
            Your post #{{ $notif['report_id'] }} has been taken down: <span class="text-gray-400 light:text-gray-500 italic">"{{ $notif['takedown_reason'] ?? 'Violation of guidelines' }}"</span>
            @endif
          </p>
          <span class="text-gray-400 light:text-gray-500 text-xs">{{ isset($notif['created_at']) ? \Carbon\Carbon::parse($notif['created_at'])->diffForHumans() : 'Just now' }}</span>
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