<div id="createPostModal"
    class="fixed hidden  inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm  justify-center items-center">
    <div class="bg-gradient-to-b from-[#1F486C] to-[#0F1F2C] w-[90%] px-5 max-w-[29em] rounded-xl py-5">

        <div class=" my-2 flex justify-between items-center">
           <div>
             <h2 class="text-white text-lg font-medium ">Create Post</h2>
             <p class="text-xs text-white font-light opacity-70 ">Submit a problem in your community </p>
           </div>

            <div id="createPostModalX" class="h-6 w-6 flex justify-center items-center rounded-full bg-[#31A871] cursor-pointer text-white">x</div>
        </div>

        <form action="" class="space-y-2 mt-5">
            <div>
                <label class="text-white font-extralight text-sm" for="">Title</label>
                <input
                    class="bg-transparent border-[0.5px] outline-none border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm"
                    type="text">
            </div>
            <select
                class="bg-transparent border-[0.5px] border-[#ffffff97] outline-none rounded-sm w-full  text-[#ffffff97] py-2 px-2 text-sm"
                type="text" placeholder="Choose Category">
                <option value="" disabled selected hidden>Select category</option>

                <option class="text-black" value="road">Road</option>
                <option class="text-black" value="infrastructure">Infrastructure</option>
                <option class="text-black" value="electricity_outage">Electricity outage</option>
                <option class="text-black" value="water_supply">Water supply</option>
                <option class="text-black" value="sanitation">Sanitation</option>
                <option class="text-black" value="garbage">Garbage collection</option>
                <option class="text-black" value="street_lighting">Street lighting</option>

            </select>
            <div class="mt-3">
                <label class="text-white font-extralight text-sm" for="">Description</label>
                <textarea placeholder="Describe the problem in your community..."
                    class="bg-transparent border-[0.5px] border-[#ffffff97] max-h-[20em] rounded-sm w-full text-white py-2 px-2 text-xs"
                    rows="4"></textarea>

            </div>

            <div class="">
                <label class="text-white font-extralight text-sm" for="">Upload Media</label>

                <!-- File upload -->
               <div class="border-2 border-dashed border-white p-4 mt-1 rounded-md w-full flex justify-center items-center cursor-pointer">
    <input type="file" id="fileUpload" multiple accept="image/*" class="hidden" />
    <label for="fileUpload" class="text-white text-sm cursor-pointer">
        Click to upload up to 4 images
    </label>
</div>

                <!-- Preview grid -->
                {{-- <div id="previewGrid" class="grid grid-cols-4 gap-2 mt-4">
                    <div class="border-1 opacity-50 border-white h-24 flex items-center justify-center"></div>
                    <div class="border-1 opacity-50 border-white h-24 flex items-center justify-center"></div>
                    <div class="border-1 opacity-50 border-white h-24 flex items-center justify-center"></div>
                    <div class="border-1 opacity-50 border-white h-24 flex items-center justify-center"></div>
                </div> --}}
                <div id="previewContainer" class="flex gap-2 mt-4 flex-wrap"></div>




            </div>
 <input class="bg-none  bg-[#31A871] hover:bg-[#35cb85] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3" type="submit" value="Post">
        </form>
       
    </div>
</div>
<script>
const fileUpload = document.getElementById('fileUpload');
const previewContainer = document.getElementById('previewContainer');
const maxFiles = 4;

let selectedFiles = []; // keep track of files

fileUpload.addEventListener('change', (e) => {
    const files = Array.from(fileUpload.files);

    // Check file limit
    if ((selectedFiles.length + files.length) > maxFiles) {
        alert(`You can only upload up to ${maxFiles} images!`);
        return;
    }

    files.forEach(file => {
        selectedFiles.push(file); // add to selected files

        const reader = new FileReader();
        reader.onload = () => {
            // Create wrapper div
            const wrapper = document.createElement('div');
            wrapper.className = 'relative w-25 h-25';

            // Create img
            const img = document.createElement('img');
            img.src = reader.result;
            img.className = 'w-full h-full opacity-50 object-cover border-2 border-white rounded';

            // Create X button
            const btn = document.createElement('button');
            btn.textContent = '✕';
            btn.className = 'absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center';
            btn.addEventListener('click', () => {
                wrapper.remove(); // remove preview
                selectedFiles = selectedFiles.filter(f => f !== file); // remove from array
                updateFileInput(); // update input files
            });

            wrapper.appendChild(img);
            wrapper.appendChild(btn);
            previewContainer.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    });

    updateFileInput();
});

// Function to update the input.files based on selectedFiles array
function updateFileInput() {
    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    fileUpload.files = dataTransfer.files;
}
</script>