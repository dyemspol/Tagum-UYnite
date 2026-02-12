<!-- MODAL BACKDROP -->
<div
  id="userReviewAccountModal"
  class="fixed inset-0 bg-black/60  items-center justify-center z-50 hidden"
>
  <!-- MODAL CONTAINER -->
  <div class="bg-[#1f3b56] w-[430px] rounded-xl shadow-xl p-6 relative">

    <!-- HEADER -->
    <h2
      class="text-xl font-semibold text-white mb-4 border-b border-white/20 pb-2"
    >
      User Account Details
    </h2>

    <!-- CONTENT -->
    <div class="text-white space-y-3 text-sm">

      <div>
        <p class="text-gray-300">User ID</p>
        <p id="modalUserID">#USR-001</p>
      </div>

      <div>
        <p class="text-gray-300">Full Name</p>
        <p id="modalFullName">Carlos Reyes</p>
      </div>

      <div>
        <p class="text-gray-300">Email</p>
        <p id="modalEmail">carlos@email.com</p>
      </div>

      <div>
        <p class="text-gray-300">Location</p>
        <p id="modalLocation">Manila, Philippines</p>
      </div>

      <div>
        <p class="text-gray-300">Valid ID Type</p>
        <p id="modalIDType">Driver’s License</p>
      </div>

      <div>
        <p class="text-gray-300">Status</p>
        <span id="modalStatus" class="text-green-400 font-semibold">Active</span>
      </div>

      <!-- VALID ID IMAGE PREVIEW -->
      <div
        class="glide max-w-full h-[200px] mx-auto relative overflow-hidden rounded-xl mt-3 mb-6"
      >
        <!-- Slides -->
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides" id="modalIDImages">
            <!-- Example image slide -->
            <li class="glide__slide">
              <img
                src="https://static.vecteezy.com/system/resources/thumbnails/053/227/245/small/graphic-representation-of-a-driver-s-license-card-with-a-male-photo-personal-details-and-security-features-png.png"
                class="w-full h-full object-cover"
              />
            </li>
            <li class="glide__slide">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxm64LfuTMiUyXmmop4VMyJVNSfE5Qfi2G5w&s"
                class="w-full h-full object-cover"
              />
            </li>
          </ul>
        </div>

        <!-- Controls -->
        <div
          class="absolute inset-0 flex justify-between items-center px-4 pointer-events-none"
          data-glide-el="controls"
        >
          <button
            data-glide-dir="<"
            class="pointer-events-auto bg-black/50 text-white px-3 py-2 rounded-full hover:bg-black"
          >
            ←
          </button>
          <button
            data-glide-dir=">"
            class="pointer-events-auto bg-black/50 text-white px-3 py-2 rounded-full hover:bg-black"
          >
            →
          </button>
        </div>
      </div>

    </div>

    <!-- FOOTER BUTTONS -->
    <div class="flex justify-end gap-3 mt-6">
      <button
        class="bg-indigo-500 hover:bg-indigo-600 px-5 py-2 rounded-lg text-white"
      >
        Approve
      </button>
      <button
        onclick="document.getElementById('userModal').style.display = 'none'"
        class="border border-white/30 px-5 py-2 rounded-lg text-white"
      >
        Cancel
      </button>
    </div>

  </div>
</div>