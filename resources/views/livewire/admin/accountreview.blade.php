<div>
    <h2 class="text-xl font-semibold text-white light:text-gray-900 mb-10 transition-colors">
        Account Review
    </h2>

    <div class="fixed top-20 right-5 z-[10000] flex flex-col gap-3 min-w-[300px]">
        @if (session()->has('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center justify-between transition-all duration-300">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-white/50 hover:text-white">&times;</button>
        </div>
        @endif

        @if (session()->has('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center justify-between transition-all duration-300">
            <span>{{ session('error') }}</span>
            <button @click="show = false" class="ml-4 text-white/50 hover:text-white">&times;</button>
        </div>
        @endif
    </div>

    <div id="userAccountsSection" class="bg-[#1a1d29] light:bg-[#f8fafc] p-6 rounded-2xl shadow-lg overflow-auto border border-[#2a2d3a] light:border-gray-200 transition-colors">

        <table class="w-full text-sm text-left text-gray-200 light:text-gray-700 transition-colors">
            <thead>
                <tr class="bg-[#252836] light:bg-white text-white light:text-gray-900 rounded-lg transition-colors">
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
                <tr class="border-t border-[#2a2d3a] light:border-gray-200 hover:bg-[#252836]/50 light:hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-4 text-[#00d4aa]">#USR-{{ $user->id }}</td>
                    <td class="px-4 py-4 light:text-gray-900 transition-colors">{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td class="px-4 py-4 light:text-gray-900 transition-colors">{{ $user->email }}</td>
                    <td class="px-4 py-4 light:text-gray-900 transition-colors">{{ $user->address }}</td>
                    <td class="px-4 py-4">
                        <span class="text-green-400 font-semibold transition-colors">{{ $user->verificationStatus->status }}</span>
                    </td>
                    <td wire:click="showUser({{ $user->id }})" class="px-4 py-4 flex gap-2 items-center">
                        <i class="hgi hgi-stroke hgi-eye text-2xl text-[#00d4aa] hover:text-[#00e6b8] cursor-pointer transition-colors"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @include('components.viewAccountReview')
</div>