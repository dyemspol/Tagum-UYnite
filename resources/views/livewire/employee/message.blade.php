<div>
    <!-- <h2 class="text-xl font-semibold text-white mb-10">Messages</h2> -->
    <div class="bg-[#0f1117] text-[#e6edf3] h-[calc(100vh-48px)] flex overflow-hidden rounded-2xl border border-[#2a2d3a]">
        <!-- Sidebar -->
        <aside class="w-80 bg-[#12151e] p-5 border-r border-[#2a2d3a] flex flex-col rounded-l-lg">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-white tracking-tight">Messages</h2>
                
            </div>

            <ul class="space-y-4 overflow-y-auto hide-scrollbar">
                <li class="flex items-center gap-3 cursor-pointer group p-3 rounded-2xl hover:bg-[#1a1d29] transition-all border border-transparent hover:border-[#2a2d3a] bg-[#1a1d29] border-[#2a2d3a]">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full border-2  p-0.5">
                            <div class="w-full h-full rounded-full overflow-hidden">
                                <img src="{{ asset('img/user1.jpg') }}" alt="Juan" class="w-full h-full object-cover">
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-center mb-0.5">
                            <h4 class="text-sm font-bold text-white truncate">Juan Dela Cruz</h4>
                            <span class="text-[10px] text-gray-500 font-medium">1m</span>
                        </div>
                        <p class="text-[11px] text-[#00d4aa] truncate font-bold">Unsa na balita sa bangag?</p>
                    </div>
                </li>

                <li class="flex items-center gap-3 cursor-pointer group p-3 rounded-2xl hover:bg-[#1a1d29] transition-all border border-transparent hover:border-[#2a2d3a] opacity-60">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full border-2 border-[#12151e] overflow-hidden">
                            <img src="{{ asset('img/user2.jpg') }}" alt="Maria" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-center mb-0.5">
                            <h4 class="text-sm font-bold text-white truncate">Maria Santos</h4>
                            <span class="text-[10px] text-gray-500 font-medium">36m</span>
                        </div>
                        <p class="text-[11px] text-gray-500 truncate">Sige sir, noted na.</p>
                    </div>
                </li>

                <li class="flex items-center gap-3 cursor-pointer group p-3 rounded-2xl hover:bg-[#1a1d29] transition-all border border-transparent hover:border-[#2a2d3a] opacity-60">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full border-2 border-[#12151e] overflow-hidden">
                            <img src="{{ asset('img/user3.jpg') }}" alt="Pedro" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-center mb-0.5">
                            <h4 class="text-sm font-bold text-white truncate">Pedro Penduko</h4>
                            <span class="text-[10px] text-gray-500 font-medium">1h</span>
                        </div>
                        <p class="text-[11px] text-gray-500 truncate">Humana to og ayo ganina.</p>
                    </div>
                </li>
            </ul>
        </aside>

        <!-- Main Chat -->
        <main class="flex-1 flex flex-col bg-[#0f1117]">
            <!-- Chat Header -->
            <div class="p-4 border-b border-[#2a2d3a] flex items-center justify-between bg-[#12151e]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full overflow-hidden border border-[#2a2d3a]">
                        <img src="{{ asset('img/user1.jpg') }}" alt="Juan" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">Juan Dela Cruz</h4>
                        <div class="flex items-center gap-1.5">
                          
                           
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="flex-1 overflow-y-auto p-8 messages flex flex-col gap-6 hide-scrollbar">
                <!-- Received -->
                <div class="flex gap-3 max-w-[80%]">
                    <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0 border border-[#2a2d3a]">
                        <img src="{{ asset('img/user1.jpg') }}" alt="Juan" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="bg-[#252836] text-gray-200 p-4 rounded-2xl rounded-tl-none text-sm leading-relaxed shadow-sm">
                            Naay 3 ka bag-ong reports sa mga bangag sa kalsada sa downtown, sir. Murag delikado na para sa mga motorista.
                        </div>
                        <span class="text-[10px] text-gray-500 mt-1 ml-1">9:00 AM</span>
                    </div>
                </div>

                <!-- Received -->
                <div class="flex gap-3 max-w-[80%]">
                    <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0 border border-[#2a2d3a]">
                        <img src="{{ asset('img/user1.jpg') }}" alt="Juan" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="bg-[#252836] text-gray-200 p-4 rounded-2xl rounded-tl-none text-sm leading-relaxed shadow-sm">
                            Unsa na balita ani? Na-deploy na ba ang taga-Engineering?
                        </div>
                        <span class="text-[10px] text-gray-500 mt-1 ml-1">9:23 AM</span>
                    </div>
                </div>

                <!-- Sent -->
                <div class="flex flex-row-reverse gap-3 self-end max-w-[80%]">
                    <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0 border border-[#00d4aa]/30">
                        <img src="{{ asset('img/noprofile.jpg') }}" alt="You" class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col items-end">
                        <div class="bg-[#00d4aa] text-[#0f1117] p-4 rounded-2xl rounded-tr-none text-sm font-medium leading-relaxed shadow-lg shadow-[#00d4aa]/10">
                            Sige, i-update lang pud ang Tagum Unify feed inig mahuman na og ayo sa taga Engineering para aware ang tanan.
                        </div>
                        <span class="text-[10px] text-gray-500 mt-1 mr-1 text-right">9:25 AM</span>
                    </div>
                </div>
            </div>

            <!-- Input bar -->
            <div class="p-6 bg-[#12151e] border-t border-[#2a2d3a]">
                <div class="flex items-center gap-4 bg-[#1a1d29] border border-[#2a2d3a] rounded-2xl px-4 py-2 focus-within:ring-2 focus-within:ring-[#00d4aa]/30 transition-all">
                    <i class="fa-solid fa-circle-plus text-gray-500 hover:text-[#00d4aa] cursor-pointer text-lg"></i>
                    <i class="fa-solid fa-image text-gray-500 hover:text-[#00d4aa] cursor-pointer text-lg"></i>
                    <input
                        type="text"
                        placeholder="Write a message in Bisaya..."
                        class="flex-1 bg-transparent border-none py-2 text-sm text-[#e6edf3] focus:outline-none placeholder-gray-600" />
                    <button class="w-10 h-10 bg-[#00d4aa] rounded-xl flex items-center justify-center text-[#0f1117] hover:scale-105 active:scale-95 transition-all shadow-lg shadow-[#00d4aa]/10">
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>
</div>