<!-- MODAL BACKDROP -->
<div x-show="showIssueModal" x-cloak
     class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
     style="display: none;">
  <!-- MODAL CONTAINER -->
  <div class="bg-[#1f3b56] w-full max-w-md rounded-xl shadow-xl p-6 relative">

    <!-- HEADER -->
    <h2 class="text-lg text-white mb-5 border-b border-white/20 pb-2">
      Issue Details
    </h2>

    <!-- CONTENT -->
    <div class="text-white space-y-4 text-sm">

      <div>
        <p class="text-gray-300 text-xs">Issue ID</p>
        <p class="text-gray-100">#1023</p>
      </div>

      <div>
        <p class="text-gray-300 text-xs">Issue Name</p>
        <p class="text-gray-100">Saba ang karaoke</p>
      </div>

      <div class="flex justify-between">
        <div>
          <p class="text-gray-300 text-xs">Reported by</p>
          <p class="text-gray-100">Khristan divv</p>
        </div>
        <div>
          <p class="text-gray-300 text-xs">Date</p>
          <p class="text-gray-100">Oct 24, 2025</p>
        </div>
      </div>

      <div>
        <p class="text-gray-300 text-xs">Status</p>
        <span class="text-red-500">Critical</span>
      </div>

      <div>
        <p class="text-gray-300 text-xs">Description</p>
        <p class="text-gray-100">
          Saba kaayo ang karaoke sa silingan bisag lawom na ang gabi.
          Dili na mi katulog.
        </p>
      </div>

      <div>
        <p class="text-gray-300 text-xs">Location</p>
        <p class="text-gray-100">Purok Cafe, Tagum City, Davao del Norte, Philippines</p>
      </div>

      <!-- SWIPER CAROUSEL -->
      <div class="swiper mySwiper h-48 rounded-xl mt-4">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb"
                 class="w-full h-full object-cover rounded-xl"/>
          </div>
          <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1491553895911-0055eca6402d"
                 class="w-full h-full object-cover rounded-xl"/>
          </div>
          <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e"
                 class="w-full h-full object-cover rounded-xl"/>
          </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation Buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>

    <!-- FOOTER BUTTONS -->
    <!-- FOOTER BUTTONS -->
<div class="flex justify-end gap-3 mt-6">
  <button class="bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg text-white">
    Respond
  </button>
  <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white">
    Take Down
  </button>
  <button @click="showIssueModal = false"
          class="border border-white/30 px-4 py-2 rounded-lg text-white">
    Cancel
  </button>
</div>
  </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>