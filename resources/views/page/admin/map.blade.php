@extends('layout.dashboardLayout')
@section('title', 'Reports Management')


@section('content')

<div class="mb-6">
  <h2 class="text-xl font-semibold text-white mb-4">Map</h2>

  <!-- Dark Status Container -->
  <div class="flex space-x-4 items-center  rounded-lg">
    <!-- Ongoing -->
    <div class="flex items-center space-x-2 bg-gray-700 px-3 py-1 rounded-lg">
      <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
      <span class="text-sm font-medium text-yellow-300">Ongoing</span>
    </div>

    <!-- Resolved -->
    <div class="flex items-center space-x-2 bg-gray-700 px-3 py-1 rounded-lg">
      <span class="w-3 h-3 bg-green-400 rounded-full"></span>
      <span class="text-sm font-medium text-green-300">Resolved</span>
    </div>

    <!-- Issue / Unknown -->
    <div class="flex items-center space-x-2 bg-gray-700 px-3 py-1 rounded-lg">
      <span class="w-3 h-3 bg-red-400 rounded-full"></span>
      <span class="text-sm font-medium text-red-300">Issue</span>
    </div>
  </div>
</div>

<!-- Map Container -->
<div id="map" class="w-full h-[700px] rounded-lg border z-10 border-gray-700"></div>

<input type="hidden" id="reportsData" value="{{ json_encode($reports) }}">

@push('scripts')
<script>
  // Read the data from the hidden input to avoid Blade-in-JS lint errors
  window.reportsData = JSON.parse(document.getElementById('reportsData').value);
</script>
@endpush

@endsection