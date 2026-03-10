@extends('layout.dashboardLayout')
@section('title', 'Reports Map')

@section('content')
<div class="p-2 lg:p-4">
    <!-- Clean Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Map Overview</h2>
            <p class="text-gray-400 text-xs mt-1">Real-time reports distribution</p>
        </div>

        <!-- Integrated Legend -->
        <div class="flex items-center gap-4 bg-[#1a1d29]/50 px-4 py-2 rounded-xl border border-[#2a2d3a]">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>
                <span class="text-[11px] font-medium text-gray-300 uppercase tracking-wider">Ongoing</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                <span class="text-[11px] font-medium text-gray-300 uppercase tracking-wider">Resolved</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                <span class="text-[11px] font-medium text-gray-300 uppercase tracking-wider">Issue</span>
            </div>
        </div>
    </div>

    <!-- Map Container -->
    <div class="relative">
        <div id="map" class="w-full h-[700px] rounded-3xl border border-[#2a2d3a] shadow-2xl overflow-hidden z-10 shadow-black/50"></div>
    </div>
</div>

<input type="hidden" id="reportsData" value="{{ json_encode($reports) }}">

@push('scripts')
<style>
    /* Modern Leaflet Overtakes */
    .leaflet-container {
        background: #11141d !important;
        font-family: inherit;
    }
    .leaflet-bar {
        border: none !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3) !important;
    }
    .leaflet-bar a {
        background-color: #1a1d29 !important;
        color: #94a3b8 !important;
        border-bottom: 1px solid #2a2d3a !important;
        width: 38px !important;
        height: 38px !important;
        line-height: 38px !important;
    }
    .leaflet-bar a:hover {
        background-color: #252836 !important;
        color: #00d4aa !important;
    }
    .leaflet-popup-content-wrapper {
        background: #1a1d29 !important;
        color: #e2e8f0 !important;
        border-radius: 16px !important;
        border: 1px solid #2a2d3a;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4) !important;
    }
    .leaflet-popup-tip {
        background: #1a1d29 !important;
    }
</style>
<script>
  window.reportsData = JSON.parse(document.getElementById('reportsData').value);
</script>
@endpush

@endsection