<!-- MODAL BACKDROP -->
<div
  id="userReviewAccountModal"
  class="fixed inset-0 bg-black/60 items-center justify-center z-50 {{ $selectedUser ? 'flex' : 'hidden' }}">
  <!-- MODAL CONTAINER -->
  @if($selectedUser)
  <div class="bg-[#1a1d29] w-[430px] rounded-xl shadow-xl p-6 relative border border-[#2a2d3a]"
   x-data="{ showFullscreen: false, fullscreenImage: '' }"
   x-init="$nextTick(() => {
    new Swiper('.mySwiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination', clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev',
        },
    });
})">

    <!-- HEADER -->
    <h2
      class="text-xl font-semibold text-white mb-4 border-b border-[#2a2d3a] pb-2">
      User Account Details
    </h2>

    <!-- CONTENT -->
    <div class="text-white space-y-4 text-sm">
      <div class="grid grid-cols-2 gap-y-4">
        <div>
          <p class="text-gray-400 text-xs uppercase font-bold tracking-wider">User ID</p>
          <p id="modalUserID" class="text-white font-medium">#USR-{{ $selectedUser->id }}</p>
        </div>

        <div>
          <p class="text-gray-400 text-xs uppercase font-bold tracking-wider">Status</p>
          <span id="modalStatus" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-400">
             {{ $selectedUser->verificationStatus->status }}
          </span>
        </div>

        <div class="col-span-2">
          <p class="text-gray-400 text-xs uppercase font-bold tracking-wider">Full Name</p>
          <p id="modalFullName" class="text-lg font-semibold">{{ $selectedUser->first_name }} {{ $selectedUser->last_name }}</p>
        </div>

        <div class="col-span-2">
          <p class="text-gray-400 text-xs uppercase font-bold tracking-wider">Email Address</p>
          <p id="modalEmail" class="text-white">{{ $selectedUser->email }}</p>
        </div>

        <div class="col-span-2">
          <p class="text-gray-400 text-xs uppercase font-bold tracking-wider">Location</p>
          <p id="modalLocation" class="text-white leading-relaxed">{{ $selectedUser->address }}</p>
        </div>
      </div>

      <!-- VALID ID IMAGE PREVIEW -->
      <div class="mt-6">
        <p class="text-gray-400 text-xs uppercase font-bold tracking-wider mb-3">Attached Proof</p>
        <div class="swiper mySwiper h-64 rounded-xl border border-[#2a2d3a] overflow-hidden">
          <div class="swiper-wrapper">
            @foreach($selectedUser->verification as $verification)
            <div class="swiper-slide cursor-zoom-in" @click="fullscreenImage = '{{ $verification->verification_photo }}'; showFullscreen = true">
              <img src="{{ $verification->verification_photo  ?? 'wala'}}"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
            </div>
            @endforeach
          </div>
          <!-- Swiper Elements -->
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next !text-[#00d4aa] !w-8 !h-8 after:!text-sm bg-black/50 rounded-full h-10 w-10"></div>
          <div class="swiper-button-prev !text-[#00d4aa] !w-8 !h-8 after:!text-sm bg-black/50 rounded-full h-10 w-10"></div>
        </div>
        <p class="text-center text-[10px] text-gray-500 mt-2">Click image to view full screen</p>
      </div>
    </div>

    <!-- FOOTER BUTTONS -->
    <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-[#2a2d3a]">
      <button
        wire:click="closeUser"
        class="border border-[#2a2d3a] px-5 py-2 rounded-lg text-white hover:bg-white/5 transition-colors">
        Cancel
      </button>
      <button
        wire:click="approveUser({{ $selectedUser->id }})"
        class="bg-[#00d4aa] hover:bg-[#00e6b8] px-6 py-2 rounded-lg text-[#0f1117] font-bold shadow-lg shadow-[#00d4aa]/10 transition-all">
        Approve User
      </button>
    </div>

    <!-- FULLSCREEN VIEWER -->
    <div x-show="showFullscreen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="showFullscreen = false"
         class="fixed inset-0 z-[10000] bg-black/95 backdrop-blur-md flex items-center justify-center p-4 sm:p-10" 
         style="display: none;">
        
        <!-- CLOSE BUTTON -->
        <!-- <button @click="showFullscreen = false" 
                class="absolute top-6 right-6 text-white hover:text-red-500 transition-colors z-[10001]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="6 18L18 6M6 6l12 12" />
            </svg>
        </button> -->

        <!-- IMAGE CONTAINER -->
        <div class="max-w-5xl w-full h-full flex items-center justify-center" @click.outside="showFullscreen = false">
            <img :src="fullscreenImage" 
                 class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-all duration-300" 
                 alt="Proof Full Resolution">
        </div>
    </div>

  </div>
  @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>