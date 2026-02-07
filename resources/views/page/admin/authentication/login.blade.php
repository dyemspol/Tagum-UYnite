<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900">

  <!-- Login Card -->
  <div class="w-full max-w-md bg-slate-900/85 backdrop-blur-lg rounded-2xl shadow-2xl p-8 border border-blue-900/40">

    <!-- Header -->
    <div class="text-center mb-8">
        <img class="mx-auto h-auto w-20 mb-2" src="{{ asset('img/LOGO.png') }}" alt="">
      {{-- <h1 class="text-3xl font-bold text-white tracking-wide">
        Tagum Unite
      </h1> --}}
      <p class="text-blue-400 text-sm mt-1">
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
        <label class="block text-sm text-blue-300 mb-1">
          Staff ID or Email
        </label>
        <input
          type="text"
          placeholder="Enter your staff ID"
          class="w-full px-4 py-3 rounded-lg bg-slate-950 text-white border border-blue-900/50 focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
      </div>

      <!-- Password -->
      <div>
        <label class="block text-sm text-blue-300 mb-1">
          Password
        </label>
        <input
          type="password"
          placeholder="Enter your password"
          class="w-full px-4 py-3 rounded-lg bg-slate-950 text-white border border-blue-900/50 focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
      </div>

      <!-- Options -->
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center gap-2 text-blue-300">
          <input type="checkbox" class="accent-blue-600" />
          Remember device
        </label>
        <a href="#" class="text-blue-500 hover:text-blue-400">
          Forgot password?
        </a>
      </div>

      <!-- Login Button -->
      <button
        type="submit"
        class="w-full py-3 rounded-lg bg-blue-700 hover:bg-blue-600 transition font-semibold text-white shadow-lg shadow-blue-900/40"
      >
        Secure Login
      </button>
    </form>

    <!-- Footer -->
    <div class="mt-6 text-center text-xs text-blue-400 space-y-1">
      <p>For official use only</p>
      <p>Unauthorized access is prohibited</p>
    </div>

  </div>

</body>
</html>
