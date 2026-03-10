<!-- MODAL BACKDROP -->
<div
  id="userReviewAccountModal"
  class="fixed inset-0 bg-black/60 items-center justify-center z-50 {{ $selectedUser ? 'flex' : 'hidden' }}">
  <!-- MODAL CONTAINER -->
  @if($selectedUser)
  <div class="bg-[#1a1d29] w-[430px] rounded-xl shadow-xl p-6 relative border border-[#2a2d3a]"
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
            <div class="swiper-slide">
              <img src="{{ $verification->verification_photo  ?? 'wala'}}"
                class="w-full h-full object-cover" />
            </div>
            @endforeach
          </div>
          <!-- Swiper Elements -->
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next !text-[#00d4aa] !w-8 !h-8 after:!text-sm bg-black/50 rounded-full h-10 w-10"></div>
          <div class="swiper-button-prev !text-[#00d4aa] !w-8 !h-8 after:!text-sm bg-black/50 rounded-full h-10 w-10"></div>
        </div>
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

  </div>
  @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>