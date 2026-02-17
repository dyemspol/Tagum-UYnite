@extends('layout.dashboardLayout')
@section('title', 'Super Admin Dashboard')


@section('content')
    <div class="">
    <h2 class="text-xl font-semibold text-white mb-6">Super Admin Overview</h2>
    
    {{-- KPI Cards--}}
    <div class="grid grid-cols-1 grid-row-2 sm:grid-cols-2 md:grid-cols-3 gap-6">

        <!-- Card 1: Total Staff -->
        <div class="bg-gradient-to-br from-slate-700 to-blue-800 rounded-xl p-5 flex flex-col justify-between shadow-md">
            <div class="flex justify-between items-start">
                <span class="text-gray-300 text-sm">Total Staff</span>
                <i class="fa-solid fa-users text-gray-400"></i>
            </div>
            <div class="mt-3">
                <h2 class="text-3xl font-bold text-white">{{ $totalStaff ?? 0 }}</h2>
                <p class="text-green-500 text-sm mt-1">All registered staff</p>
            </div>
        </div>

        <!-- Card 2: Total by Department -->
        <div class="bg-gradient-to-br from-slate-700 to-blue-800 rounded-xl p-5 flex flex-col justify-between shadow-md">
            <div class="flex justify-between items-start">
                <span class="text-gray-300 text-sm">Total by Department</span>
                <i class="fa-solid fa-building text-gray-400"></i>
            </div>
            <div class="mt-3">
                <h2 class="text-3xl font-bold text-white">{{ $totalDepartments ?? 0 }}</h2>
                <p class="text-green-500 text-sm mt-1">Departments with staff</p>
            </div>
        </div>

        <!-- Card 3: Total Account Reviews -->
         <div class="bg-gradient-to-br from-slate-700 to-blue-800 rounded-xl p-5 flex flex-col justify-between shadow-md">
        <div class="flex justify-between items-start">
            <span class="text-gray-300 text-sm">Pending Accounts</span>
            <i class="fa-solid fa-user-clock text-gray-400"></i>
        </div>
        <div class="mt-3">
            <h2 class="text-3xl font-bold text-white">{{ $totalPendingAccounts ?? 0 }}</h2>
            <p class="text-green-500 text-sm mt-1">Accounts waiting for review</p>
        </div>
    </div>
    </div>

   <div class="mt-6 bg-[#13314f] p-4 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-white font-medium text-lg">Newly Registered Users</h2>
        <a href="{{ route('accountReview') }}" class="text-blue-400 hover:text-blue-500 text-sm font-semibold">See All →</a>
    </div>

    <div class="space-y-3 max-h-[250px] overflow-y-auto hide-scrollbar">
        <!-- Sample User Item -->
        <div class="flex justify-between items-center bg-[#2748755e] p-3 rounded">
            <div>
                <p class="text-white text-sm">Juan Dela Cruz</p>
                <p class="text-xs text-gray-300">Registered · 12 Minutes ago</p>
            </div>
            <button class="text-white bg-[#1f3b56] px-2 py-1 rounded">View</button>
        </div>

        <div class="flex justify-between items-center bg-[#2748755e] p-3 rounded">
            <div>
                <p class="text-white text-sm">Maria Santos</p>
                <p class="text-xs text-gray-300">Registered · 1 Hour ago</p>
            </div>
            <button class="text-white bg-[#1f3b56] px-2 py-1 rounded">View</button>
        </div>

        <div class="flex justify-between items-center bg-[#2748755e] p-3 rounded">
            <div>
                <p class="text-white text-sm">Pedro Reyes</p>
                <p class="text-xs text-gray-300">Registered · 3 Hours ago</p>
            </div>
            <button class="text-white bg-[#1f3b56] px-2 py-1 rounded">View</button>
        </div>
        <!-- Add more items as needed -->
    </div>
</div>
</div>
@endsection
