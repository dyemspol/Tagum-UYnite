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
                <p class="text-2xl font-semibold">Reset Password</p>
                <p class="text-sm font-light">
                    Enter your new password to reset <br>
                    your account password.
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
                <h2 class="text-black text-3xl font-medium">Reset Password</h2>
                <p class="text-xs text-black font-light opacity-70">
                    Enter your new password below
                </p>
            </div>

            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="resetPassword" class="space-y-3 mt-3">

                <!-- EMAIL INPUT (Hidden/Read-only) -->
                <input
                    class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm"
                    type="email"
                    placeholder="Email Address"
                    wire:model="email"
                    readonly
                    wire:focus="clearFieldError('email')"
                >

                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror

                <!-- PASSWORD INPUT -->
                <div class="relative">
                    <input
                        id="password"
                        class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 pr-8 text-sm"
                        type="password"
                        placeholder="New Password"
                        wire:model="password"
                        wire:focus="clearFieldError('password')"
                    >
                    <i class="fa-regular fa-eye absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600"
                        onclick="togglePassword('password', this)"></i>
                </div>

                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror

                <!-- CONFIRM PASSWORD INPUT -->
                <div class="relative">
                    <input
                        id="password_confirmation"
                        class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 pr-8 text-sm"
                        type="password"
                        placeholder="Confirm New Password"
                        wire:model="password_confirmation"
                        wire:focus="clearFieldError('password_confirmation')"
                    >
                    <i class="fa-regular fa-eye absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600"
                        onclick="togglePassword('password_confirmation', this)"></i>
                </div>

                @error('password_confirmation')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror

                @if ($showError && !$errors->has('password') && !$errors->has('password_confirmation') && !$errors->has('email'))
                    <p class="text-red-400 text-xs mt-1">
                        Invalid or expired reset token. Please request a new password reset link.
                    </p>
                @endif

                <!-- BUTTON -->
                <input
                    class="bg-[#31A871] hover:bg-[#2bc57d] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3"
                    type="submit"
                    value="RESET PASSWORD"
                >

            </form>

            <p class="text-black text-center text-xs mt-5 opacity-70">
                Remember your password?
                <a href="/login" class="text-[#31A871]">Back to Login</a>
            </p>

        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, icon) {
        const input = document.getElementById(inputId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

