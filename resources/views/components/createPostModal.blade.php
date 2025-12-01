
<div id="createPostModal"
    class="fixed hidden  inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm  justify-center items-center">
    <div class="bg-gradient-to-b from-[#1F486C] to-[#0F1F2C] w-[90%] px-5 max-w-[29em] rounded-xl py-5">

        <div class=" my-2 flex justify-between items-center">
            <div>
                <h2 class="text-white text-lg font-medium ">Create Post</h2>
                <p class="text-xs text-white font-light opacity-70 ">Submit a problem in your community </p>
            </div>

            <div id="createPostModalX"
                class="h-6 w-6 flex justify-center items-center rounded-full bg-[#31A871] cursor-pointer text-white">x
            </div>
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
            <select
    class="bg-transparent border-[0.5px] border-[#ffffff97] outline-none rounded-sm w-full text-[#ffffff97] py-2 px-2 text-sm"
>
    <option value="" disabled selected hidden>Select specific location</option>

    <!-- Apokon -->
    <option class="text-black" value="apokon_p1">Apokon — Purok 1</option>
    <option class="text-black" value="apokon_p2">Apokon — Purok 2</option>
    <option class="text-black" value="apokon_p3">Apokon — Purok 3</option>
    <option class="text-black" value="apokon_p4">Apokon — Purok 4</option>
    <option class="text-black" value="apokon_p5">Apokon — Purok 5</option>

    <!-- Bincungan -->
    <option class="text-black" value="bincungan_p1">Bincungan — Purok 1</option>
    <option class="text-black" value="bincungan_p2">Bincungan — Purok 2</option>
    <option class="text-black" value="bincungan_p3">Bincungan — Purok 3</option>
    <option class="text-black" value="bincungan_p4">Bincungan — Purok 4</option>
    <option class="text-black" value="bincungan_p5">Bincungan — Purok 5</option>
    <option class="text-black" value="bincungan_p6">Bincungan — Purok 6</option>

    <!-- Busaon -->
    <option class="text-black" value="busaon_p1">Busaon — Purok 1</option>
    <option class="text-black" value="busaon_p2">Busaon — Purok 2</option>
    <option class="text-black" value="busaon_p3">Busaon — Purok 3</option>
    <option class="text-black" value="busaon_p4">Busaon — Purok 4</option>
    <option class="text-black" value="busaon_p5">Busaon — Purok 5</option>
    <option class="text-black" value="busaon_p6">Busaon — Purok 6</option>

    <!-- Canocotan -->
    <option class="text-black" value="canocotan_p1">Canocotan — Purok 1</option>
    <option class="text-black" value="canocotan_p2">Canocotan — Purok 2</option>
    <option class="text-black" value="canocotan_p3">Canocotan — Purok 3</option>
    <option class="text-black" value="canocotan_p4">Canocotan — Purok 4</option>
    <option class="text-black" value="canocotan_p5">Canocotan — Purok 5</option>
    <option class="text-black" value="canocotan_p6">Canocotan — Purok 6</option>

    <!-- Cuambogan -->
    <option class="text-black" value="cuambogan_p1">Cuambogan — Purok 1</option>
    <option class="text-black" value="cuambogan_p2">Cuambogan — Purok 2</option>
    <option class="text-black" value="cuambogan_p3">Cuambogan — Purok 3</option>
    <option class="text-black" value="cuambogan_p4">Cuambogan — Purok 4</option>
    <option class="text-black" value="cuambogan_p5">Cuambogan — Purok 5</option>

    <!-- La Filipina -->
    <option class="text-black" value="la_filipina_p1">La Filipina — Purok 1</option>
    <option class="text-black" value="la_filipina_p2">La Filipina — Purok 2</option>
    <option class="text-black" value="la_filipina_p3">La Filipina — Purok 3</option>
    <option class="text-black" value="la_filipina_p4">La Filipina — Purok 4</option>
    <option class="text-black" value="la_filipina_p5">La Filipina — Purok 5</option>
    <option class="text-black" value="la_filipina_p6">La Filipina — Purok 6</option>
    <option class="text-black" value="la_filipina_p7">La Filipina — Purok 7</option>

    <!-- Liboganon -->
    <option class="text-black" value="liboganon_p1">Liboganon — Purok 1</option>
    <option class="text-black" value="liboganon_p2">Liboganon — Purok 2</option>
    <option class="text-black" value="liboganon_p3">Liboganon — Purok 3</option>
    <option class="text-black" value="liboganon_p4">Liboganon — Purok 4</option>
    <option class="text-black" value="liboganon_p5">Liboganon — Purok 5</option>

    <!-- Madaum -->
    <option class="text-black" value="madaum_p1">Madaum — Purok 1</option>
    <option class="text-black" value="madaum_p2">Madaum — Purok 2</option>
    <option class="text-black" value="madaum_p3">Madaum — Purok 3</option>
    <option class="text-black" value="madaum_p4">Madaum — Purok 4</option>
    <option class="text-black" value="madaum_p5">Madaum — Purok 5</option>

    <!-- Magdum -->
    <option class="text-black" value="magdum_p1">Magdum — Purok 1</option>
    <option class="text-black" value="magdum_p2">Magdum — Purok 2</option>
    <option class="text-black" value="magdum_p3">Magdum — Purok 3</option>
    <option class="text-black" value="magdum_p4">Magdum — Purok 4</option>
    <option class="text-black" value="magdum_p5">Magdum — Purok 5</option>

    <!-- Magugpo Poblacion -->
    <option class="text-black" value="magugpo_poblacion_p1">Magugpo Poblacion — Purok 1</option>
    <option class="text-black" value="magugpo_poblacion_p2">Magugpo Poblacion — Purok 2</option>
    <option class="text-black" value="magugpo_poblacion_p3">Magugpo Poblacion — Purok 3</option>
    <option class="text-black" value="magugpo_poblacion_p4">Magugpo Poblacion — Purok 4</option>
    <option class="text-black" value="magugpo_poblacion_p5">Magugpo Poblacion — Purok 5</option>

    <!-- Magugpo East -->
    <option class="text-black" value="magugpo_east_p1">Magugpo East — Purok 1</option>
    <option class="text-black" value="magugpo_east_p2">Magugpo East — Purok 2</option>
    <option class="text-black" value="magugpo_east_p3">Magugpo East — Purok 3</option>
    <option class="text-black" value="magugpo_east_p4">Magugpo East — Purok 4</option>
    <option class="text-black" value="magugpo_east_p5">Magugpo East — Purok 5</option>

    <!-- Magugpo North -->
    <option class="text-black" value="magugpo_north_p1">Magugpo North — Purok 1</option>
    <option class="text-black" value="magugpo_north_p2">Magugpo North — Purok 2</option>
    <option class="text-black" value="magugpo_north_p3">Magugpo North — Purok 3</option>
    <option class="text-black" value="magugpo_north_p4">Magugpo North — Purok 4</option>
    <option class="text-black" value="magugpo_north_p5">Magugpo North — Purok 5</option>

    <!-- Magugpo South -->
    <option class="text-black" value="magugpo_south_p1">Magugpo South — Purok 1</option>
    <option class="text-black" value="magugpo_south_p2">Magugpo South — Purok 2</option>
    <option class="text-black" value="magugpo_south_p3">Magugpo South — Purok 3</option>
    <option class="text-black" value="magugpo_south_p4">Magugpo South — Purok 4</option>
    <option class="text-black" value="magugpo_south_p5">Magugpo South — Purok 5</option>

    <!-- Magugpo West -->
    <option class="text-black" value="magugpo_west_p1">Magugpo West — Purok 1</option>
    <option class="text-black" value="magugpo_west_p2">Magugpo West — Purok 2</option>
    <option class="text-black" value="magugpo_west_p3">Magugpo West — Purok 3</option>
    <option class="text-black" value="magugpo_west_p4">Magugpo West — Purok 4</option>
    <option class="text-black" value="magugpo_west_p5">Magugpo West — Purok 5</option>

    <!-- Mankilam -->
    <option class="text-black" value="mankilam_p1">Mankilam — Purok 1</option>
    <option class="text-black" value="mankilam_p2">Mankilam — Purok 2</option>
    <option class="text-black" value="mankilam_p3">Mankilam — Purok 3</option>
    <option class="text-black" value="mankilam_p4">Mankilam — Purok 4</option>
    <option class="text-black" value="mankilam_p5">Mankilam — Purok 5</option>

    <!-- New Balamban -->
    <option class="text-black" value="new_balamban_p1">New Balamban — Purok 1</option>
    <option class="text-black" value="new_balamban_p2">New Balamban — Purok 2</option>
    <option class="text-black" value="new_balamban_p3">New Balamban — Purok 3</option>
    <option class="text-black" value="new_balamban_p4">New Balamban — Purok 4</option>
    <option class="text-black" value="new_balamban_p5">New Balamban — Purok 5</option>

    <!-- Nueva Fuerza -->
    <option class="text-black" value="nueva_fuerza_p1">Nueva Fuerza — Purok 1</option>
    <option class="text-black" value="nueva_fuerza_p2">Nueva Fuerza — Purok 2</option>
    <option class="text-black" value="nueva_fuerza_p3">Nueva Fuerza — Purok 3</option>
    <option class="text-black" value="nueva_fuerza_p4">Nueva Fuerza — Purok 4</option>
    <option class="text-black" value="nueva_fuerza_p5">Nueva Fuerza — Purok 5</option>

    <!-- Pagsabangan -->
    <option class="text-black" value="pagsabangan_p1">Pagsabangan — Purok 1</option>
    <option class="text-black" value="pagsabangan_p2">Pagsabangan — Purok 2</option>
    <option class="text-black" value="pagsabangan_p3">Pagsabangan — Purok 3</option>
    <option class="text-black" value="pagsabangan_p4">Pagsabangan — Purok 4</option>
    <option class="text-black" value="pagsabangan_p5">Pagsabangan — Purok 5</option>

    <!-- Pandapan -->
    <option class="text-black" value="pandapan_p1">Pandapan — Purok 1</option>
    <option class="text-black" value="pandapan_p2">Pandapan — Purok 2</option>
    <option class="text-black" value="pandapan_p3">Pandapan — Purok 3</option>
    <option class="text-black" value="pandapan_p4">Pandapan — Purok 4</option>
    <option class="text-black" value="pandapan_p5">Pandapan — Purok 5</option>

    <!-- San Agustin -->
    <option class="text-black" value="san_agustin_p1">San Agustin — Purok 1</option>
    <option class="text-black" value="san_agustin_p2">San Agustin — Purok 2</option>
    <option class="text-black" value="san_agustin_p3">San Agustin — Purok 3</option>
    <option class="text-black" value="san_agustin_p4">San Agustin — Purok 4</option>
    <option class="text-black" value="san_agustin_p5">San Agustin — Purok 5</option>

    <!-- San Isidro -->
    <option class="text-black" value="san_isidro_p1">San Isidro — Purok 1</option>
    <option class="text-black" value="san_isidro_p2">San Isidro — Purok 2</option>
    <option class="text-black" value="san_isidro_p3">San Isidro — Purok 3</option>
    <option class="text-black" value="san_isidro_p4">San Isidro — Purok 4</option>
    <option class="text-black" value="san_isidro_p5">San Isidro — Purok 5</option>

    <!-- San Miguel -->
    <option class="text-black" value="san_miguel_p1">San Miguel — Purok 1</option>
    <option class="text-black" value="san_miguel_p2">San Miguel — Purok 2</option>
    <option class="text-black" value="san_miguel_p3">San Miguel — Purok 3</option>
    <option class="text-black" value="san_miguel_p4">San Miguel — Purok 4</option>
    <option class="text-black" value="san_miguel_p5">San Miguel — Purok 5</option>

    <!-- Visayan Village -->
    <option class="text-black" value="visayan_village_p1">Visayan Village — Purok 1</option>
    <option class="text-black" value="visayan_village_p2">Visayan Village — Purok 2</option>
    <option class="text-black" value="visayan_village_p3">Visayan Village — Purok 3</option>
    <option class="text-black" value="visayan_village_p4">Visayan Village — Purok 4</option>
    <option class="text-black" value="visayan_village_p5">Visayan Village — Purok 5</option>
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
                <div
                    class="border-2 border-dashed border-white p-4 mt-1 rounded-md w-full flex justify-center items-center cursor-pointer">
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
            <input
                class="bg-none  bg-[#31A871] hover:bg-[#35cb85] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3"
                type="submit" value="Post">
        </form>

    </div>
</div>
<script></script>
