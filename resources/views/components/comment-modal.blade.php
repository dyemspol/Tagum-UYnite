<div id="commentModal" 
    class="fixed inset-0 z-50 hidden items-center justify-center bg-[#000000b6] bg-opacity-70 backdrop-blur-sm px-4">
    
    <div class="bg-[#182b3c] w-full max-w-lg md:max-w-xl rounded-xl relative shadow-2xl flex flex-col max-h-[90vh]">
        
        
        <button id="commentModalX" class="absolute top-3 right-3 text-white/70 hover:text-white text-2xl leading-none transition-colors z-30 p-2 bg-black/20 rounded-full w-8 h-8 flex items-center justify-center">
            &times;
        </button>

       
        <div class="px-5 py-3 border-b border-[#ffffff10] flex-shrink-0 bg-[#182b3c] rounded-t-xl z-20">
             <h2 class="text-white font-bold text-lg text-center">Post Details</h2>
        </div>

        
        <div class="overflow-y-auto hide-scrollbar custom-scrollbar flex-1 p-0 relative">
            
           
            <div class="bg-[#182b3cd5] pb-2">
                
               
                <div class="flex px-5 py-3 gap-3 items-center justify-between">
                   <div class="space-x-3 flex items-center">
                     <div class="w-10 h-10">
                        <img class="w-full h-full rounded-full object-cover"
                             src="{{ asset('img/noprofile.jpg') }}" 
                             alt="User">
                     </div>
                     <div>
                         <p class="font-normal text-sm text-white">Full Name</p>
                         <p class="font-light text-[#ffffffa4] text-xs">
                            Just now <span>•</span> Location
                         </p>
                    </div>
                </div>
                <div>
                    <span class="text-xs bg-amber-400 rounded-2xl px-2 py-0.5 text-black font-medium">
                        Pending
                    </span>
                </div>
            </div>

            <!-- Post Content -->
            <div class="px-5 pb-2">
                <h3 class="text-white font-bold text-sm mb-1">Post Title</h3>
                <p class="text-sm font-light text-white leading-relaxed line-clamp-3">
                    This is a sample post content to demonstrate the layout. The postcard content is now visible directly above the comments section, just like in the Facebook details view.
                </p>
            </div>

            <!-- Post Media (Carousel Placeholder) -->
            <!-- Using the same aspect ratio and style as PostCard -->
            <div class="w-full h-64 bg-black/20 flex items-end justify-center mb-2 relative group overflow-hidden">
                 <!-- Placeholder Image -->
                 <div class="absolute inset-0 flex items-center justify-center text-[#ffffff50] bg-[#0f1b26]">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="text-xs">Media Content</span>
                    </div>
                 </div>
            </div>
            
            <!-- Like/Dislike Counts (Visual Only, No Buttons) -->
            <div class="px-5 py-2 flex items-center space-x-4">
                 
                 <div class="flex items-center space-x-1">
                     <span class="text-[#ffffffa4] text-xs">3 comments</span>
                 </div>
            </div>

            <!-- Separator -->
            <div class="border-b border-[#ffffff10] mx-5 mb-2"></div>

            <!-- COMMENTS SECTION (Bottom) -->
            <div class="px-5 pt-2">
                 <!-- Comment List -->
                 <div class="space-y-4 pb-4">
                    
                    <!-- Comment 1 -->
                    <div class="flex items-start space-x-2">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=31A871&color=fff" 
                             class="w-8 h-8 rounded-full object-cover flex-shrink-0 mt-1">
                        <div class="flex-1">
                            <div class="bg-[#1f3548] rounded-2xl px-3 py-2 inline-block max-w-full">
                                <p class="text-xs text-white font-bold hover:underline cursor-pointer">John Doe</p>
                                <p class="text-sm text-[#ffffffdd] font-light">
                                    This is a great post! Similar to the Facebook detail view.
                                </p>
                            </div>
                            <div class="flex items-center space-x-3 mt-1 ml-2">
                                <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Like</span>
                                <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Reply</span>
                                <span class="text-[10px] text-[#ffffff66]">2h</span>
                            </div>
                        </div>
                    </div>

                    <!-- Comment 2 -->
                    <div class="flex items-start space-x-2">
                        <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=31A871&color=fff" 
                             class="w-8 h-8 rounded-full object-cover flex-shrink-0 mt-1">
                        <div class="flex-1">
                            <div class="bg-[#1f3548] rounded-2xl px-3 py-2 inline-block max-w-full">
                                <p class="text-xs text-white font-bold hover:underline cursor-pointer">Jane Smith</p>
                                <p class="text-sm text-[#ffffffdd] font-light">
                                    I agree, the layout is much better now.
                                </p>
                            </div>
                            <div class="flex items-center space-x-3 mt-1 ml-2">
                                <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Like</span>
                                <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Reply</span>
                                <span class="text-[10px] text-[#ffffff66]">5h</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comment 3 -->
                    <div class="flex items-start space-x-2">
                        <img src="https://ui-avatars.com/api/?name=Mike+J&background=31A871&color=fff" 
                             class="w-8 h-8 rounded-full object-cover flex-shrink-0 mt-1">
                        <div class="flex-1">
                            <div class="bg-[#1f3548] rounded-2xl px-3 py-2 inline-block max-w-full">
                                <p class="text-xs text-white font-bold hover:underline cursor-pointer">Mike Johnson</p>
                                <p class="text-sm text-[#ffffffdd] font-light">
                                    Agreed!
                                </p>
                            </div>
                            <div class="flex items-center space-x-3 mt-1 ml-2">
                                <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Like</span>
                                <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Reply</span>
                                <span class="text-[10px] text-[#ffffff66]">1d</span>
                            </div>
                        </div>
                    </div>
                     <!-- Comment 4 -->
                    <div class="flex items-start space-x-2">
                        <img src="https://ui-avatars.com/api/?name=Sample+User&background=31A871&color=fff" 
                             class="w-8 h-8 rounded-full object-cover flex-shrink-0 mt-1">
                        <div class="flex-1">
                            <div class="bg-[#1f3548] rounded-2xl px-3 py-2 inline-block max-w-full">
                                <p class="text-xs text-white font-bold hover:underline cursor-pointer">Sample User</p>
                                <p class="text-sm text-[#ffffffdd] font-light">
                                    Another comment to test scrolling.
                                </p>
                            </div>
                            <div class="flex items-center space-x-3 mt-1 ml-2">
                                <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Like</span>
                                <span class="text-[10px] text-[#ffffff88] font-medium cursor-pointer hover:underline">Reply</span>
                                <span class="text-[10px] text-[#ffffff66]">1d</span>
                            </div>
                        </div>
                    </div>

                 </div>
            </div>
          </div>
        </div>

        <!-- Floating/Sticky Input Section -->
        <div class="p-3 bg-[#182b3c] border-t border-[#ffffff10] flex-shrink-0 rounded-b-xl z-20">
            <div class="flex items-center space-x-2">
                <img src="{{ auth()->user()->profile_photo ?? asset('img/noprofile.jpg') }}" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">

                <div class="flex-1 relative">
                    <input type="text" placeholder="Write a comment..."
                        class="w-full bg-[#1f3548] text-white text-sm px-4 py-2 rounded-full outline-none focus:ring-1 focus:ring-[#31A871] placeholder:text-[#ffffff88] transition-all">
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 text-[#31A871] hover:text-white p-1 rounded-full aspect-square flex items-center justify-center">
                         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                </div>
           </div>
        </div>

    </div>
</div>
