
<div id="postCardModal"
     class="hidden fixed inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm justify-center items-center overflow-y-auto py-5">

    <div class="bg-[#182b3cd5] w-[85%] max-w-[50em] rounded-lg overflow-hidden my-5">
        <!-- Header -->
        <div class="flex items-center justify-between px-4 pt-4">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11">
                    <img class="w-full h-full rounded-full object-cover"
                         src="{{ asset('img/yaoyapo.jpg') }}" alt="">
                </div>
                <div>
                    <p class="font-normal text-sm text-white">James Paul Silayan</p>
                    <p class="font-light text-[#ffffffa4] text-xs">
                        <span id="previewDate">Preview</span>
                        <span>•</span>
                        <span id="previewBarangay">Barangay</span>
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <p id="previewStatus" class="text-sm bg-amber-400 rounded-2xl px-2 py-0.5 text-black">Preview</p>
                <button id="postCardModalX"
                        class="h-7 w-7 flex justify-center items-center rounded-full bg-[#31A871] cursor-pointer text-white">
                    x
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="px-4 pb-4 mt-3 space-y-4">
            <!-- Description -->
            <div class="px-3">
                <p id="previewDescription" class="text-xs font-light line-clamp-2 text-white pb-2">
                    "<span class="opacity-80">Preview description</span>"
                </p>
            </div>

            <!-- Single media -->
            <div id="previewMainImage" class="w-full max-h-[32rem] rounded-lg overflow-hidden bg-[#0f1f2c]">
                <img id="previewMainImg" src="" alt="Preview" class="w-full h-full object-cover">
                <video id="previewMainVideo" src="" controls class="w-full h-full object-cover hidden"></video>
            </div>

            <!-- Collage for multiple -->
            <div id="previewCollage" class="hidden grid gap-1 rounded-lg overflow-hidden bg-[#0f1f2c]">
                <!-- injected via JS -->
            </div>

            <!-- Vote / Comment Row -->
            <div class="my-2 pl-3 flex space-x-1 items-center">
                <div class="flex space-x-0.5 items-center bg-[#354a5c00] rounded-xl px-2 py-1 cursor-pointer hover:bg-[#354a5c] transition-all duration-150">
                    <svg class="w-6 h-6 text-[#31A871]" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z">
                        </path>
                    </svg><span class="text-white text-sm">5</span>
                </div>

                <div class="flex space-x-0.5 items-center bg-[#354a5c00] rounded-xl px-2 py-1 cursor-pointer hover:bg-[#354a5c] transition-all duration-150">
                    <svg class="w-6 h-6 text-[#31A871]" fill="none" stroke-width="1.5"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                    </svg><span class="text-white text-sm">5</span>
                </div>

                <div class="flex items-center space-x-1 text-[#31A871] hover:text-white transition-colors px-2 py-1 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 10h10M7 14h5m-9 3.5V6.8c0-1.01.82-1.8 1.84-1.8h12.32C18.18 5 19 5.79 19 6.8v8.4c0 1.01-.82 1.8-1.84 1.8H9.2L5.5 17.5Z"/>
                    </svg>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 pt-2 border-t border-[#ffffff1a]">
                <button id="cancelPreviewBtn"
                        class="flex-1 bg-transparent border border-[#ffffff97] text-white py-2 px-4 rounded-sm hover:bg-[#ffffff10] transition-colors">
                    Cancel
                </button>
                <button id="submitPreviewBtn"
                        class="flex-1 bg-[#31A871] text-white py-2 px-4 rounded-sm hover:bg-[#2a8f5f] transition-colors">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('postCardModal');
        const modalClose = document.getElementById('postCardModalX');
        const previewMainImg = document.getElementById('previewMainImg');
        const previewMainVideo = document.getElementById('previewMainVideo');
        const previewMainImage = document.getElementById('previewMainImage');
        const previewCollage = document.getElementById('previewCollage');
        const previewBarangay = document.getElementById('previewBarangay');
        const previewStatus = document.getElementById('previewStatus');
        const previewDate = document.getElementById('previewDate');
        const previewDescription = document.getElementById('previewDescription');

        // Close Modal
        if (modalClose) {
            modalClose.addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        }

        // Close modal when clicking outside
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        }

        // Function to update preview with uploaded images
        function updatePreview(files) {
            if (!files || files.length === 0) return;

            const firstFile = files[0];
            const isVideo = firstFile.type.startsWith('video/');
            const isSingle = files.length === 1;

            previewMainImage.classList.toggle('hidden', !isSingle);
            previewCollage.classList.toggle('hidden', isSingle);

            if (isSingle) {
                if (isVideo) {
                    previewMainVideo.src = URL.createObjectURL(firstFile);
                    previewMainVideo.classList.remove('hidden');
                    previewMainImg.classList.add('hidden');
                } else {
                    previewMainImg.src = URL.createObjectURL(firstFile);
                    previewMainImg.classList.remove('hidden');
                    previewMainVideo.classList.add('hidden');
                }
                previewCollage.innerHTML = '';
                return;
            }

            // Collage view
            previewMainVideo.classList.add('hidden');
            previewMainImg.classList.add('hidden');
            previewCollage.innerHTML = '';

            // Set dynamic columns based on count
            const cols = files.length === 4 ? 2 : Math.min(files.length, 4);
            previewCollage.classList.remove('grid-cols-1', 'grid-cols-2', 'grid-cols-3', 'grid-cols-4');
            previewCollage.classList.add(`grid-cols-${cols}`);

            const maxTiles = 5;
            files.slice(0, maxTiles).forEach((file, idx) => {
                const cell = document.createElement('div');
                cell.className = 'relative w-full h-36 md:h-48 bg-[#0f1f2c] overflow-hidden';

                if (file.type.startsWith('video/')) {
                    const vid = document.createElement('video');
                    vid.src = URL.createObjectURL(file);
                    vid.autoplay = true;
                    vid.loop = true;
                    vid.muted = true;
                    vid.playsInline = true;
                    vid.className = 'w-full h-full object-cover';
                    cell.appendChild(vid);
                } else {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.alt = `Media ${idx + 1}`;
                    img.className = 'w-full h-full object-cover';
                    cell.appendChild(img);
                }

                const isOverlay = idx === maxTiles - 1 && files.length > maxTiles;
                if (isOverlay) {
                    const overlay = document.createElement('div');
                    overlay.className = 'absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white text-xl font-semibold';
                    overlay.textContent = `+${files.length - (maxTiles - 1)}`;
                    cell.appendChild(overlay);
                }

                previewCollage.appendChild(cell);
            });
        }

        // Listen for preview update event
        window.addEventListener('updatePostPreview', (e) => {
            if (e.detail && e.detail.files) {
                updatePreview(e.detail.files);
            }
        });

        // Cancel Button - Go back to create post modal
        const cancelBtn = document.getElementById('cancelPreviewBtn');
        if (cancelBtn) {
            cancelBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');

                const createPostModal = document.getElementById('createPostModal');
                if (createPostModal) {
                    createPostModal.classList.remove('hidden');
                    createPostModal.classList.add('flex');
                }
            });
        }

        // Submit Button - Submit the form
        const submitBtn = document.getElementById('submitPreviewBtn');
        if (submitBtn) {
            submitBtn.addEventListener('click', () => {
                const createPostForm = document.querySelector('#createPostModal form');
                if (createPostForm) {
                    createPostForm.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
                } else if (typeof Livewire !== 'undefined') {
                    Livewire.dispatch('submit');
                }

                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        }

        // Open modal when preview button dispatches the event from createPostModal
        window.addEventListener('openPostCardPreview', (e) => {
            if (!modal) return;

            const detail = e?.detail || {};

            const filesFromEvent = detail.files || window.uploadedFilesForPreview;
            if (filesFromEvent && filesFromEvent.length > 0) {
                updatePreview(filesFromEvent);
            }

            const desc = detail.description || detail.title;
            if (previewDescription) previewDescription.textContent = desc ? `"${desc}"` : '"No description provided"';
            if (previewBarangay) previewBarangay.textContent = detail.barangay || 'No barangay selected';
            if (previewStatus) previewStatus.textContent = 'Preview';
            if (previewDate) previewDate.textContent = new Date().toLocaleDateString();

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });
</script>
@endpush