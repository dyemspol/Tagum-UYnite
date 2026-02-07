<!-- MODAL BACKDROP -->
<div
  id="issueModal"
  class="fixed inset-0 bg-black/60 flex items-center justify-center z-50"
>
  <!-- MODAL CONTAINER -->
  <div class="bg-[#1f3b56] w-[430px] rounded-xl shadow-xl p-6 relative">

    <!-- HEADER -->
    <h2
      class="text-xl font-semibold text-white mb-4 border-b border-white/20 pb-2"
    >
      Issue Details
    </h2>

    <!-- CONTENT -->
    <div class="text-white space-y-3 text-sm">

      <div>
        <p class="text-gray-300">Issue ID</p>
        <p>#1023</p>
      </div>

      <div>
        <p class="text-gray-300">Issue Name</p>
        <p>Saba ang karaoke</p>
      </div>

      <div class="flex gap-10">
        <div>
          <p class="text-gray-300">Reported by</p>
          <p>Khristan divv</p>
        </div>
        <div>
          <p class="text-gray-300">Date</p>
          <p>Oct 24, 2025</p>
        </div>
      </div>

      <div>
        <p class="text-gray-300">Status</p>
        <span class="text-red-500 font-semibold">Critical</span>
      </div>

      <div>
        <p class="text-gray-300">Description</p>
        <p>
          Saba kaayo ang karaoke sa silingan bisag lawom na ang gabi.
          Dili na mi katulog.
        </p>
      </div>

      <div>
        <p class="text-gray-300">Location</p>
        <p>Purok Cafe, Tagum City, Davao del Norte, Philippines</p>
      </div>

      <!-- GLIDE CAROUSEL -->
      <div
        class="glide max-w-full h-[200px] mx-auto relative overflow-hidden rounded-xl mt-3 mb-6"
      >
        <!-- Slides -->
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <img
                src="https://images.unsplash.com/photo-1506744038136-46273834b3fb"
                class="w-full h-full object-cover"
              />
            </li>
            <li class="glide__slide">
              <img
                src="https://images.unsplash.com/photo-1491553895911-0055eca6402d"
                class="w-full h-full object-cover"
              />
            </li>
            <li class="glide__slide">
              <img
                src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e"
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
        Respond
      </button>
      <button
        onclick="document.getElementById('issueModal').style.display = 'none'"
        class="border border-white/30 px-5 py-2 rounded-lg text-white"
      >
        Cancel
      </button>
    </div>

  </div>
</div>
