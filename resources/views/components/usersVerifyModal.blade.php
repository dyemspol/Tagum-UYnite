<!-- MODAL BACKDROP - wire:ignore.self keeps modal open when Livewire re-renders (wire:model updates) -->
<div
  id="verifyUserAccountModal"
  wire:ignore.self
  class="fixed hidden inset-0 flex items-center justify-center bg-black/60 backdrop-blur-sm z-[9999] overflow-y-auto p-4">
  <!-- MODAL CONTAINER -->
  <div class="bg-[#1f3b56] w-full max-w-[450px] rounded-xl shadow-xl p-6 relative my-auto">

    <!-- HEADER -->
    <h2 class="text-xl font-semibold text-white mb-4 border-b border-white/20 pb-2">
      Verify Your Account
    </h2>

    <!-- FORM CONTENT -->
    <div class="space-y-4 text-sm">
      <div>
        <label class="text-gray-300 block mb-1">Birthday</label>
        <input wire:model="birthday"
          type="date"
          max="{{ now()->subYears(18)->format('Y-m-d') }}"
          class="w-full mt-1 p-2.5 rounded-lg bg-[#244c72] border border-white/20 text-white outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
          title="You must be at least 18 years old">
        @error('birthday')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        <p class="text-gray-400 text-xs mt-1">You must be at least 18 years old</p>
      </div>

      <div>
        <label class="text-gray-300 block mb-1">Barangay</label>
        <select wire:model="barangay_id"
          class="w-full mt-1 p-2.5 min-h-[42px] rounded-lg bg-[#244c72] border border-white/20 text-white outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
          <option value="">Select Barangay</option>
          @foreach($barangays as $barangay)
          <option value="{{ $barangay->id }}">{{ $barangay->barangay_name }}</option>
          @endforeach
        </select>
        @error('barangay_id')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="text-gray-300 block mb-1">Street/Purok</label>
        <input wire:model="address"
          type="text"
          placeholder="Enter street/purok"
          class="w-full mt-1 p-2.5 rounded-lg bg-[#244c72] border border-white/20 text-white placeholder-gray-400 outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
        @error('address')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
      </div>

      <div>

        <label class="text-gray-300 block mb-1">Upload Valid ID</label>
        <input wire:model="verification_photo"
          type="file"
          id="verification_photo"
          accept="image/*"
          multiple
          class="w-full mt-1 p-2 rounded-lg bg-[#244c72] border border-white/20 text-white outline-none 
               file:bg-[#31A871] file:text-white file:rounded-lg 
               file:px-3 file:py-1 file:border-none cursor-pointer focus:ring-2 focus:ring-blue-400 focus:border-transparent">
        <p class="text-gray-400 text-xs mt-1">You can upload 1 or 2 photos</p>
        <div wire:loading wire:target="verification_photo" class="text-blue-400 text-xs mt-1">
          Uploading photos...
        </div>
        @error('verification_photo')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
      </div>

      <!-- ACTION BUTTONS -->
      <div class="flex justify-end gap-3 mt-6">
        <button type="button"
          wire:click="verifyUser"
          wire:loading.attr="disabled"
          class="bg-[#31A871] hover:bg-green-600 px-5 py-2 rounded-lg text-white disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
          <span wire:loading.remove wire:target="verifyUser">Verify</span>
          <span wire:loading wire:target="verifyUser">Processing...</span>
          <div wire:loading wire:target="verifyUser" class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"></div>
        </button>
        <button type="button"
          onclick="document.getElementById('verifyUserAccountModal').style.display='none'"
          class="border border-white/30 px-5 py-2 rounded-lg text-white hover:bg-white/10 transition">
          Cancel
        </button>
      </div>
    </div>

  </div>
</div>