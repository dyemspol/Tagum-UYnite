<!-- MODAL BACKDROP -->

<div
  id="viewIssueModal"
  class="fixed inset-0 bg-black/60 items-center justify-center z-50 {{ $selectedReport ? 'flex' : 'hidden' }}">
  @if($selectedReport)

  <!-- MODAL CONTAINER -->
  <div class="bg-[#1a1d29] w-full max-w-md rounded-xl shadow-xl p-6 relative border border-[#2a2d3a]"
       x-data
       x-init="$nextTick(() => {
    new Swiper('.mySwiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
})">
    <!-- HEADER -->
    <h2 class="text-lg text-white mb-5 border-b border-[#2a2d3a] pb-2">
      Issue Details
    </h2>

    <!-- CONTENT -->
    <div class="text-white space-y-4 text-sm">

      <div>
        <p class="text-gray-300 text-xs">Issue ID</p>
        <p class="text-[#00d4aa]">#{{ $selectedReport->report_id}}</p>
      </div>

      <div>
        <p class="text-gray-300 text-xs">Issue Name</p>
        <p class="text-gray-100">{{ $selectedReport->title }}</p>
      </div>

      <div class="flex justify-between">
        <div>
          <p class="text-gray-300 text-xs">Reported by</p>
          <p class="text-gray-100">{{ $selectedReport->user->first_name }} {{ $selectedReport->user->last_name }}</p>
        </div>
        <div>
          <p class="text-gray-300 text-xs">Date</p>
          <p class="text-gray-100">{{ $selectedReport->created_at->format('d/m/Y') }}</p>
        </div>
      </div>

      <div>
        <p class="text-gray-300 text-xs">Status</p>
        <span class="text-red-500">{{ ucfirst($selectedReport->report_status) }}</span>
      </div>

      <div>
        <p class="text-gray-300 text-xs">Description</p>
        <p class="text-gray-100">
          {{ $selectedReport->content }}
        </p>
      </div>

      <div>
        <p class="text-gray-300 text-xs">Location</p>
        <p class="text-gray-100">{{ $selectedReport->street_purok }}, {{ $selectedReport->barangay?->barangay_name ?? 'N/A' }}</p>
      </div>

      <!-- SWIPER CAROUSEL -->
      <div class="swiper mySwiper h-48 rounded-xl mt-4">
        <div class="swiper-wrapper">
          @foreach($selectedReport->postImages as $image)
          <div class="swiper-slide">
            <img src="{{ $image->cdn_url }}"
              class="w-full h-full object-cover rounded-xl" />
          </div>
          @endforeach

        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation Buttons -->

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>

    <!-- FOOTER BUTTONS -->
    <div class="flex justify-end gap-3 mt-6">
      <button wire:click="resolved({{ $selectedReport->id }})" class="bg-[#00d4aa] hover:bg-[#00e6b8] px-4 py-2 rounded-lg text-[#0f1117] font-semibold ">
        Respond
      </button>
      <button wire:click="takedown({{ $selectedReport->id }})" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white">
        Take Down
      </button>
      <button wire:click="closeIssue"
        class="border border-[#2a2d3a] px-4 py-2 rounded-lg text-white hover:bg-[#252836]">
        Cancel
      </button>
    </div>

  </div>
  @endif
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>