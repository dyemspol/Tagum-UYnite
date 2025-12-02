<div id="signupModal" class="fixed hidden  inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm flex justify-center items-center">
    <div class="bg-gradient-to-b from-[#1F486C] to-[#0F1F2C] w-[90%] p-6 max-w-[29em] rounded-xl py-10">
        <div class="w-15 h-auto mx-auto">
            <img src="{{ asset('img/LOGO.png') }}" alt="">
        </div>
        <div class="text-center my-2">
            <h2 class="text-white text-lg font-medium ">Create your Account</h2>
            <p class="text-xs text-white font-light opacity-70 ">Fill in the details to continue</p>
        </div>

        <form wire:submit.prevent="submit" class="space-y-2 mt-3">
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="text" placeholder="First Name" wire:model="firstname">
            @error('firstname')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="text" placeholder="Last Name" wire:model="lastname">
            @error('lastname')
                 <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
           
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="text" placeholder="Username" wire:model="username">
            @error('username')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
            
            <select wire:model="barangay_id" class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="text" placeholder="Select Barangay">
                <option value="" disabled hidden @selected($barangay_id === '')>
                    Select Barangay
                </option>
               @foreach ($barangays as $barangay)
                <option value="{{ $barangay->id }}">{{ $barangay->barangay_name }}</option>
               @endforeach
                
            </select>
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="text" placeholder="Purok/Street Name, Building, House No." wire:model="Street_Purok">
            @error('Street_Purok')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
          
            
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="password" placeholder="Password" wire:model="password">
            @error('password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="password" placeholder="Confirm Password" wire:model="confirm_password">
            @error('confirm_password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
            <input class=" bg-[#2C5982] hover:bg-[#346a9d] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3" type="submit" value="Register">
        </form>
            <p class="text-white text-center text-xs mt-5 opacity-70"> Already registered? <a id="openLogin" href="" class="text-[#31A871]">Login</a></p>
    </div>
</div>
