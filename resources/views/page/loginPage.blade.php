<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Community')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    

    <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
       
            <div class="relative hidden md:flex items-center justify-center bg-cover bg-center"
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
            <div class="">
                <div class="w-30 mb-4 block md:hidden h-auto mx-auto">
                    <img src="{{ asset('img/logodark.png') }}" alt="">
                </div>
                <div class="text-center pb-3">
                    <h2 class="text-black text-3xl font-medium ">Welcome Back!</h2>
                    <p class="text-xs text-black font-light opacity-70 ">Please enter your details to sign in</p>
                </div>
        
                <form action="" class="space-y-2 mt-3">
                    <input class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="text" placeholder="Email or Username">
                    <input class="bg-transparent border-[0.5px] border-black rounded-sm w-full text-black py-2 px-2 text-sm" type="password" placeholder="Password">
                    <a href="#" class="" ><p class="text-right text-xs font-extralight text-black">Forgot Password?</p></a>
                     <input class="bg-none  bg-[#2C5982] hover:bg-[#346a9d] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3" type="submit" value="LOGIN">
                </form>
                    <p class="text-black text-center text-xs mt-5 opacity-70">No Account Yet? <a id="openSignup" href="/signup" class="text-[#31A871]">Register Now</a></p>
            </div>
        </div>
    </div>



    
</body>
</html>