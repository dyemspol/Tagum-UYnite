<div id="loginModal" class="@if(!isset($showLoginModal) || !$showLoginModal) hidden @endif fixed inset-0 bg-[#000000a0] bg-opacity-50 flex items-center justify-center z-50">
    
    <div class="bg-gradient-to-b from-[#1F486C] to-[#0F1F2C] light:from-white light:to-[#f8fafc] w-[90%] p-6 max-w-[29em] rounded-xl light:border light:border-gray-200 shadow-xl transition-colors">
        <button wire:click="closeLoginModal" class="float-right text-sm text-2xl font-light cursor-pointer text-white light:text-gray-900 transition-colors">✕</button>
        
        <div class="w-15 h-auto mx-auto">
            <img src="{{ asset('img/LOGO.png') }}" alt="" class="light:hidden">
            <img src="{{ asset('img/LOGO_BLACK.png') }}" alt="" class="hidden light:block">
        </div>
        <div class="text-center my-2">
            <h2 class="text-white light:text-gray-900 text-lg font-medium transition-colors">Welcome Back!</h2>
            <p class="text-xs text-white light:text-gray-600 font-light opacity-70 transition-colors">Please enter your details to sign in</p>
        </div>

        <form wire:submit.prevent="submit" class="space-y-2 mt-3">
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] light:border-gray-300 rounded-sm w-full text-white light:text-gray-900 light:placeholder-gray-500 py-2 px-2 text-sm transition-colors" type="text" placeholder="Email or Username" wire:model="username">
            @error('username')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] light:border-gray-300 rounded-sm w-full text-white light:text-gray-900 light:placeholder-gray-500 py-2 px-2 text-sm transition-colors" type="password" placeholder="Password" wire:model="password">
            @error('password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
            <a href="#" class="" ><p class="text-right text-xs font-extralight text-white light:text-gray-600 hover:underline transition-colors">Forgot Password?</p></a>
            <input class="bg-none bg-[#2C5982] hover:bg-[#346a9d] light:bg-[#31A871] light:hover:bg-green-600 cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3 transition-colors" type="submit" value="LOGIN">
            @error('error_message')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </form>
            <p class="text-white light:text-gray-600 text-center text-xs mt-5 opacity-70 transition-colors">No Account Yet? <a id="openSignup" href="{{ route('signup') }}" class="text-[#31A871] hover:underline">Register Now</a></p>
    </div>
</div>


