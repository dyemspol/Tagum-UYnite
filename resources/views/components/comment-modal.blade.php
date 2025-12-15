<div
    id="commentModal"
    x-cloak
    x-show="$store.commentModal.open"
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-70 backdrop-blur-sm"
    @click.self="$store.commentModal.hide()"
>
        
    
    <div class="bg-[#182b3cd5] w-[90%] max-w-lg rounded-xl p-5 relative shadow-2xl">
        
      
        <button
            @click="$store.commentModal.hide()"
            class="absolute top-3 right-3 text-white hover:text-red-400 text-3xl leading-none transition-colors">
            &times;
        </button>

      
        <h2 class="text-white font-bold text-lg mb-4">Comments</h2>

     
        <div class="max-h-80 overflow-y-auto space-y-3 mb-4 pr-2 hide-scrollbar">
            
           
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=John+Doe&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">John Doe</p>
                        <span class="text-[10px] text-[#ffffff88]">2 hours ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        This is a great post! Thanks for sharing this valuable information with the community.
                    </p>
                </div>
            </div>

          
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Jane Smith</p>
                        <span class="text-[10px] text-[#ffffff88]">5 hours ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        I completely agree with this. We need more awareness about these issues in our barangay.
                    </p>
                </div>
            </div>

           
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Mike Johnson</p>
                        <span class="text-[10px] text-[#ffffff88]">1 day ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Has anyone else experienced this in their area? Would love to hear your thoughts.
                    </p>
                </div>
            </div>


           
            <div class="flex items-start space-x-2">
                <img src="https://ui-avatars.com/api/?name=Sarah+Lee&background=31A871&color=fff" 
                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                <div class="bg-[#1f3548] rounded-lg px-3 py-2 w-full">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-xs text-white font-medium">Sarah Lee</p>
                        <span class="text-[10px] text-[#ffffff88]">2 days ago</span>
                    </div>
                    <p class="text-xs text-[#ffffffc7] font-light">
                        Thank you for reporting this. The local officials should definitely look into this matter.
                    </p>
                </div>
            </div>

          
        </div>

        <!-- Add Comment Input -->
        <div class="flex items-center space-x-2 pt-3 border-t border-[#1f3548]">
            <img src="https://ui-avatars.com/api/?name=Current+User&background=31A871&color=fff" 
                 class="w-8 h-8 rounded-full object-cover flex-shrink-0">

            <input 
                type="text"
                placeholder="Write a comment..."
                class="w-full bg-[#1f3548] text-white text-xs px-3 py-2 rounded-xl outline-none focus:ring-2 focus:ring-[#31A871] placeholder:text-[#ffffff88] transition-all">

            <button class="text-[#31A871] hover:text-white transition-colors text-sm font-medium px-3 py-2 hover:bg-[#31A871] hover:bg-opacity-10 rounded-lg">
                Post
            </button>
        </div>

    </div>
</div>
