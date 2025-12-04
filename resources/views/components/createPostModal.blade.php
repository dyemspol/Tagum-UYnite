<div id="createPostModal"
     class="hidden fixed inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm justify-center items-center">

    <div class="bg-gradient-to-b from-[#1F486C] to-[#0F1F2C] w-[90%] max-w-[29em] rounded-xl px-5 py-5">

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

        <form wire:submit.prevent="submit" class="space-y-3 mt-5">

            <div>
                <label class="text-white text-sm">Title</label>
                <input wire:model="title" required
                       class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm"
                       type="text" placeholder="Ex: Potholes on Main Street">
            </div>

            <select wire:model="department_id" required
                    class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm">
                <option value="" disabled>Select Category</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" class="text-black">
                        {{ $department->category }}
                    </option>
                @endforeach
            </select>

            <select wire:model="barangay_id" required
                    class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm">
                <option value="" disabled>Select Barangay</option>
                @foreach($barangays as $barangay)
                    <option value="{{ $barangay->id }}" class="text-black">
                        {{ $barangay->barangay_name }}
                    </option>
                @endforeach
            </select>
            <div class="flex flex-col gap-2">
                <label class="text-white text-sm">Street Purok</label>
                <input wire:model="Street_Purok" required
                       class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm"
                       type="text" placeholder="Ex: Purok 1, Street 1">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-white text-sm">Landmark</label>
                <input wire:model="landmark" required
                       class="bg-transparent border border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm"
                       type="text" placeholder="Ex: Near the school">
            </div>
            <!-- MAP -->
            <div class="mt-3">
                <p class="text-white text-sm mb-2">Pin Location</p>
                <div id="createPostMap" class="w-full h-56 rounded-md"></div>
            </div>
            
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
    
        const modal = document.getElementById('createPostModal');
        const openBtn = document.getElementById('createPostBtnMobile');
        const modalClose = document.getElementById('createPostModalX');
    
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
    
    });
    </script>
    @endpush