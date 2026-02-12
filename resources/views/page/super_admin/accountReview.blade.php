@extends('layout.superadminLayout')
@section('title', 'Super Admin Account Review')


@section('content')
<h2 class="text-xl font-semibold text-white mb-10">
            Account Review
        </h2>

   <div id="userAccountsSection" class="bg-[#173a5c] p-6 rounded-2xl shadow-lg overflow-auto">

    <table class="w-full text-sm text-left text-gray-200">
        <thead>
            <tr class="bg-[#244c72] text-white rounded-lg">
                <th class="px-4 py-3 rounded-l-lg">User ID</th>
                <th class="px-4 py-3">Full Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Location</th>
                <th class="px-4 py-3">Valid ID Type</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 rounded-r-lg">Action</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border-t border-[#ffffff1a]">
                <td class="px-4 py-4 text-blue-300">#USR-001</td>
                <td class="px-4 py-4">Carlos Reyes</td>
                <td class="px-4 py-4">carlos@email.com</td>
                <td class="px-4 py-4">Manila, Philippines</td>
                <td class="px-4 py-4">Driver’s License</td>
                <td class="px-4 py-4">
                    <span class="text-green-400 font-semibold">Active</span>
                </td>
                <td onclick="document.getElementById('userReviewAccountModal').style.display='flex'" class="px-4 py-4 flex gap-2 items-center">
                    <i class="hgi hgi-stroke hgi-eye text-2xl text-blue-400 hover:text-blue-300 cursor-pointer"></i>
                </td>
            </tr>

            <tr class="border-t border-[#ffffff1a]">
                <td class="px-4 py-4 text-blue-300">#USR-002</td>
                <td class="px-4 py-4">Ana Cruz</td>
                <td class="px-4 py-4">ana@email.com</td>
                <td class="px-4 py-4">Cebu City, Philippines</td>
                <td class="px-4 py-4">Passport</td>
                <td class="px-4 py-4">
                    <span class="text-yellow-400 font-semibold">Pending</span>
                </td>
                <td class="px-4 py-4 flex gap-2 items-center">
                    <i class="hgi hgi-stroke hgi-eye text-2xl text-blue-400 hover:text-blue-300 cursor-pointer"></i>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection
