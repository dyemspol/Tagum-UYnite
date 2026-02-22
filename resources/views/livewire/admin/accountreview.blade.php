<div>
    <h2 class="text-xl font-semibold text-white mb-10">
        Account Review
    </h2>

    @if (session()->has('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center justify-between transition-all duration-300">
        <span>{{ session('success') }}</span>
        <button @click="show = false" class="ml-4 text-white/50 hover:text-white">&times;</button>
    </div>
    @endif

    <div id="userAccountsSection" class="bg-[#173a5c] p-6 rounded-2xl shadow-lg overflow-auto">

        <table class="w-full text-sm text-left text-gray-200">
            <thead>
                <tr class="bg-[#244c72] text-white rounded-lg">
                    <th class="px-4 py-3 rounded-l-lg">User ID</th>
                    <th class="px-4 py-3">Full Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Location</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 rounded-r-lg">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr class="border-t border-[#ffffff1a]">
                    <td class="px-4 py-4 text-blue-300">#USR-{{ $user->id }}</td>
                    <td class="px-4 py-4">{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td class="px-4 py-4">{{ $user->email }}</td>
                    <td class="px-4 py-4">{{ $user->address }}</td>
                    <td class="px-4 py-4">
                        <span class="text-green-400 font-semibold">{{ $user->verificationStatus->status }}</span>
                    </td>
                    <td wire:click="showUser({{ $user->id }})" class="px-4 py-4 flex gap-2 items-center">
                        <i class="hgi hgi-stroke hgi-eye text-2xl text-blue-400 hover:text-blue-300 cursor-pointer"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @include('components.viewAccountReview')
</div>