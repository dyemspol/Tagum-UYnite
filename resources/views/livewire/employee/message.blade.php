<div>
    <h2 class="text-xl font-semibold text-white mb-10">Messages</h2>
    <div class="bg-[#0f1f2e00] text-[#e6edf3] min-h-[600px] flex">
        <!-- Sidebar -->
        <aside class="w-60 bg-[#0b1a2800] p-5 border-r border-[#1f3346] flex flex-col">
            <h3 class="text-[#9fb3c8] text-sm mb-4 font-semibold">City Mayor's Office</h3>
            <ul class="space-y-2">
                <li class="cursor-pointer text-[#cbd5e1] hover:text-white">#city-hall</li>
                <li class="cursor-pointer text-[#718096]">#engineering</li>
            </ul>
        </aside>

        <!-- Main Chat -->
        <main class="flex-1 flex flex-col">
            <div class="flex-1 overflow-y-auto p-6 messages">
                <!-- Message 1 -->
                <div class="flex space-x-3 mb-6">
                    <div class="w-9 h-9 rounded-full bg-[#1f3346] flex-shrink-0"></div>
                    <div>
                        <div class="text-xs text-[#9fb3c8] font-semibold mb-1">City Engineering · 9:00</div>
                        <p class="text-sm leading-relaxed max-w-lg">
                            Received 3 new pothole reports from downtown. Logging them as high priority for tonight’s field team.
                        </p>
                    </div>
                </div>

                <!-- Message 2 -->
                <div class="flex space-x-3 mb-6">
                    <div class="w-9 h-9 rounded-full bg-[#1f3346] flex-shrink-0"></div>
                    <div>
                        <div class="text-xs text-[#9fb3c8] font-semibold mb-1">Traffic Management · 9:23</div>
                        <p class="text-sm leading-relaxed max-w-lg">
                            Will deploy an advisory to redirect vehicles between 8PM–10PM while works are ongoing.
                        </p>
                    </div>
                </div>

                <!-- Message 3 -->
                <div class="flex space-x-3 mb-6">
                    <div class="w-9 h-9 rounded-full bg-[#1f3346] flex-shrink-0"></div>
                    <div>
                        <div class="text-xs text-[#9fb3c8] font-semibold mb-1">You · 9:25</div>
                        <p class="text-sm leading-relaxed max-w-lg">
                            Please also update the Tagum Unify feed once the repair is marked resolved so residents are notified.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Input bar -->
            <form class="flex gap-3 p-4 bg-[#0b1a2800] border-t border-[#1f3346]">
                <input
                    type="text"
                    placeholder="Message #city-hall"
                    class="flex-1 rounded-md bg-[#0f1f2e] border border-[#1f3346] px-4 py-2 text-[#e6edf3] focus:outline-none focus:ring-2 focus:ring-[#2563eb]" />
                <button
                    type="submit"
                    class="bg-[#2563eb] px-5 py-2 rounded-md text-white font-semibold hover:bg-[#1e40af] transition">
                    Send
                </button>
            </form>
        </main>
    </div>
</div>