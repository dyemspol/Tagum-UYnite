<div id="createPostModal" wire:ignore.self
        class="hidden fixed inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm justify-center items-center">

        <div class="relative overflow-y-scroll bg-linear-to-b from-[#1F486C] to-[#0F1F2C] w-[90%] max-w-[29em] rounded-xl px-5 py-5 ">

            <div class="my-2 flex justify-between items-center">
                <div>
                    <h2 class="text-white text-lg font-medium">Create Post</h2>
                    <p class="text-xs text-white font-light opacity-70">Submit a problem in your community</p>
                </div>

                <div id="createPostModalX"
                    class="h-6 w-6 flex justify-center items-center rounded-full bg-[#31A871] cursor-pointer text-white">
                    x
                </div>
            </div>

            <!-- LOADING OVERLAY -->
            <div wire:loading wire:target="submit" 
                 class="absolute inset-0 bg-black/80 backdrop-blur-sm z-50 flex flex-col justify-center items-center rounded-xl transition-all duration-300">
                <svg class="animate-spin -ml-1 mr-3 h-10 w-10 text-[#31A871]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="text-white mt-4 font-medium animate-pulse">Posting to your community...</p>
            </div>

            <form wire:submit.prevent="submit" class="space-y-3 mt-5">

                <div>
                    <label class="text-white text-sm">Title</label>
                    <input wire:model="title" required
                        class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm"
                        type="text" placeholder="Ex: Potholes on Main Street">
                    @error('title')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-white text-sm">Description</label>
                    <input wire:model="description" required
                        class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm"
                        type="text" placeholder="Ex: There are several potholes on Main Street that need to be fixed.">
                    @error('description')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <select wire:model="department_id" required
                        class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm">
                    <option value="" disabled>Select Category</option>
                    @foreach(($departments ?? []) as $department)
                        <option value="{{ $department->id }}" class="text-black">
                            {{ $department->category }}
                        </option>
                    @endforeach
                    @error('department_id')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </select>

                <select wire:model="barangay_id" required
                        class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm">
                    <option value="" disabled>Select Barangay</option>
                    @foreach(($barangays ?? []) as $barangay)
                        <option value="{{ $barangay->id }}" class="text-black">
                            {{ $barangay->barangay_name }}
                        </option>
                    @endforeach
                    @error('barangay_id')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </select>
                <div class="flex flex-col gap-2">
                    <label class="text-white text-sm">Street Purok</label>
                    <input wire:model="Street_Purok" required
                        class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm"
                        type="text" placeholder="Ex: Purok 1, Street 1">
                    @error('Street_Purok')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white text-sm">Landmark</label>
                    <input wire:model="landmark" required
                        class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm"
                        type="text" placeholder="Ex: Near the school">
                    @error('landmark')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex flex-col gap-2 my-3">
                    <div class="flex justify-between items-center">
                        <label class="text-white text-sm">Upload Images or Video</label>
                        <button id="previewMediaBtn" type="button" class="text-white text-xs bg-green-700 rounded-md py-1 px-2">
                            Preview
                        </button>
                    </div>

                    <input id="createPostMedia" type="file" accept="image/*,video/*" multiple class="hidden" wire:model="media">
                    @error('media')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <label for="createPostMedia" class="border border-dashed border-[#5e7186] text-[#97a7b5] rounded-md w-full h-10 flex items-center justify-center cursor-pointer hover:border-[#31A871] hover:text-white transition-colors">
                        Click to Upload
                    </label>

                    <div id="mediaPreviewGrid" wire:ignore class="hidden gap-2 pt-1">
                        <!-- thumbnails injected via JS -->
                    </div>
                </div>



                <!-- MAP -->
                <div class="mt-3">
                    <p class="text-white text-sm mb-2">Pin Location</p>
                    <div wire:ignore>
                        <div id="createPostMap" class="w-full h-45 rounded-md"></div>
                    </div>
                    @error('latitude') <span class="text-red-400 text-xs block mt-1">Please select a location on the map.</span> @enderror
                    @error('longitude') <span class="text-red-400 text-xs block mt-1">Longitude is missing.</span> @enderror
                </div>
                @if($showError)
                    <p class="text-red-400 text-xs mt-1">Please fill in all required fields correctly.</p>
                @endif
                <button
                    class="w-full bg-[#31A871] text-white py-2 rounded-sm mt-3">
                    Submit
                </button>

            </form>
        </div>
    </div>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mediaInput = document.getElementById('createPostMedia');
            const mediaPreviewGrid = document.getElementById('mediaPreviewGrid');
            const previewMediaBtn = document.getElementById('previewMediaBtn');
        
            const modal = document.getElementById('createPostModal');
            const postCardModal = document.getElementById('postCardModal');
            const openBtn = document.getElementById('createPostBtnMobile');
            const modalClose = document.getElementById('createPostModalX');
            const titleInput = document.querySelector('input[wire\\:model="title"]');
            const descriptionInput = document.querySelector('input[wire\\:model="description"]');
            const deptSelect = document.querySelector('select[wire\\:model="department_id"]');
            const barangaySelect = document.querySelector('select[wire\\:model="barangay_id"]');
            const streetInput = document.querySelector('input[wire\\:model="Street_Purok"]');
            const landmarkInput = document.querySelector('input[wire\\:model="landmark"]');
            // Media preview (small grid)
            const renderMediaGrid = (files) => {
                if (!mediaPreviewGrid || !files || files.length === 0) {
                    if (mediaPreviewGrid) {
                        mediaPreviewGrid.classList.add('hidden');
                        mediaPreviewGrid.classList.remove('grid', 'grid-cols-4');
                    }
                    return;
                }
        
                mediaPreviewGrid.innerHTML = '';
                Array.from(files).forEach((file) => {
                    const isVideo = file.type.startsWith('video/');
                    const thumb = document.createElement('div');
                    thumb.className = 'w-14 h-14 rounded-md overflow-hidden border border-[#2e4257] bg-[#0f1f2c] flex items-center justify-center';
                    if (isVideo) {
                        thumb.innerHTML = `
                            <div class="w-full h-full flex items-center justify-center bg-[#0f1f2c] text-white text-xs">VID</div>
                        `;
                    } else {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.className = 'w-full h-full object-cover';
                        thumb.appendChild(img);
                    }
                    mediaPreviewGrid.appendChild(thumb);
                });
                mediaPreviewGrid.classList.remove('hidden');
                mediaPreviewGrid.classList.add('grid', 'grid-cols-6');
            };
        
            if (mediaInput) {
                mediaInput.addEventListener('change', (e) => {
                    const files = e.target.files;
                    window.uploadedFilesForPreview = Array.from(files || []);
                    renderMediaGrid(files);
        
                    // also update big preview when ready
                    window.dispatchEvent(new CustomEvent('updatePostPreview', { detail: { files: window.uploadedFilesForPreview } }));
                });
            }
        // adfsafsa
            let map, marker;
        

        
            // Close Modal
            if (modalClose) {
                modalClose.addEventListener('click', () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
        
                    Livewire.dispatch('resetCreatePostModal');
                });
            }
        
            // Initialize Map
            window.addEventListener('openCreatePostModal', () => {
        
                if (!map) {
                    map = L.map('createPostMap').setView([7.4478,125.8094], 13);
        
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19
                    }).addTo(map);
        
                    marker = L.marker([7.4478,125.8094], { draggable:true }).addTo(map);
        
                    marker.on('dragend', function(e) {
                        const lat = e.target.getLatLng().lat;
                        const lng = e.target.getLatLng().lng;
                        Livewire.dispatch('setLatLng', [lat, lng]);
                    });
        
                } else {
                    setTimeout(() => {
                        map.invalidateSize();
                    }, 300);
                }
            });

            // Open media preview modal with current form data (vanilla JS)
            if (previewMediaBtn) {
                previewMediaBtn.addEventListener('click', () => {
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
                });
            }
        
        });


        </script>
        @endpush