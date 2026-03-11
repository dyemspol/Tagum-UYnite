<!-- MODAL BACKDROP - wire:ignore.self keeps modal open when Livewire re-renders (wire:model updates) -->
<div
  id="verifyUserAccountModal"
  wire:ignore.self
  class="fixed hidden inset-0 flex items-center justify-center bg-black/60 backdrop-blur-sm z-[9999] overflow-y-auto p-4">
  <!-- MODAL CONTAINER -->
  <div class="bg-gradient-to-b from-[#1F486C] to-[#0F1F2C] light:from-white light:to-[#f8fafc] w-full max-w-[450px] rounded-xl shadow-xl p-6 relative my-auto border border-[#2a2d3a] light:border-gray-200 transition-colors">

    <!-- HEADER -->
    <h2 class="text-xl font-semibold text-white light:text-gray-900 mb-4 border-b border-[#2a2d3a] light:border-gray-200 pb-2 transition-colors">
      Verify Your Account
    </h2>

    <!-- FORM CONTENT -->
    <div class="space-y-4 text-sm">
      <div>
        <label class="text-gray-300 light:text-gray-700 block mb-1 transition-colors">Birthday</label>
        <input wire:model="birthday"
          type="date"
          max="{{ now()->subYears(18)->format('Y-m-d') }}"
          class="w-full mt-1 p-2.5 rounded-lg bg-white/5 light:bg-transparent border border-white/20 light:border-gray-300 text-white light:text-gray-900 outline-none focus:ring-2 focus:ring-[#00d4aa] focus:border-transparent transition-colors"
          title="You must be at least 18 years old">
        @error('birthday')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        <p class="text-gray-400 light:text-gray-500 text-xs mt-1 transition-colors">You must be at least 18 years old</p>
      </div>

      <div>
        <label class="text-gray-300 light:text-gray-700 block mb-1 transition-colors">Barangay</label>
        <select wire:model="barangay_id"
          class="w-full mt-1 p-2.5 min-h-[42px] rounded-lg bg-white/5 light:bg-transparent border border-white/20 light:border-gray-300 text-white light:text-gray-900 outline-none focus:ring-2 focus:ring-[#00d4aa] focus:border-transparent transition-colors">
          <option value="" class="text-gray-800">Select Barangay</option>
          @foreach($barangays as $barangay)
          <option value="{{ $barangay->id }}" class="text-gray-800">{{ $barangay->barangay_name }}</option>
          @endforeach
        </select>
        @error('barangay_id')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="text-gray-300 light:text-gray-700 block mb-1 transition-colors">Street/Purok</label>
        <input wire:model="address"
          type="text"
          placeholder="Enter street/purok"
          class="w-full mt-1 p-2.5 rounded-lg bg-white/5 light:bg-transparent border border-white/20 light:border-gray-300 text-white light:text-gray-900 placeholder-gray-400 light:placeholder-gray-500 outline-none focus:ring-2 focus:ring-[#00d4aa] focus:border-transparent transition-colors">
        @error('address')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
    <label class="text-gray-300 light:text-gray-700 block mb-1 transition-colors">Upload Valid ID</label>
    <input wire:model="verification_photo"
           type="file"
           id="verification_photo"
           accept="image/*"
           multiple
           onchange="if(this.files.length > 2){ alert('You can upload only 2 files'); this.value=''; }"
           class="w-full mt-1 p-2 rounded-lg bg-white/5 light:bg-transparent border border-white/20 light:border-gray-300 text-white light:text-gray-900 outline-none transition-colors
                  file:bg-[#31A871] file:text-white file:rounded-lg 
                  file:px-3 file:py-1 file:border-none cursor-pointer focus:ring-2 focus:ring-[#00d4aa] focus:border-transparent">
    <p class="text-gray-400 light:text-gray-500 text-xs mt-1 transition-colors">You can upload 1 or 2 photos</p>

    <!-- Preview Section -->
    @if($verification_photo)
        <div class="mt-2 flex flex-wrap gap-2">
            @foreach($verification_photo as $photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="h-20 w-20 object-cover rounded-lg border border-[#2a2d3a]">
            @endforeach
        </div>
    @endif

    <div wire:loading wire:target="verification_photo" class="text-[#00d4aa] text-xs mt-1">
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
          class="border border-[#2a2d3a] light:border-gray-300 px-5 py-2 rounded-lg text-white light:text-gray-800 hover:bg-[#252836] light:hover:bg-gray-100 transition">
          Cancel
        </button>
      </div>
    </div>

  </div>
</div>