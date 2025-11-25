<div id="signupModal" class="fixed hidden inset-0 w-full h-screen z-50 bg-[#070707b6] backdrop-blur-sm flex justify-center items-center">
    <div class="bg-gradient-to-b from-[#1F486C] to-[#0F1F2C] w-[90%] p-6 max-w-[29em] rounded-xl py-10">
        <div class="w-15 h-auto mx-auto">
            <img src="{{ asset('img/LOGO.png') }}" alt="">
        </div>
        <div class="text-center my-2">
            <h2 class="text-white text-lg font-medium ">Create your Account</h2>
            <p class="text-xs text-white font-light opacity-70 ">Fill in the details to continue</p>
        </div>

        <form action="" class="space-y-2 mt-3">
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="text" placeholder="Full Name">
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="text" placeholder="Email">
           
          
            
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="password" placeholder="Password">
            <input class="bg-transparent border-[0.5px] border-[#ffffff97] rounded-sm w-full text-white py-2 px-2 text-sm" type="password" placeholder="Confirm Password">
            <input class=" bg-[#2C5982] hover:bg-[#346a9d] cursor-pointer rounded-sm w-full text-white font-normal py-1 px-1 mt-3" type="submit" value="Register">
        </form>
            <p class="text-white text-center text-xs mt-5 opacity-70"> Already registered? <a id="openLogin" href="" class="text-[#31A871]">Login</a></p>
    </div>
</div>

<script>
    document.getElementById('openLogin').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('signupModal').classList.add('hidden');
        document.getElementById('loginModal').classList.remove('hidden');
    });
</script>