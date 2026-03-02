@extends('layout.dashboardLayout')
@section('title', 'Reports Management')


@section('content')
    <div class="">
        <h2 class="text-xl font-semibold text-white mb-10">Reports Management</h2>
        <div class="p-6 min-h-screen text-white font-sans">

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] p-4 rounded-lg shadow border border-[#2a2d3a]">
      <p class="text-sm">Total Reports</p>
      <p class="text-2xl font-bold">53</p>
    </div>
    <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] p-4 rounded-lg shadow border border-[#2a2d3a]">
      <p class="text-sm">Pending</p>
      <p class="text-2xl font-bold text-yellow-400">5</p>
    </div>
    <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] p-4 rounded-lg shadow border border-[#2a2d3a]">
      <p class="text-sm">Ongoing</p>
      <p class="text-2xl font-bold text-purple-500">8</p>
    </div>
    <div class="bg-gradient-to-br from-[#1e2130] to-[#252836] p-4 rounded-lg shadow border border-[#2a2d3a]">
      <p class="text-sm">Completed</p>
      <p class="text-2xl font-bold text-green-500">19</p>
    </div>
  </div>

 
  <div class="flex gap-2 mb-4">
    <button class="px-3 py-1 bg-[#00d4aa] text-[#0f1117] font-semibold rounded">All</button>
    <button class="px-3 py-1 bg-[#252836] rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Pending</button>
    <button class="px-3 py-1 bg-[#252836] rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Ongoing</button>
    <button class="px-3 py-1 bg-[#252836] rounded hover:bg-[#00d4aa] hover:text-[#0f1117] transition-all duration-200">Completed</button>
  </div>

 
  <div class="bg-[#1a1d29] rounded-lg overflow-auto max-h-[420px] hide-scrollbar border border-[#2a2d3a]">
    <table class="min-w-full text-left text-gray-200 text-sm">
      <thead class="bg-[#252836]">
        <tr>
          <th class="px-4 py-3 rounded-l-lg">Type</th>
          <th class="px-4 py-3">ID</th>
          <th class="px-4 py-3">Issue name</th>
          <th class="px-4 py-3">Reported by</th>
          <th class="px-4 py-3">Date</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3 rounded-r-lg">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr>
        <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr>
         <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#2a2d3a] hover:bg-[#252836]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-[#00d4aa]">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-[#00d4aa] transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr>
      
       
      </tbody>
    </table>
  </div>

</div>


    </div>
@endsection
