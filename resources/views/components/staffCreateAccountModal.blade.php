<!-- MODAL BACKDROP -->
<div
  id="createStaffAccountModal"
  class="fixed hidden inset-0 bg-black/60  items-center justify-center z-50"
>
  <!-- MODAL CONTAINER -->
  <div class="bg-[#1f3b56] w-[450px] rounded-xl shadow-xl p-6 relative">

    <!-- HEADER -->
    <h2 class="text-xl font-semibold text-white mb-4 border-b border-white/20 pb-2">
      Create Staff Account
    </h2>

    <!-- FORM CONTENT -->
    <div class="space-y-4 text-sm">

     
      <div>
        <label class="text-gray-300">Full Name</label>
        <input type="text"
          class="w-full mt-1 p-2 rounded-lg bg-[#244c72] text-white outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="Enter full name">
      </div>

      
      <div>
        <label class="text-gray-300">Email</label>
        <input type="email"
          class="w-full mt-1 p-2 rounded-lg bg-[#244c72] text-white outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="Enter email">
      </div>

      
      <div>
        <label class="text-gray-300">Department</label>
        <select
          class="w-full mt-1 p-2 rounded-lg bg-[#244c72] text-white outline-none focus:ring-2 focus:ring-blue-400">
          <option>Select Department</option>
          <option>Health Department</option>
          <option>IT Department</option>
          <option>Engineering</option>
          <option>HR Department</option>
        </select>
      </div>

    
      <div>
        <label class="text-gray-300">Password</label>
        <input type="password"
          class="w-full mt-1 p-2 rounded-lg bg-[#244c72] text-white outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="Enter password">
      </div>

      
     

    </div>

  
    <div class="flex justify-end gap-3 mt-6">
      <button
        class="bg-blue-500 hover:bg-blue-600 px-5 py-2 rounded-lg text-white">
        Create
      </button>
      <button
        onclick="document.getElementById('createStaffAccountModal').style.display='none'"
        class="border border-white/30 px-5 py-2 rounded-lg text-white">
        Cancel
      </button>
    </div>

  </div>
</div>