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

    document.getElementById('loginForm').addEventListener('submit', async function(e) {
      e.preventDefault(); // stop normal POST
      // Grab values from the inputs
      const username = document.getElementById('username').value.trim();
      const password = document.getElementById('password').value;
      // Optional: simple client‑side validation before hitting the server
      if (!username || !password) {
        const err = document.getElementById('errorMsg');
        err.textContent = 'Both fields are required.';
        err.classList.remove('hidden');
        return;
      }
      // Build the payload for the API
      const payload = {
        username,
        password
      };
      try {
        const response = await fetch('/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          },
          credentials: 'include',
          body: JSON.stringify(payload),
        });
        const json = await response.json();
        if (json.success) {
          window.location.href = json.redirect;
        } else {
          const err = document.getElementById('errorMsg');
          err.textContent = json.message ?? 'Login failed.';
          err.classList.remove('hidden');
        }
      } catch (ex) {
        const err = document.getElementById('errorMsg');
        err.textContent = 'Unable to reach the server. Please try again later.';
        err.classList.remove('hidden');
        console.error('Login fetch error:', ex);
      }
    });