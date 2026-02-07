<div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-4 px-5 sm:px-10 mt-8" wire:poll.3s="refreshMessages">
    <!-- Left Sidebar - Departments -->
    <div class="bg-[#1a3447] rounded-lg p-6">
        <h2 class="text-white text-xl font-semibold mb-6">Departments</h2>
        
        <div class="space-y-3">
        <div class="space-y-3">
            @foreach ($departments as $department)
            <a wire:click="selectDepartment({{ $department->id }})" 
               class="cursor-pointer flex items-center space-x-3 text-gray-300 hover:text-white hover:bg-[#234156] p-3 rounded-lg transition"
               :class="{'bg-[#234156]': @json($selectedDepartmentId) == {{ $department->id }}}">
                <span class="text-sm">{{ $department->department_name }}</span>
                <span class="text-xs text-gray-500">#{{ $department->category }}</span>
            </a>
            @endforeach
        </div>
        </div>
    </div>

    <!-- Right Content Area - Messages -->
    <div class="bg-[#1a3447] rounded-lg flex flex-col h-[calc(100vh-200px)]">
        <!-- Header -->
        <div class="border-b border-gray-700 p-6">
            <h2 class="text-white text-xl font-semibold">
                @if($selectedDepartmentId)
                    {{ $departments->find($selectedDepartmentId)->department_name }}
                @else
                    Select a Chat
                @endif
            </h2>
        </div>

        <!-- Messages Area -->
        <div class="flex-1 overflow-y-auto p-6 space-y-4">
            
            @if(!$selectedDepartmentId)
                <div class="flex h-full items-center justify-center">
                    <p class="text-gray-400">Select a department to start chatting</p>
                </div>
            @else

            @foreach($chatMessages as $message)
                <div class="flex items-start space-x-3 {{ $message->sender_id === Auth::id() ? 'flex-row-reverse space-x-reverse' : '' }}">
                    <!-- Avatar -->
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 {{ $message->sender_id === Auth::id() ? 'bg-green-500' : 'bg-yellow-500' }}">
                        <span class="text-white text-xs font-bold">
                            {{ substr($message->sender->first_name, 0, 1) }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="{{ $message->sender_id === Auth::id() ? 'text-right' : 'text-left' }}">
                        <div class="flex items-center space-x-2 {{ $message->sender_id === Auth::id() ? 'flex-row-reverse space-x-reverse' : '' }}">
                            <span class="font-semibold {{ $message->sender_id === Auth::id() ? 'text-green-500' : 'text-yellow-500' }}">
                                {{ $message->sender_id === Auth::id() ? 'You' : $message->sender->first_name }}
                            </span>
                            <span class="text-gray-500 text-xs">{{ $message->created_at->format('g:i A') }}</span>
                        </div>
                        <p class="text-gray-300 text-sm mt-1 bg-[#0d1f2d] p-2 rounded-lg inline-block text-left">
                            {{ $message->message }}
                        </p>
                    </div>
                </div>
            @endforeach

            @if(count($chatMessages) === 0)
                <p class="text-gray-500 text-center mt-10">No messages yet. Say hello!</p>
            @endif

            @endif
        </div>

        <!-- Message Input -->
        <div class="border-t border-gray-700 p-4">
            <form wire:submit.prevent="sendMessage" class="flex items-center space-x-2">
                <input 
                    type="text" 
                    wire:model="newMessage"
                    placeholder="Type a message..." 
                    class="flex-1 bg-[#0d1f2d] text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                    Send
                </button>
            </form>
        </div>
    </div>
    <script>
        console.log('%c [System] Livewire Polling is ACTIVE (every 3s) ', 'background: #234156; color: #31A871; font-weight: bold; border-radius: 4px; padding: 2px 5px;');
    </script>
</div>
