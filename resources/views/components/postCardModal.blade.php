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