<div id="createPostModal" wire:ignore.self
    class="hidden fixed inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm justify-center items-center">

    <div
        class="relative hide-scrollbar overflow-y-auto bg-linear-to-b from-[#1F486C] to-[#0F1F2C] light:from-white light:to-[#f8fafc] w-[95%] max-w-5xl rounded-2xl p-6 md:p-8 shadow-2xl transition-colors">

        <div class="mb-8 flex justify-between items-center border-b border-white/10 light:border-gray-200 pb-4 transition-colors">
            <div>
                <h2 class="text-white light:text-gray-900 text-2xl font-bold tracking-tight transition-colors">Create Post</h2>
                <p class="text-xs text-white/70 light:text-gray-500 font-medium mt-1 transition-colors">Submit a precise report to your community authorities</p>
            </div>

            <div id="createPostModalX"
                class="h-8 w-8 flex justify-center items-center rounded-full bg-white/10 hover:bg-red-500 light:bg-gray-100 light:hover:bg-red-100 cursor-pointer text-white light:text-gray-600 light:hover:text-red-600 transition-all">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>


        <div wire:loading wire:target="submit"
            class="fixed inset-0 z-[9999] bg-black/80 backdrop-blur-sm flex items-center justify-center rounded-2xl">
            <div class="flex flex-col items-center justify-center h-full w-full">
                <!-- Spinner -->
                <svg class="animate-spin h-10 w-10 text-[#31A871]" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>

                <p class="text-white light:text-gray-900 mt-4 text-sm font-medium animate-pulse text-center">
                    Submitting your report...
                </p>
            </div>
        </div>

        <form wire:submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- LEFT COLUMN: Form Details -->
            <div class="space-y-5">

                <div>
                    <label class="block text-white/70 light:text-gray-600 text-xs font-bold uppercase tracking-widest mb-1.5 transition-colors">Title</label>
                    <input wire:model="title" required
                        class="bg-black/20 light:bg-white border border-white/10 light:border-gray-200 focus:border-[#31A871] light:focus:border-[#31A871] outline-none rounded-lg w-full text-white light:text-gray-900 placeholder-white/30 light:placeholder-gray-400 py-2.5 px-3 text-sm transition-all shadow-inner light:shadow-sm"
                        type="text" placeholder="E.g., Deep potholes on main road">
                    @error('title')
                    <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-white/70 light:text-gray-600 text-xs font-bold uppercase tracking-widest mb-1.5 transition-colors">Description</label>
                    <input wire:model="description" required
                        class="bg-black/20 light:bg-white border border-white/10 light:border-gray-200 focus:border-[#31A871] light:focus:border-[#31A871] outline-none rounded-lg w-full text-white light:text-gray-900 placeholder-white/30 light:placeholder-gray-400 py-2.5 px-3 text-sm transition-all shadow-inner light:shadow-sm"
                        type="text" placeholder="Provide clear details about the issue...">
                    @error('description')
                    <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-white/70 light:text-gray-600 text-xs font-bold uppercase tracking-widest mb-1.5 transition-colors">Category</label>
                        <select wire:model="department_id" required
                            class="bg-black/20 light:bg-white border border-white/10 light:border-gray-200 focus:border-[#31A871] light:focus:border-[#31A871] outline-none rounded-lg w-full text-white light:text-gray-900 py-2.5 px-3 text-sm transition-all appearance-none shadow-inner light:shadow-sm">
                            <option value="" disabled>Select Type</option>
                            @foreach ($departments ?? [] as $department)
                            <option value="{{ $department->id }}" class="text-white">
                                {{ $department->category }}
                            </option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-white/70 light:text-gray-600 text-xs font-bold uppercase tracking-widest mb-1.5 transition-colors">Barangay</label>
                        <select wire:model="barangay_id" required
                            class="bg-black/20 light:bg-white border border-white/10 light:border-gray-200 focus:border-[#31A871] light:focus:border-[#31A871] outline-none rounded-lg w-full text-white light:text-gray-900 py-2.5 px-3 text-sm transition-all appearance-none shadow-inner light:shadow-sm">
                            <option value="" disabled>Select Location</option>
                            @foreach ($barangays ?? [] as $barangay)
                            <option value="{{ $barangay->id }}" class="text-white">
                                {{ $barangay->barangay_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('barangay_id')
                        <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-white/70 light:text-gray-600 text-xs font-bold uppercase tracking-widest mb-1.5 transition-colors">Street / Purok</label>
                        <input wire:model="Street_Purok" required
                            class="bg-black/20 light:bg-white border border-white/10 light:border-gray-200 focus:border-[#31A871] light:focus:border-[#31A871] outline-none rounded-lg w-full text-white light:text-gray-900 placeholder-white/30 light:placeholder-gray-400 py-2.5 px-3 text-sm transition-all shadow-inner light:shadow-sm"
                            type="text" placeholder="E.g., Purok 1">
                        @error('Street_Purok')
                        <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-white/70 light:text-gray-600 text-xs font-bold uppercase tracking-widest mb-1.5 transition-colors">Landmark</label>
                        <input wire:model="landmark" required
                            class="bg-black/20 light:bg-white border border-white/10 light:border-gray-200 focus:border-[#31A871] light:focus:border-[#31A871] outline-none rounded-lg w-full text-white light:text-gray-900 placeholder-white/30 light:placeholder-gray-400 py-2.5 px-3 text-sm transition-all shadow-inner light:shadow-sm"
                            type="text" placeholder="E.g., Near plaza">
                        @error('landmark')
                        <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-white/70 light:text-gray-600 text-xs font-bold uppercase tracking-widest mb-1.5 transition-colors">Proof (Images/Video)</label>
                    <input id="createPostMedia" type="file" accept="image/*,video/*" multiple class="hidden" wire:model="media">
                    
                    <label for="createPostMedia"
                        class="border-2 border-dashed border-white/20 light:border-gray-300 rounded-xl w-full h-24 flex flex-col items-center justify-center cursor-pointer hover:border-[#31A871] light:hover:border-[#31A871] hover:bg-[#31A871]/5 transition-all text-white/50 light:text-gray-500 hover:text-[#31A871] group">
                        <i class="hgi hgi-stroke hgi-image-add-01 mb-1 text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs font-semibold">Click to upload media files</span>
                    </label>

                    <!-- Preview Section -->
                    @if($media)
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach($media as $item)
                                @if(str_starts_with($item->getMimeType(), 'video/'))
                                    <div class="h-16 w-16 bg-black/40 light:bg-gray-200 border border-white/10 light:border-gray-300 rounded-lg flex items-center justify-center text-white/70 light:text-gray-500 text-[10px] font-bold shadow-sm">
                                        VIDEO
                                    </div>
                                @else
                                    <img src="{{ $item->temporaryUrl() }}" alt="Preview" class="h-16 w-16 object-cover rounded-lg border border-white/10 light:border-gray-300 shadow-sm">
                                @endif
                            @endforeach
                        </div>
                    @endif

                    <div wire:loading wire:target="media" class="text-[#31A871] text-xs mt-2 font-medium">
                        Uploading files...
                    </div>
                    @error('media')
                    <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- RIGHT COLUMN: Map and Submit -->
            <div class="flex flex-col h-full bg-black/10 light:bg-gray-50 rounded-xl p-2 border border-white/5 light:border-gray-200 transition-colors">
                <div class="flex flex-col h-full">
                    <div class="flex justify-between items-center px-1 mb-2">
                        <label class="block text-white/70 light:text-gray-600 text-xs font-bold uppercase tracking-widest transition-colors"><i class="hgi hgi-stroke hgi-location-01 mr-1"></i>Pin Precise Location</label>
                    </div>
                    
                    <div wire:ignore class="grow w-full relative group">
                        <div id="createPostMap" class="absolute inset-0 w-full h-full rounded-lg border border-white/10 light:border-gray-300 shadow-inner overflow-hidden z-10 transition-colors"></div>
                    </div>
                    
                    @error('latitude')
                    <span class="text-red-400 text-xs mt-2 font-medium px-1 block">Please drag the pin on the map.</span>
                    @enderror
                    @error('longitude')
                    <span class="text-red-400 text-xs mt-1 font-medium px-1 block">Longitude is missing.</span>
                    @enderror

                    @if ($showError)
                    <p class="text-red-400 text-xs mt-3 font-medium px-1 text-center bg-red-400/10 py-2 rounded-lg">Please fill in all required fields correctly.</p>
                    @endif

                    <button type="submit" class="w-full bg-[#31A871] hover:bg-[#2b9664] text-white font-bold tracking-wide py-3.5 rounded-lg mt-4 shadow-lg hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all">
                        Submit Report
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@push('scripts')
<script>
    // Use window properties to persist map instance across Livewire updates
    // and avoid "Identifier has already been declared" errors if script is re-executed.
    window.createPostMapInstance = window.createPostMapInstance || null;
    window.createPostMarkerInstance = window.createPostMarkerInstance || null;

    function initCreatePostModal() {
        const mediaInput = document.getElementById('createPostMedia');
        const previewMediaBtn = document.getElementById('previewMediaBtn');

        const modal = document.getElementById('createPostModal');
        const modalClose = document.getElementById('createPostModalX');
        const titleInput = document.querySelector('input[wire\\:model="title"]');
        const descriptionInput = document.querySelector('input[wire\\:model="description"]');
        const deptSelect = document.querySelector('select[wire\\:model="department_id"]');
        const barangaySelect = document.querySelector('select[wire\\:model="barangay_id"]');
        const streetInput = document.querySelector('input[wire\\:model="Street_Purok"]');
        const landmarkInput = document.querySelector('input[wire\\:model="landmark"]');

        if (mediaInput) {
            mediaInput.onchange = (e) => {
                const files = e.target.files;
                window.uploadedFilesForPreview = Array.from(files || []);
                window.dispatchEvent(new CustomEvent('updatePostPreview', {
                    detail: {
                        files: window.uploadedFilesForPreview
                    }
                }));
            };
        }

        // Close Modal
        if (modalClose) {
            // Use onclick property to avoid duplicate listeners on re-init
            modalClose.onclick = () => {
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
                Livewire.dispatch('resetCreatePostModal');
            };
        }

        // Open media preview modal with current form data (vanilla JS)
        if (previewMediaBtn) {
            previewMediaBtn.onclick = () => {
                const departmentText = deptSelect?.options[deptSelect.selectedIndex]?.textContent?.trim();
                const barangayText = barangaySelect?.options[barangaySelect.selectedIndex]?.textContent?.trim();
                window.dispatchEvent(new CustomEvent('openPostCardPreview', {
                    detail: {
                        title: titleInput?.value || '',
                        description: descriptionInput?.value || '',
                        department: deptSelect?.value ? departmentText : '',
                        barangay: barangaySelect?.value ? barangayText : '',
                        street: streetInput?.value || '',
                        landmark: landmarkInput?.value || '',
                        files: window.uploadedFilesForPreview || []
                    }
                }));

                // Hide create post modal while the preview is shown
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            };
        }
    }

    // Initialize Map Handler
    // We define this ONCE on window, but inside it we check for the *current* map element.
    // If the map element is missing (navigated away), we do nothing.
    // If the map element exists but instance is null or on old element, we create new.

    window.createPostMapHandler = () => {
        const mapDiv = document.getElementById('createPostMap');
        if (!mapDiv) return;

        const tagumBounds = [
            [7.3500, 125.7000], // South-West
            [7.5500, 125.9500] // North-East
        ];
        // If map instance exists but container is different, reset.
        if (window.createPostMapInstance && window.createPostMapInstance.getContainer() !== mapDiv) {
            window.createPostMapInstance.remove();
            window.createPostMapInstance = null;
        }

        if (!window.createPostMapInstance) {
            window.createPostMapInstance = L.map(mapDiv).setView([7.4478, 125.8094], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(window.createPostMapInstance);

            window.createPostMarkerInstance = L.marker([7.4478, 125.8094], {
                draggable: true
            }).addTo(window.createPostMapInstance);

            window.createPostMarkerInstance.on('drag', function(e) {
                const marker = e.target;
                const latlng = marker.getLatLng();

                // The "Fence" coordinates
                const minLat = 7.3500;
                const maxLat = 7.5500;
                const minLng = 125.7000;
                const maxLng = 125.9500;

                // Clamp logic: If the pin hits the edge, force it to stay on the line
                const clampedLat = Math.max(minLat, Math.min(maxLat, latlng.lat));
                const clampedLng = Math.max(minLng, Math.min(maxLng, latlng.lng));

                marker.setLatLng([clampedLat, clampedLng]);
            });

            // Send the final position to Livewire ONLY when they let go (performance)
            window.createPostMarkerInstance.on('dragend', function(e) {
                const latlng = e.target.getLatLng();
                Livewire.dispatch('setLatLng', [latlng.lat, latlng.lng]);
            });
        } else {
            setTimeout(() => {
                window.createPostMapInstance.invalidateSize();
            }, 300);
        }
    };

    // Attach the window event listener only once if possible.
    // To be safe against multiple attachments (if script re-runs), we remove first.
    window.removeEventListener('openCreatePostModal', window.createPostMapHandler);
    window.addEventListener('openCreatePostModal', window.createPostMapHandler);

    document.addEventListener('DOMContentLoaded', initCreatePostModal);
    document.addEventListener('livewire:navigated', initCreatePostModal);
</script>
@endpush