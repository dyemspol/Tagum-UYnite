<div id="postCardModal"
     class="hidden fixed inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm justify-center items-center overflow-y-auto py-5">

    <div class="bg-[#182b3cd5] w-[90%] max-w-[50em] lg:max-w-[60em] rounded-lg overflow-hidden my-5">
        <!-- Close Button -->
        <div class="flex justify-end px-4 pt-4">
           
        </div>

        <!-- Image/Video Preview Section -->
        <div class="px-4 pb-4">
            <!-- Main Image Display -->
            <div id="previewMainImage" class="w-full h-[400px] lg:h-[500px] rounded-lg overflow-hidden bg-[#0f1f2c] mb-4">
                <img id="previewMainImg" src="" alt="Preview" class="w-full h-full object-contain">
                <video id="previewMainVideo" src="" controls class="w-full h-full object-contain hidden"></video>
            </div>

            <!-- Thumbnail Gallery (if multiple images) -->
            <div id="previewThumbnails" class="hidden mb-4">
                <div class="grid grid-cols-4 gap-2">
                    <!-- Thumbnails will be dynamically inserted here -->
                </div>
            </div>

            <!-- User Info and Post Details -->
            <div class="space-y-3">
                <div class="flex items-center gap-3 pb-3 border-b border-[#ffffff1a]">
                    <div class="w-10 h-10">
                        <img class="w-full h-full rounded-full object-cover"
                             src="{{ asset('img/yaoyapo.jpg') }}" alt="">
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-sm text-white">James Paul Silayan</p>
                        <p class="font-light text-[#ffffffa4] text-xs">November 20, 2025 <span>•</span> Broken Road</p>
                    </div>
                   
                </div>

                <!-- Post Title/Description -->
                <div>
                    <p class="text-sm font-light text-white">
                        <span>"</span>Free massage ang inyong likod ani. Palihog, hinay-hinay lang! 😂<span>"</span>
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 mt-6 pt-4 border-t border-[#ffffff1a]">
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
        const previewThumbnails = document.getElementById('previewThumbnails');
        const previewMainImage = document.getElementById('previewMainImage');

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

            // Show main preview
            if (isVideo) {
                previewMainVideo.src = URL.createObjectURL(firstFile);
                previewMainVideo.classList.remove('hidden');
                previewMainImg.classList.add('hidden');
            } else {
                previewMainImg.src = URL.createObjectURL(firstFile);
                previewMainImg.classList.remove('hidden');
                previewMainVideo.classList.add('hidden');
            }

            // Show thumbnails if multiple files
            if (files.length > 1) {
                previewThumbnails.classList.remove('hidden');
                const thumbnailsGrid = previewThumbnails.querySelector('div');
                thumbnailsGrid.innerHTML = '';

                files.forEach((file, index) => {
                    const thumbnail = document.createElement('div');
                    thumbnail.className = 'relative cursor-pointer overflow-hidden rounded-lg border-2 border-transparent hover:border-[#31A871] transition-colors';
                    
                    if (file.type.startsWith('video/')) {
                        thumbnail.innerHTML = `
                            <video class="w-full h-20 object-cover" src="${URL.createObjectURL(file)}"></video>
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        `;
                    } else {
                        thumbnail.innerHTML = `<img class="w-full h-20 object-cover" src="${URL.createObjectURL(file)}" alt="Thumbnail ${index + 1}">`;
                    }

                    thumbnail.addEventListener('click', () => {
                        if (file.type.startsWith('video/')) {
                            previewMainVideo.src = URL.createObjectURL(file);
                            previewMainVideo.classList.remove('hidden');
                            previewMainImg.classList.add('hidden');
                        } else {
                            previewMainImg.src = URL.createObjectURL(file);
                            previewMainImg.classList.remove('hidden');
                            previewMainVideo.classList.add('hidden');
                        }
                    });

                    thumbnailsGrid.appendChild(thumbnail);
                });
            } else {
                previewThumbnails.classList.add('hidden');
            }
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
                // Close preview modal
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                
                // Open create post modal
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
                // Find and submit the create post form
                const createPostForm = document.querySelector('#createPostModal form');
                if (createPostForm) {
                    createPostForm.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
                } else {
                    // Fallback: trigger Livewire submit
                    if (typeof Livewire !== 'undefined') {
                        Livewire.dispatch('submit');
                    }
                }
                
                // Close preview modal after submission
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        }

        // Open modal event listener
        window.addEventListener('openPostCardModal', () => {
            if (modal) {
                // Get uploaded files from global storage
                if (window.uploadedFilesForPreview && window.uploadedFilesForPreview.length > 0) {
                    updatePreview(window.uploadedFilesForPreview);
                }
                
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        });
    });
</script>
@endpush
