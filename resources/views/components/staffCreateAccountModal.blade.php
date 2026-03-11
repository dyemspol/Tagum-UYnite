<div
  x-show="showCreateModal"
  x-cloak
  class="fixed inset-0 bg-black/60 flex items-center justify-center z-[9999]"
  style="display: none;">
  <!-- MODAL CONTAINER -->
  <div class="bg-[#1a1d29] light:bg-white w-[450px] rounded-xl shadow-xl p-6 relative border border-[#2a2d3a] light:border-gray-200 transition-colors">

    <!-- HEADER -->
    <h2 class="text-xl font-semibold text-white light:text-gray-900 mb-4 border-b border-[#2a2d3a] light:border-gray-200 pb-2 transition-colors">
      Create Staff Account
    </h2>

    <!-- FORM CONTENT -->
    <div class="space-y-4 text-sm">


      <div>
        <label class="text-gray-300 light:text-gray-700 transition-colors">First Name</label>
        <input type="text" wire:model="first_name"
          class="w-full mt-1 p-2 rounded-lg bg-[#252836] light:bg-gray-50 text-white light:text-gray-900 outline-none focus:ring-2 focus:ring-[#00d4aa] border border-[#2a2d3a] light:border-gray-300 transition-colors"
          placeholder="Enter first name">
      </div>

      <div>
        <label class="text-gray-300 light:text-gray-700 transition-colors">Last Name</label>
        <input type="text" wire:model="last_name"
          class="w-full mt-1 p-2 rounded-lg bg-[#252836] light:bg-gray-50 text-white light:text-gray-900 outline-none focus:ring-2 focus:ring-[#00d4aa] border border-[#2a2d3a] light:border-gray-300 transition-colors"
          placeholder="Enter last name">
      </div>


      <div>
        <label class="text-gray-300 light:text-gray-700 transition-colors">Username</label>
        <input type="text" wire:model.live="username"
          class="w-full mt-1 p-2 rounded-lg bg-[#252836] light:bg-gray-50 text-white light:text-gray-900 outline-none focus:ring-2 focus:ring-[#00d4aa] border border-[#2a2d3a] light:border-gray-300 transition-colors"
          placeholder="Enter username">
      </div>


      <div>
        <label class="text-gray-300 light:text-gray-700 transition-colors">Department</label>
        <select wire:model.live="department_id" class="w-full mt-1 p-2 rounded-lg bg-[#252836] light:bg-gray-50 text-white light:text-gray-900 outline-none focus:ring-2 focus:ring-[#00d4aa] border border-[#2a2d3a] light:border-gray-300 transition-colors">
          <option value="">Select Department</option>
          @foreach($departments as $department)
          <option value="{{ $department->id }}">{{ $department->department_name }}</option>
          @endforeach
        </select>
      </div>


      <div>
        <label class="text-gray-300 light:text-gray-700 transition-colors"> Generate Password</label>
        <input wire:model="password" readonly
          class="w-full mt-1 p-2 rounded-lg bg-[#252836] light:bg-gray-50 text-white light:text-gray-900 outline-none focus:ring-2 focus:ring-[#00d4aa] border border-[#2a2d3a] light:border-gray-300 transition-colors"
          placeholder="Enter password">
      </div>




    </div>


    <div class="flex justify-end gap-3 mt-6">
      <button type="button"
        wire:click="submit"
        wire:loading.attr="disabled"
        class="bg-[#31A871] hover:bg-green-600 px-5 py-2 rounded-lg text-white disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
        <span wire:loading.remove wire:target="submit">Create</span>
        <span wire:loading wire:target="submit">Processing...</span>
        <div wire:loading wire:target="submit" class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"></div>
      </button>
      <button
        @click="showCreateModal = false"
        class="border border-[#2a2d3a] light:border-gray-300 px-5 py-2 rounded-lg text-white light:text-gray-800 hover:bg-[#252836] light:hover:bg-gray-100 transition-colors">
        Cancel
      </button>
    </div>

  </div>
</div>