@extends('layout.dashboardLayout')
@section('title', 'Main Dashboard')


@section('content')  
    <div class="">
        <h2 class="text-xl font-semibold text-white mb-6">City Overview</h2>
        {{-- KPI Cards--}}
       <div class="grid grid-cols-1 grid-row-2 sm:grid-cols-2 md:grid-cols-3 gap-6">

    <!-- Card 1 -->
    <div class="bg-gradient-to-br from-slate-700 to-blue-800
rounded-xl p-5 flex flex-col justify-between shadow-md">
        <div class="flex justify-between items-start">
            <span class="text-gray-300 text-sm">New Reports</span>
            <i class="fa-solid fa-file-lines text-gray-400"></i>
        </div>
        <div class="mt-3 ">
            <h2 class="text-3xl font-bold text-white">12</h2>
            <p class="text-green-500 text-sm mt-1">+8% from yesterday</p>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-gradient-to-br from-slate-700 to-blue-800 rounded-xl p-5 flex flex-col justify-between shadow-md">
        <div class="flex justify-between items-start">
            <span class="text-gray-300 text-sm">Active Issue</span>
            <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
        </div>
        <div class="mt-3">
            <h2 class="text-3xl font-bold text-white">45</h2>
            <p class="text-green-500 text-sm mt-1">Urgent attention needed</p>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-gradient-to-br from-slate-700 to-blue-800 rounded-xl p-5 flex flex-col justify-between shadow-md">
        <div class="flex justify-between items-start">
            <span class="text-gray-300 text-sm">Resolved Week</span>
        </div>
        <div class="mt-3">
            <h2 class="text-3xl font-bold text-white">34</h2>
            <p class="text-green-500 text-sm mt-1">Urgent attention needed</p>
        </div>
    </div>
    
    

</div>
     <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Recent User Reports -->
        <div class="col-span-2 bg-[#13314f] p-4 rounded-lg shadow max-h-[250px] overflow-y-auto hide-scrollbar">
            <h2 class="font-medium text-white text-lg mb-4">Recent User Reports (News Feed)</h2>
            <div class="space-y-3">
                <div class="flex justify-between items-center bg-[#2748755e] p-3 rounded">
                    <div>
                        <p class="font-regular text-sm text-white">Daot ang dalan - San Miguel, Tagum City</p>
                        <p class="text-xs text-red-500">Critical · 12 Minutes ago</p>
                    </div>
                    <button class="text-white">→</button>
                </div>
                
                
                
            </div>
        </div>
        

        <!-- Critical Watchlist -->
        <div class="bg-[#13314f] p-4 rounded-lg overflow-y-auto w-full hide-scrollbar">
            <h2 class="font-medium text-white text-lg mb-4"><span><i class="fa-solid text-[#fd0000] pr-2 fa-exclamation"></i></span>Critical Watchlist</h2>
            <div class="space-y-3">
                <div class="flex justify-between items-center bg-[#2748755e] p-3 rounded">
                   <div>
                     <p class="text-white text-sm">Walay kurente</p>
                     <p class="text-xs text-red-500">Critical · 12 Minutes ago</p>
                   </div>
                    <button class="bg-[#ff00003b]  text-[#e40000] px-2 py-1 rounded">Resolve</button>
                </div>
                
            </div>
            {{-- <button class="w-full mt-4 bg-gray-500 text-white py-2 rounded">View All →</button> --}}
        </div>
        <div class="bg-[#13314f] p-4 rounded-lg shadow">
    <h3 class="text-white mb-2">Issues by Category</h3>
    <canvas id="issuesBarChart"></canvas>
</div>

    </div>
    </div>
@endsection