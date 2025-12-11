<div class="grid grid-cols-1 md:grid-cols-2 h-screen">
   
        <div class="relative hidden md:flex  items-center justify-center bg-cover bg-center"
             style="background-image: url('{{ asset('img/pedicab.png') }}')">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-[rgba(21,64,105,0.6)]"></div>
    
            <!-- Content on top of overlay -->
            <div class="relative text-white text-center flex pb-50 flex-col items-center justify-center space-y-5">
                <div class="w-70 h-auto"><img class="w-full h-auto" src="{{ asset('img/LOGO.png') }}" alt=""></div>
                <div class="space-y-2">
                    <p class="text-2xl font-semibold">Welcome to Tagum UYnite</p>
                     <p class="text-sm font-light">A space to share concerns, connect with the community, <br> and help improve our city together.</p>
            </div></div>
                
        </div>
   
    <div class="flex items-center justify-center">
        <div class="w-full max-w-md px-6">
            <div class="w-30 mb-4 block md:hidden h-auto mx-auto">
                <img src="{{ asset('img/logodark.png') }}" alt="">
            </div>
            <div class="text-center pb-3">
                <h2 class="text-black text-3xl font-medium ">Create your Account</h2>
                <p class="text-xs text-black font-light opacity-70 ">Fill in the details to continue</p>
            </div>
    
            <form wire:submit.prevent="submit" class="space-y-2 mt-3">
                <input class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="text" placeholder="First Name" wire:model="firstname" required>
                <input class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="text" placeholder="Last Name" wire:model="lastname" required>
                <select wire:model="barangay_id" class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="text" placeholder="Select Barangay" required>
                    <option value="" disabled hidden @selected($barangay_id === '')>
                        Select Barangay
                    </option>
                    @foreach ($barangays as $barangay)
                        <option value="{{ $barangay->id }}">{{ $barangay->barangay_name }}</option>
                    @endforeach
                </select>
                <input class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="text" placeholder="Purok/Street Name, Building, House No." wire:model="Street_Purok" required>
                <input class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="text" placeholder="Username" wire:model="username" required>
                <input class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="password" placeholder="Password" wire:model="password" required>
                <input class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="password" placeholder="Confirm Password" wire:model="confirm_password" required>
                <input class="bg-none  bg-[#31A871] hover:bg-[#2bc57d] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3" type="submit" value="Register">
                @if($showError)
                    <p class="text-red-400 text-xs mt-1">Please input all the fields correctly</p>
                @endif
                </form>
                <p class="text-black text-center text-xs mt-5 opacity-70">Already registered? <a href="/login" class="text-[#31A871]">Login</a></p>
            </div>
        </div>
    </div>
</div>
