<div id="loginModal" class="@if(!isset($showLoginModal) || !$showLoginModal) hidden @endif fixed inset-0 bg-[#000000a0] bg-opacity-50 flex items-center justify-center z-50">
    
    <div class="bg-gradient-to-b from-[#1F486C] to-[#0F1F2C] w-[90%] p-6 max-w-[29em] rounded-xl">
        <button wire:click="closeLoginModal" class="float-right text-2xl font-light">✕</button>
        
        <div class="w-15 h-auto mx-auto">
            <img src="{{ asset('img/LOGO.png') }}" alt="">
        </div>
        <div class="text-center my-2">
            <h2 class="text-white text-lg font-medium ">Welcome Back!</h2>
            <p class="text-xs text-white font-light opacity-70 ">Please enter your details to sign in</p>
        </div>

        <form wire:submit.prevent="submit" class="space-y-2 mt-3">
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="text" placeholder="Email or Username" wire:model="username">
            @error('username')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="password" placeholder="Password" wire:model="password">
            @error('password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
            <a href="#" class="" ><p class="text-right text-xs font-extralight text-white">Forgot Password?</p></a>
            <input class="bg-none  bg-[#2C5982] hover:bg-[#346a9d] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3" type="submit" value="LOGIN">
            @error('error_message')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </form>
            <p class="text-white text-center text-xs mt-5 opacity-70">No Account Yet? <a id="openSignup" href="{{ route('signup') }}" class="text-[#31A871]">Register Now</a></p>
    </div>
</div>


