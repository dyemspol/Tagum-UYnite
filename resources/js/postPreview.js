const fileUpload = document.getElementById("fileUpload");
const previewContainer = document.getElementById("previewContainer");
const maxFiles = 4;

let selectedFiles = []; // keep track of files

fileUpload.addEventListener("change", (e) => {
    const files = Array.from(fileUpload.files);

    // Check file limit
    if (selectedFiles.length + files.length > maxFiles) {
        alert(`You can only upload up to ${maxFiles} images!`);
        return;
    }

    files.forEach((file) => {
        selectedFiles.push(file); // add to selected files

        const reader = new FileReader();
        reader.onload = () => {
            // Create wrapper div
            const wrapper = document.createElement("div");
            wrapper.className = "relative w-25 h-25";

            // Create img
            const img = document.createElement("img");
            img.src = reader.result;
            img.className =
                "w-full h-full opacity-50 object-cover border-2 border-white rounded";

            // Create X button
            const btn = document.createElement("button");
            btn.textContent = "✕";
            btn.className =
                "absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center";
            btn.addEventListener("click", () => {
                wrapper.remove(); // remove preview
                selectedFiles = selectedFiles.filter((f) => f !== file); // remove from array
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
    selectedFiles.forEach((file) => dataTransfer.items.add(file));
    fileUpload.files = dataTransfer.files;
}
