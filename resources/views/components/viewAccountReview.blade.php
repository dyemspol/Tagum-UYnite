<!-- MODAL BACKDROP -->
<div
  id="userReviewAccountModal"
  class="fixed inset-0 bg-black/60 items-center justify-center z-50 {{ $selectedUser ? 'flex' : 'hidden' }}">
  <!-- MODAL CONTAINER -->
  @if($selectedUser)
  <div class="bg-[#1f3b56] w-[430px] rounded-xl shadow-xl p-6 relative">

    <!-- HEADER -->
    <h2
      class="text-xl font-semibold text-white mb-4 border-b border-white/20 pb-2">
      User Account Details
    </h2>

    <!-- CONTENT -->
    <div class="text-white space-y-3 text-sm">

      <div>
        <p class="text-gray-300">User ID</p>
        <p id="modalUserID">#USR-{{ $selectedUser->id }}</p>
      </div>

      <div>
        <p class="text-gray-300">Full Name</p>
        <p id="modalFullName">{{ $selectedUser->first_name }} {{ $selectedUser->last_name }}</p>
      </div>

      <div>
        <p class="text-gray-300">Email</p>
        <p id="modalEmail">{{ $selectedUser->email }}</p>
      </div>

      <div>
        <p class="text-gray-300">Location</p>
        <p id="modalLocation">{{ $selectedUser->address }}</p>
      </div>

      <div>
        <p class="text-gray-300">Status</p>
        <span id="modalStatus" class="text-green-400 font-semibold">{{ $selectedUser->verificationStatus->status }}</span>
      </div>

      <!-- VALID ID IMAGE PREVIEW -->
      <div
        class="glide max-w-full h-[200px] mx-auto relative overflow-hidden rounded-xl mt-3 mb-6">
        <!-- Slides -->
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides" id="modalIDImages">
            <!-- Example image slide -->
            @foreach($selectedUser->verification as $verification)
            <li class="glide__slide">
              <img
                src="{{ $verification->verification_photo  ?? 'wala'}}"
                class="w-full h-full object-cover" />
            </li>
            @endforeach

          </ul>
        </div>

        <!-- Controls -->
        <div
          class="absolute inset-0 flex justify-between items-center px-4 pointer-events-none"
          data-glide-el="controls">
          <button
            data-glide-dir="<"
            class="pointer-events-auto bg-black/50 text-white px-3 py-2 rounded-full hover:bg-black">
            ←
          </button>
          <button
            data-glide-dir=">"
            class="pointer-events-auto bg-black/50 text-white px-3 py-2 rounded-full hover:bg-black">
            →
          </button>
        </div>
      </div>

    </div>

    <!-- FOOTER BUTTONS -->
    <div class="flex justify-end gap-3 mt-6">
      <button
        wire:click="approveUser({{ $selectedUser->id }})"
        class="bg-indigo-500 hover:bg-indigo-600 px-5 py-2 rounded-lg text-white">
        Approve
      </button>
      <button
        wire:click="closeUser"
        class="border border-white/30 px-5 py-2 rounded-lg text-white">
        Cancel
      </button>
    </div>

  </div>
  @endif
</div>