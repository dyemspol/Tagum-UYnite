<div x-show="$store.notificationModal.open"
     x-transition.opacity
     style="display: none;"
     @click.self="$store.notificationModal.close()"
     class="fixed inset-0 bg-[#000000a0] bg-opacity-50 z-50 flex items-center justify-center">
    
    <!-- Modal Content -->
    <div class="bg-[#182b3c] w-[90%] max-w-md h-[40em] rounded-lg shadow-2xl flex flex-col">
      
      <!-- Header -->
      <div class="flex justify-between items-center border-b border-gray-600 p-5 pb-3">
        <p class="font-semibold text-white text-lg">Notifications</p>
        <i @click="$store.notificationModal.close()" class="fa-solid fa-x text-sm cursor-pointer text-white hover:text-gray-300 transition"></i>
      </div>

      <!-- Scrollable Notifications -->
      <div class="flex-1 overflow-y-auto space-y-3 p-5 hide-scrollbar">
        
        @forelse($notifications as $notif)
            <a href="#" class="flex items-start space-x-3 p-2 rounded-sm hover:bg-[#31A871] transition duration-150">
            <div class="w-8 h-8 flex-shrink-0">
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
            <div class="flex flex-col items-center justify-center h-full text-gray-400">
                <p class="text-sm">No new notifications</p>
            </div>
        @endforelse

      </div>

    </div>

  </div>