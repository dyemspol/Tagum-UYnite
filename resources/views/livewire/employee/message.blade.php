<div>
    <h2 class="text-xl font-semibold text-white mb-10">Messages</h2>
    <div class="bg-[#0f1117] text-[#e6edf3] min-h-[600px] flex">
        <!-- Sidebar -->
        <aside class="w-60 bg-[#12151e] p-5 border-r border-[#2a2d3a] flex flex-col rounded-l-lg">
            <h3 class="text-[#9fb3c8] text-sm mb-4 font-semibold">Residents </h3>
            <ul class="space-y-2">
                @foreach ($conversations as $conversation)
                <li class="cursor-pointer text-[#cbd5e1] hover:text-white" wire:click="selectedConversation({{ $conversation->id }})">{{ ucfirst($conversation->user->first_name) }} {{ ucfirst($conversation->user->last_name) }}</li>
                @endforeach
            </ul>
        </aside>

        <!-- Main Chat -->
        <main class="flex-1 flex flex-col">
            <div class="flex-1 overflow-y-auto p-6 messages">
                @if(!$selectedConversationId)
                <div class="flex items-center justify-center h-full">
                    <p class="text-gray-500">Select a conversation to start messaging</p>
                </div>
                @else
                @foreach($chatMessages as $message)
                <div class="flex items-start space-x-3 {{ $message->sender_id === Auth::id() ? 'flex-row-reverse space-x-reverse' : '' }}">
                    <!-- Avatar -->
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 {{ $message->sender_id === Auth::id() ? 'bg-green-500' : 'bg-yellow-500' }}">
                        @if($message->sender?->profile_photo)
                        <img src="{{ $message->sender?->profile_photo ?? '' }}" class="w-full h-full rounded-full object-cover">
                        @else
                        <span class="text-white text-xs font-bold">
                            {{ substr($message->sender?->first_name ?? 'U', 0, 1) }}
                        </span>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="{{ $message->sender_id === Auth::id() ? 'text-right' : 'text-left' }}">
                        <div class="flex items-center space-x-2 {{ $message->sender_id === Auth::id() ? 'flex-row-reverse space-x-reverse' : '' }}">
                            <span class="font-semibold {{ $message->sender_id === Auth::id() ? 'text-green-500' : 'text-yellow-500' }}">
                                {{ ucfirst($message->sender?->first_name ?? 'You') }}
                            </span>
                            <span class="text-gray-500 text-xs">{{ $message->created_at->format('g:i A') }}</span>
                        </div>
                        <p class="text-gray-300 text-sm mt-1 bg-[#0d1f2d] p-2 rounded-lg inline-block text-left">
                            {{ $message->message }}
                        </p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            <!-- Input bar -->
            <form wire:submit.prevent="sendMessage" class="flex gap-3 p-4 bg-[#12151e] border-t border-[#2a2d3a]">
                <input
                    wire:model="newMessage"
                    type="text"
                    placeholder="Message #city-hall"
                    class="flex-1 rounded-md bg-[#1a1d29] border border-[#2a2d3a] px-4 py-2 text-[#e6edf3] focus:outline-none focus:ring-2 focus:ring-[#00d4aa]" />
                <button
                    type="submit"
                    class="bg-[#00d4aa] px-5 py-2 rounded-md text-[#0f1117] font-semibold hover:bg-[#00e6b8] transition">
                    Send
                </button>
            </form>
        </main>
    </div>
</div>