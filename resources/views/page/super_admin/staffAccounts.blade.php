@extends('layout.dashboardLayout')
@section('title', 'Super Admin Staff Accounts')


@section('content')
    <div class="flex justify-between items-center  mb-10">
        <h2 class="text-xl font-semibold text-white">
            Staff Accounts
        </h2>

        <button type="button" onclick="document.getElementById('createStaffAccountModal').style.display='flex'"
            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-1 rounded-lg transition-all duration-300">
            Create Account
        </button>
    </div>
    <div id="staffAccountsSection" class="bg-[#173a5c] p-6 rounded-2xl shadow-lg overflow-auto">

        <table class="w-full text-sm text-left text-gray-200">
            <thead>
                <tr class="bg-[#244c72] text-white rounded-lg">
                    <th class="px-4 py-3 rounded-l-lg">Staff ID</th>
                    <th class="px-4 py-3">Full Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Department</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 rounded-r-lg">Action</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-t border-[#ffffff1a]">
                    <td class="px-4 py-4 text-blue-300">#STF-001</td>
                    <td class="px-4 py-4">Juan Dela Cruz</td>
                    <td class="px-4 py-4">juan@email.com</td>
                    <td class="px-4 py-4">Health Department</td>

                    <td class="px-4 py-4">
                        <span class="text-green-400 font-semibold">Active</span>
                    </td>

                    <td class="px-4 py-4 flex gap-2 items-center">

                        <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300 cursor-pointer"></i>
                    </td>
                </tr>

                <tr class="border-t border-[#ffffff1a]">
                    <td class="px-4 py-4 text-blue-300">#STF-002</td>
                    <td class="px-4 py-4">Maria Santos</td>
                    <td class="px-4 py-4">maria@email.com</td>
                    <td class="px-4 py-4">IT Department</td>

                    <td class="px-4 py-4">
                        <span class="text-yellow-400 font-semibold">Pending</span>
                    </td>

                    <td class="px-4 py-4 flex gap-2 items-center">

                        <i class="hgi hgi-stroke hgi-delete-01 text-2xl text-red-500 hover:text-red-300 cursor-pointer"></i>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
