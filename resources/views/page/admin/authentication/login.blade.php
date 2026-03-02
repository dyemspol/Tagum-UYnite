<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-[#0f1117]">

  <!-- Login Card -->
  <div class="w-full max-w-md bg-[#1a1d29] backdrop-blur-lg rounded-2xl shadow-2xl p-8 border border-[#2a2d3a]">

    <!-- Header -->
    <div class="text-center mb-8">
        <img class="mx-auto h-auto w-20 mb-2" src="{{ asset('img/LOGO.png') }}" alt="">
      {{-- <h1 class="text-3xl font-bold text-white tracking-wide">
        Tagum Unite
      </h1> --}}
      <p class="text-[#00d4aa] text-sm mt-1">
        Admin Portal
      </p>
      <span class="inline-block mt-3 px-3 py-1 text-xs rounded-full bg-red-900/40 text-red-400 border border-red-800">
        Authorized Personnel Only
      </span>
    </div>

    <!-- Form -->
    <form class="space-y-6">

      <!-- Staff ID / Email -->
      <div>
        <label class="block text-sm text-gray-300 mb-1">
          Staff ID or Email
        </label>
        <input
          type="text"
          placeholder="Enter your staff ID"
          class="w-full px-4 py-3 rounded-lg bg-[#12151e] text-white border border-[#2a2d3a] focus:outline-none focus:ring-2 focus:ring-[#00d4aa]"
        />
      </div>

      <!-- Password -->
      <div>
        <label class="block text-sm text-gray-300 mb-1">
          Password
        </label>
        <input
          type="password"
          placeholder="Enter your password"
          class="w-full px-4 py-3 rounded-lg bg-[#12151e] text-white border border-[#2a2d3a] focus:outline-none focus:ring-2 focus:ring-[#00d4aa]"
        />
      </div>

      <!-- Options -->
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center gap-2 text-gray-300">
          <input type="checkbox" class="accent-[#00d4aa]" />
          Remember device
        </label>
        <a href="#" class="text-[#00d4aa] hover:text-[#00e6b8]">
          Forgot password?
        </a>
      </div>

      <!-- Login Button -->
      <button
        type="submit"
        class="w-full py-3 rounded-lg bg-[#00d4aa] hover:bg-[#00e6b8] transition font-semibold text-[#0f1117] shadow-lg shadow-[#00d4aa]/20"
      >
        Secure Login
      </button>
    </form>

    <!-- Footer -->
    <div class="mt-6 text-center text-xs text-gray-400 space-y-1">
      <p>For official use only</p>
      <p>Unauthorized access is prohibited</p>
    </div>

  </div>

</body>
</html>
