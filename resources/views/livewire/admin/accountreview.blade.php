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
                        @php
                            $status = strtolower($user->verificationStatus->status);
                            $statusConfig = match(true) {
                                in_array($status, ['verified', 'approved']) => [
                                    'badge' => 'bg-green-500/10 text-green-400 border-green-500/20 light:bg-green-100 light:text-green-700 light:border-green-200',
                                    'dot' => 'bg-green-400'
                                ],
                                $status === 'pending' => [
                                    'badge' => 'bg-amber-500/10 text-amber-500 border-amber-500/20 light:bg-amber-100 light:text-amber-700 light:border-amber-200',
                                    'dot' => 'bg-amber-500'
                                ],
                                in_array($status, ['rejected', 'declined']) => [
                                    'badge' => 'bg-red-500/10 text-red-500 border-red-500/20 light:bg-red-100 light:text-red-700 light:border-red-200',
                                    'dot' => 'bg-red-400'
                                ],
                                default => [
                                    'badge' => 'bg-blue-500/10 text-blue-400 border-blue-500/20 light:bg-blue-100 light:text-blue-700 light:border-blue-200',
                                    'dot' => 'bg-blue-400'
                                ],
                            };
                        @endphp
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border transition-all duration-300 {{ $statusConfig['badge'] }}">
                            <span class="w-1.5 h-1.5 rounded-full mr-2 {{ $statusConfig['dot'] }}"></span>
                            {{ $user->verificationStatus->status }}
                        </div>
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