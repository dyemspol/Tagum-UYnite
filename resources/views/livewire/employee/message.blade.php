<div>
    <div class="bg-[#0f1117] text-[#e6edf3] h-[calc(100vh-48px)] flex overflow-hidden rounded-2xl border border-[#2a2d3a]">
        <!-- Sidebar -->
        <aside class="w-80 bg-[#12151e] p-5 border-r border-[#2a2d3a] flex flex-col rounded-l-lg overflow-y-auto hide-scrollbar">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-white tracking-tight">Messages</h2>
            </div>

            <ul class="space-y-4">
                @forelse ($conversations as $conversation)
                <li wire:click="selectedConversation({{ $conversation->id }})"
                    class="flex items-center gap-3 cursor-pointer group p-3 rounded-2xl transition-all border border-transparent hover:border-[#2a2d3a] {{ $selectedConversationId == $conversation->id ? 'bg-[#1a1d29] border-[#2a2d3a]' : 'hover:bg-[#1a1d29]/50 opacity-70 hover:opacity-100' }}">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full border-2 border-[#2a2d3a] p-0.5">
                            <div class="w-full h-full rounded-full overflow-hidden bg-[#1a1d29]">
                                <img src="{{ $conversation->user->profile_photo ?? asset('img/noprofile.jpg') }}" alt="{{ $conversation->user->first_name }}" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-center mb-0.5">
                            <h4 class="text-sm font-bold text-white truncate">{{ $conversation->user->first_name }} {{ $conversation->user->last_name }}</h4>
                            <span class="text-[10px] text-gray-500 font-medium">{{ $conversation->updated_at->shortRelativeDiffForHumans() }}</span>
                        </div>
                        <p class="text-[11px] text-gray-500 truncate">Click to chat</p>
                    </div>
                </li>
                @empty
                <div class="text-center py-10 opacity-40">
                    <p class="text-xs">No active conversations</p>
                </div>
                @endforelse
            </ul>
        </aside>

        <!-- Main Chat -->
        <main class="flex-1 flex flex-col bg-[#0f1117]">
            @if($selectedConversationId)
            <!-- Chat Header -->
            <div class="p-4 border-b border-[#2a2d3a] flex items-center justify-between bg-[#12151e]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full overflow-hidden border border-[#2a2d3a] bg-[#1a1d29]">
                        <img src="{{ $activeConversation->user?->profile_photo ?? asset('img/noprofile.jpg') }}" alt="{{ $activeConversation->user->first_name }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">{{ $activeConversation->user->first_name }} {{ $activeConversation->user->last_name }}</h4>
                        <div class="flex items-center gap-1.5 line-clamp-1">
                            <span class="text-[10px] text-gray-400">Department Resident</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            <div x-init="$el.scrollTop = $el.scrollHeight"
                x-on:message-received-log.window="$nextTick(() => { $el.scrollTop = $el.scrollHeight })"
                class="flex-1 overflow-y-auto p-8 messages flex flex-col gap-6 hide-scrollbar scroll-smooth">
                @forelse($chatMessages as $message)
                @if($message->sender_id === Auth::id())
                <!-- Sent (Right) -->
                <div class="flex flex-row-reverse gap-3 self-end max-w-[80%]">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-[#00d4aa]">
                        @if(Auth::user()->profile_photo)
                        <img src="{{ Auth::user()->profile_photo ?? asset('img/noprofile.jpg') }}" class="w-full h-full rounded-full object-cover">
                        @else
                        <span class="text-[#0f1117] text-xs font-bold">{{ substr(Auth::user()->first_name, 0, 1) }}</span>
                        @endif
                    </div>
                    <div class="flex flex-col items-end">
                        <div class="bg-[#00d4aa] text-[#0f1117] p-4 rounded-2xl rounded-tr-none text-sm font-medium shadow-lg shadow-[#00d4aa]/10">
                            {{ $message->message }}
                        </div>
                        <span class="text-[10px] text-gray-500 mt-1 mr-1">{{ $message->created_at->format('g:i A') }}</span>
                    </div>
                </div>
                @else
                <!-- Received (Left) -->
                <div class="flex gap-3 max-w-[80%]">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-[#252836] border border-[#2a2d3a] overflow-hidden">
                        <img src="{{ $activeConversation->user->profile_photo ?? asset('img/noprofile.jpg') }}" alt="User" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="bg-[#252836] text-gray-200 p-4 rounded-2xl rounded-tl-none text-sm leading-relaxed shadow-sm">
                            {{ $message->message }}
                        </div>
                        <span class="text-[10px] text-gray-500 mt-1 ml-1">{{ $message->created_at->format('g:i A') }}</span>
                    </div>
                </div>
                @endif
                @empty
                <div class="flex flex-col items-center justify-center h-full opacity-30 mt-20">
                    <i class="fa-solid fa-comment-dots text-5xl mb-4"></i>
                    <p class="text-sm">No messages yet. Start the conversation!</p>
                </div>
                @endforelse
            </div>

            <!-- Input bar -->
            <div class="p-6 bg-[#12151e] border-t border-[#2a2d3a]">
                <form wire:submit.prevent="sendMessage" class="flex items-center gap-4 bg-[#1a1d29] border border-[#2a2d3a] rounded-2xl px-4 py-2 focus-within:ring-2 focus-within:ring-[#00d4aa]/30 transition-all">
                    <i class="fa-solid fa-circle-plus text-gray-500 hover:text-[#00d4aa] cursor-pointer text-lg"></i>
                    <input
                        wire:model="newMessage"
                        type="text"
                        placeholder="Type a message..."
                        class="flex-1 bg-transparent border-none py-2 text-sm text-[#e6edf3] focus:outline-none placeholder-gray-600" />
                    <button type="submit" class="w-10 h-10 bg-[#00d4aa] rounded-xl flex items-center justify-center text-[#0f1117] hover:scale-105 active:scale-95 transition-all shadow-lg shadow-[#00d4aa]/10">
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                    </button>
                </form>
            </div>
            @else
            <div class="flex-1 flex flex-col items-center justify-center text-center p-10">
                <div class="w-20 h-20 bg-[#12151e] rounded-full flex items-center justify-center mb-6 border border-[#2a2d3a]">
                    <i class="fa-solid fa-comments text-3xl text-gray-600"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Your Conversations</h3>
                <p class="text-gray-500 max-w-xs text-sm">Select a resident from the sidebar to start a secure conversation about city reports.</p>
            </div>
            @endif
        </main>
    </div>
</div>