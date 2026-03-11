<div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-4 px-5 sm:px-10 mt-8" wire:poll.3s="refreshMessages">
    <!-- Left Sidebar - Departments -->
    <div class="bg-[#1a3447] light:bg-[#f8fafc] rounded-xl p-4 shadow-xl border border-[#ffffff05] light:border-gray-200 transition-colors">
        <div class="flex items-center justify-between mb-6 px-2">
            <h2 class="text-white light:text-gray-900 text-xl font-bold tracking-tight transition-colors">Channels</h2>
            <!-- <div class="bg-[#31A871]/10 text-[#31A871] text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">
                {{ $departments->count() }} Online
            </div> -->
        </div>

        <div class="space-y-2 overflow-y-auto max-h-[calc(100vh-300px)] custom-scrollbar pr-1">
            @foreach ($departments as $department)
            <a wire:click="selectDepartment({{ $department->id }})"
                class="relative group cursor-pointer flex items-center p-3 rounded-xl transition-all duration-200 
                       {{ $selectedDepartmentId == $department->id ? 'bg-[#31A871]/10 ring-1 ring-[#31A871]/20 shadow-[0_4px_12px_rgba(49,168,113,0.1)] light:bg-[#31A871]/20' : 'hover:bg-[#234156]/50 light:hover:bg-gray-100' }}">

                <!-- Left Accent -->
                @if($selectedDepartmentId == $department->id)
                <div class="absolute left-0 w-1 h-8 bg-[#31A871] rounded-r-full"></div>
                @endif

                <!-- Department Logo -->
                <div class="relative flex-shrink-0">
                    <div class="w-11 h-11 rounded-full border-2 {{ $selectedDepartmentId == $department->id ? 'border-[#31A871]/50' : 'border-[#ffffff10] light:border-gray-300' }} overflow-hidden bg-[#122333] light:bg-gray-100 shadow-inner transition-colors">
                        @if($department->department_photo)
                        <img src="{{ asset($department->department_photo) }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-[#31A871] font-bold text-lg bg-gradient-to-br from-[#122333] to-[#1f3548] light:from-gray-100 light:to-gray-200 transition-colors">
                            {{ substr($department->department_name, 0, 1) }}
                        </div>
                        @endif
                    </div>
                    <!-- Status dot -->
                    <!-- <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-green-500 border-[3px] border-[#1a3447] rounded-full shadow-sm"></div> -->
                </div>

                <!-- Info -->
                <div class="ml-3 flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-bold truncate transition-colors {{ $selectedDepartmentId == $department->id ? 'text-white light:text-gray-900' : 'text-[#ffffffb0] light:text-gray-600 group-hover:text-white light:group-hover:text-gray-900' }}">
                            {{ $department->department_name }}
                        </p>
                    </div>
                    <p class="text-[11px] font-medium text-[#31A871] opacity-80 truncate">
                        #{{ str_replace(' ', '', $department->category) }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Right Content Area - Messages -->
    <div class="bg-[#1a3447] light:bg-white rounded-xl flex flex-col h-[calc(100vh-200px)] shadow-xl border border-[#ffffff05] light:border-gray-200 overflow-hidden transition-colors">
        <!-- Header -->
        <div class="border-b border-[#ffffff10] light:border-gray-200 p-5 bg-[#1a3447]/50 light:bg-white/80 backdrop-blur-md sticky top-0 z-10 transition-colors">
            <div class="flex items-center space-x-4">
                {{--
                <a href="/" class="text-white/60 hover:text-white transition-colors mr-2">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
                --}}
                @if($selectedDepartmentId)
                @php $currentDept = $departments->find($selectedDepartmentId); @endphp
                <div class="w-10 h-10 rounded-full border border-[#ffffff10] light:border-gray-200 overflow-hidden bg-[#122333] light:bg-gray-100 transition-colors">
                    @if($currentDept->department_photo)
                    <img src="{{ asset($currentDept->department_photo) }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-[#31A871] font-bold bg-gradient-to-br from-[#122333] to-[#1f3548] light:from-gray-100 light:to-gray-200 transition-colors">
                        {{ substr($currentDept->department_name, 0, 1) }}
                    </div>
                    @endif
                </div>
                <div>
                    <h2 class="text-white light:text-gray-900 text-lg font-bold transition-colors">
                        {{ $currentDept->department_name }}
                    </h2>
                    <!-- <p class="text-[10px] text-green-500 font-bold uppercase tracking-widest">Active Channel</p> -->
                </div>
                @else
                <h2 class="text-[#ffffff80] light:text-gray-500 text-lg font-bold transition-colors">Select a Channel</h2>
                @endif
            </div>
        </div>

        <!-- Messages Area -->
        <div class="flex-1 overflow-y-auto p-6 space-y-6 custom-scrollbar bg-[#122333]/20 light:bg-gray-50/50 transition-colors">

            @if(!$selectedDepartmentId)
            <div class="flex h-full flex-col items-center justify-center space-y-4 opacity-50">
                <div class="w-20 h-20 bg-[#31A871]/10 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#31A871]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <p class="text-white light:text-gray-700 font-medium transition-colors">Select a department to start chatting</p>
            </div>
            @else

            @foreach($chatMessages as $message)
            <div class="flex items-start space-x-3 {{ $message->sender_id === Auth::id() ? 'flex-row-reverse space-x-reverse' : '' }}">
                <!-- Avatar -->
                <div class="w-9 h-9 rounded-full overflow-hidden flex-shrink-0 border border-[#ffffff10] light:border-gray-200 transition-colors {{ $message->sender_id === Auth::id() ? 'ring-2 ring-[#31A871]/30' : '' }}">
                    @if($message->sender?->profile_photo)
                    <img src="{{ $message->sender?->profile_photo }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#234156] to-[#122333] light:from-gray-200 light:to-gray-300 text-white light:text-gray-700 text-[10px] font-bold transition-colors">
                        {{ substr($message->sender?->first_name ?? 'U', 0, 1) }}
                    </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="max-w-[70%] {{ $message->sender_id === Auth::id() ? 'text-right' : 'text-left' }}">
                    <div class="flex items-center space-x-2 mb-1 {{ $message->sender_id === Auth::id() ? 'flex-row-reverse space-x-reverse' : '' }}">
                        <span class="text-xs font-bold transition-colors {{ $message->sender_id === Auth::id() ? 'text-[#31A871]' : 'text-amber-400 light:text-amber-500' }}">
                            {{ $message->sender_id === Auth::id() ? 'You' : ucfirst($message->sender?->first_name ?? '') }}
                        </span>
                        <span class="text-[#ffffff40] light:text-gray-400 text-[9px] font-medium transition-colors">{{ $message->created_at->format('g:i A') }}</span>
                    </div>
                    <div class="relative group">
                        <p class="text-sm leading-relaxed transition-colors {{ $message->sender_id === Auth::id() ? 'bg-[#31A871] text-white rounded-l-2xl rounded-br-2xl' : 'bg-[#1f3548] light:bg-[#f1f5f9] text-[#ffffffdd] light:text-gray-800 rounded-r-2xl rounded-bl-2xl border border-transparent light:border-gray-200' }} px-4 py-2.5 shadow-sm">
                            {{ $message->message }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($chatMessages) === 0)
            <div class="flex flex-col items-center justify-center space-y-2 py-10 opacity-30 text-white light:text-gray-700 transition-colors">
                <i class="fa-solid fa-comments text-4xl"></i>
                <p class="text-xs">No messages yet. Say hello!</p>
            </div>
            @endif

            @endif
        </div>

        <!-- Message Input -->
        <div class="p-4 bg-[#1a3447]/50 light:bg-white/80 border-t border-[#ffffff10] light:border-gray-200 transition-colors">
            <form wire:submit.prevent="sendMessage" class="flex items-center space-x-3 bg-[#122333] light:bg-gray-100 p-1.5 rounded-2xl border border-[#ffffff05] light:border-gray-200 shadow-inner transition-colors">
                <input
                    type="text"
                    wire:model="newMessage"
                    placeholder="Message #{{ $selectedDepartmentId ? str_replace(' ', '', $departments->find($selectedDepartmentId)->category) : 'channel' }}..."
                    class="flex-1 bg-transparent text-white light:text-gray-900 text-sm px-4 py-2.5 focus:outline-none placeholder-[#ffffff30] light:placeholder-gray-500 transition-colors">

                <button type="submit" class="bg-[#31A871] hover:bg-[#288a5c] text-white p-2.5 rounded-xl transition-all duration-200 shadow-lg shadow-[#31A871]/20 flex items-center justify-center group">
                    <svg class="w-5 h-5 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <script>
        console.log('%c [System] Livewire Polling is ACTIVE (every 3s) ', 'background: #234156; color: #31A871; font-weight: bold; border-radius: 4px; padding: 2px 5px;');
    </script>
</div>