<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('page.signupPage');
    }

    public function showLoginForm()
    {
        return view('page.loginPage');
    }

    public function showForgotPasswordForm()
    {
        return view('page.forgotPasswordPage');
    }

    public function showResetPasswordForm(Request $request)
    {
        return view('page.resetPasswordPage', [
            'token' => $request->route('token'),
            'email' => $request->query('email'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have successfully logged out!');
    }

    public function login(Request $request, AuthServices $authServices)
    {

        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $result = $authServices->login($validated);

        if ($result['success']) {
            $role = $result['user']->role ?? '';
            $redirect = match ($role) {
                'superadmin' => '/superadmin',
                'employee'   => '/dashboard',
                default      => '/',
            };

            return response()->json([
                'success'  => true,
                'message'  => $result['message'] ?? 'Login successful',
                'redirect' => $redirect,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $result['message'] ?? 'Invalid credentials',
        ], 401);
    }

    // /**
    //  * Helper used only by the Livewire component (kept for backward compatibility).
    //  */
    // protected function redirectForRole(string $role): string
    // {
    //     return match ($role) {
    //         'superadmin' => '/superadmin',
    //         'employee'   => '/dashboard',
    //         'resident'   => '/',
    //         default      => '/',
    //     };
    // }
}
