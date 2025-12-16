  <div class="grid grid-cols-1 md:grid-cols-2 h-screen max-w-[]">

      <div class="relative hidden md:flex items-center justify-center bg-cover bg-center"
          style="background-image: url('{{ asset('img/palm.png') }}')">
          <!-- Overlay -->
          <div class="absolute inset-0 bg-[rgba(21,64,105,0.6)]"></div>

          <!-- Content on top of overlay -->
          <div class="relative text-white text-center flex pb-50 flex-col items-center justify-center space-y-5">
              <div class="w-70 h-auto"><img class="w-full h-auto" src="{{ asset('img/LOGO.png') }}" alt=""></div>
              <div class="space-y-2">
                  <p class="text-2xl font-semibold">Welcome to Tagum UYnite</p>
                  <p class="text-sm font-light">A space to share concerns, connect with the community, <br> and help
                      improve our city together.</p>
              </div>
          </div>

      </div>

      <div class="flex items-center justify-center ">
          <div class="w-[25em]">
              <div class="w-30 mb-4 block md:hidden h-auto mx-auto">
                  <img src="{{ asset('img/logodark.png') }}" alt="">
              </div>
              <div class="text-center pb-3">
                  <h2 class="text-black text-3xl font-medium ">Welcome Back!</h2>
                  <p class="text-xs text-black font-light opacity-70 ">Please enter your details to sign in</p>
              </div>

              <form wire:submit.prevent="submit" class="space-y-2 mt-3">
                  <input
                      class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm"
                      type="text" placeholder="Email or Username" wire:model="username"
                      wire:focus="clearFieldError('username')">


                  <div class="relative">
                      <input id="password"
                          class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 pr-8 text-sm"
                          type="password" placeholder="Password" wire:model="password"
                          wire:focus="clearFieldError('password')">

                      <i class="fa-regular fa-eye absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600"
                          onclick="togglePassword()"></i>
                  </div>





                  @if ($showError)
                      <p class="text-red-400 text-xs mt-1">Please enter your correct redentials.</p>
                  @endif
                  <a href="{{ route('forgotpassword') }}" class="">
                      <p class="text-right text-xs font-extralight text-black">Forgot Password?</p>
                  </a>
                  <input
                      class="bg-none  bg-[#31A871] hover:bg-[#2bc57d] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3"
                      type="submit" value="LOGIN">
              </form>
              <p class="text-black text-center text-xs mt-5 opacity-70">No Account Yet? <a id="openSignup"
                      href="/signup" class="text-[#31A871]">Register Now</a></p>
          </div>
      </div>
  </div>





  <script>
      function togglePassword(icon) {
          const input = document.getElementById("password");

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
