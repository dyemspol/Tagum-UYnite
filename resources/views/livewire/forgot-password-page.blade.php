<div class="grid grid-cols-1 md:grid-cols-2 h-screen max-w-[]">

    <!-- LEFT SIDE -->
    <div class="relative hidden md:flex items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('img/palm.png') }}')">

        <div class="absolute inset-0 bg-[rgba(21,64,105,0.6)]"></div>

        <div class="relative text-white text-center flex pb-50 flex-col items-center justify-center space-y-5">
            <div class="w-70 h-auto">
                <img class="w-full h-auto" src="{{ asset('img/LOGO.png') }}" alt="">
            </div>
            <div class="space-y-2">
                <p class="text-2xl font-semibold">Forgot Password</p>
                <p class="text-sm font-light">
                    Enter your email address and we'll send you <br>
                    a link to reset your password.
                </p>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE -->
    <div class="flex items-center justify-center">
        <div class="w-[25em]">

            <div class="w-30 mb-4 block md:hidden h-auto mx-auto">
                <img src="{{ asset('img/logodark.png') }}" alt="">
            </div>

            <div class="text-center pb-3">
                <h2 class="text-black text-3xl font-medium">Forgot Password</h2>
                <p class="text-xs text-black font-light opacity-70">
                    Enter your email to receive a reset link
                </p>
            </div>

            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="sendResetLink" class="space-y-3 mt-3">

                <!-- EMAIL INPUT -->
                <input
                    class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm"
                    type="email"
                    placeholder="Email Address"
                    wire:model="email"
                    wire:focus="clearFieldError('email')"
                >

                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror

                @if ($showError && !$errors->has('email'))
                    <p class="text-red-400 text-xs mt-1">
                        Please enter a valid email address.
                    </p>
                @endif

                <!-- BUTTON -->
                <input
                    class="bg-[#31A871] hover:bg-[#2bc57d] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3"
                    type="submit"
                    value="SEND RESET LINK"
                >

            </form>

            <p class="text-black text-center text-xs mt-5 opacity-70">
                Remember your password?
                <a href="/login" class="text-[#31A871]">Back to Login</a>
            </p>

        </div>
    </div>
</div>

