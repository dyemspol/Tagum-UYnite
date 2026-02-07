@extends('layout.dashboardLayout')
@section('title', 'Reports Management')


@section('content')
    <div class="">
        <h2 class="text-xl font-semibold text-white mb-10">Reports Management</h2>
        <div class="p-6 min-h-screen text-white font-sans">

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-gradient-to-br from-slate-700 to-blue-800 p-4 rounded-lg shadow">
      <p class="text-sm">Total Reports</p>
      <p class="text-2xl font-bold">53</p>
    </div>
    <div class="bg-gradient-to-br from-slate-700 to-blue-800 p-4 rounded-lg shadow">
      <p class="text-sm">Pending</p>
      <p class="text-2xl font-bold text-yellow-400">5</p>
    </div>
    <div class="bg-gradient-to-br from-slate-700 to-blue-800 p-4 rounded-lg shadow">
      <p class="text-sm">Ongoing</p>
      <p class="text-2xl font-bold text-purple-500">8</p>
    </div>
    <div class="bg-gradient-to-br from-slate-700 to-blue-800 p-4 rounded-lg shadow">
      <p class="text-sm">Completed</p>
      <p class="text-2xl font-bold text-green-500">19</p>
    </div>
  </div>

 
  <div class="flex gap-2 mb-4">
    <button class="px-3 py-1 bg-blue-500 rounded">All</button>
    <button class="px-3 py-1 bg-[#1e314b] rounded hover:bg-blue-500">Pending</button>
    <button class="px-3 py-1 bg-[#1e314b] rounded hover:bg-blue-500">Ongoing</button>
    <button class="px-3 py-1 bg-[#1e314b] rounded hover:bg-blue-500">Completed</button>
  </div>

 
  <div class="bg-[#1e314b] rounded-lg overflow-auto max-h-[420px] hide-scrollbar">
    <table class="min-w-full text-left text-gray-200 text-sm">
      <thead class="bg-[#243958]">
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
        <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr>
        <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr>
         <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr> <tr class="border-t border-[#ffffff1a] hover:bg-[#2a3d5b]">
          <td class="px-4 py-4">Noise</td>
          <td class="px-4 py-4 text-blue-300">#1023</td>
          <td class="px-4 py-4">Saba ang karaoke</td>
          <td class="px-4 py-4">Khristian divvv</td>
          <td class="px-4 py-4">09/10/25</td>
          <td class="px-4 py-4 text-red-500 font-semibold">Critical</td>
          <td class="px-4 py-4 flex gap-2">
            <i class="hgi hgi-stroke hgi-view text-2xl hover:text-blue-400 transition-all duration-300"></i>
                            <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300"></i>
          </td>
        </tr>
      
       
      </tbody>
    </table>
  </div>

</div>


    </div>
@endsection
