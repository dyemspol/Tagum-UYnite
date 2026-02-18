<!-- MODAL BACKDROP -->
<div
  id="verifyUserAccountModal"
  class="fixed hidden inset-0 bg-black/60 items-center justify-center z-50"
>
  <!-- MODAL CONTAINER -->
  <div class="bg-[#1f3b56] w-[450px] rounded-xl shadow-xl p-6 relative">

    <!-- HEADER -->
    <h2 class="text-xl font-semibold text-white mb-4 border-b border-white/20 pb-2">
      Verify Your Account
    </h2>

    <!-- FORM CONTENT -->
    <div class="space-y-4 text-sm">

      <!-- Birthday -->
      <div>
        <label class="text-gray-300">Birthday</label>
        <input 
          type="date"
          class="w-full mt-1 p-2 rounded-lg bg-[#244c72] text-white outline-none focus:ring-2 focus:ring-blue-400"
        >
      </div>

     
      <div>
        <label class="text-gray-300">Barangay Address</label>
        <input 
          type="text"
          placeholder="Enter barangay address"
          class="w-full mt-1 p-2 rounded-lg bg-[#244c72] text-white outline-none focus:ring-2 focus:ring-blue-400"
        >
      </div>

     
      <div>
        <label class="text-gray-300">Upload Valid ID</label>
        <input 
          type="file"
          accept="image/*"
          required
          class="w-full mt-1 p-2 rounded-lg bg-[#244c72] text-white outline-none 
                 file:bg-[#31A871] file:text-white file:rounded-lg 
                 file:px-3 file:py-1 file:border-none cursor-pointer"
        >
      </div>

    </div>

    <!-- ACTION BUTTONS -->
    <div class="flex justify-end gap-3 mt-6">
      <button
        class="bg-[#31A871] hover:bg-green-600 px-5 py-2 rounded-lg text-white">
        Verify
      </button>
      <button
        onclick="document.getElementById('verifyUserAccountModal').style.display='none'"
        class="border border-white/30 px-5 py-2 rounded-lg text-white">
        Cancel
      </button>
    </div>

  </div>
</div>
