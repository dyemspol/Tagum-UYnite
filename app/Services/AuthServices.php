<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Baranggay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class AuthServices
{
    public function register(array $data)
    {
        return User::create($data);
    }

    public function validateRegister(array $data)
    {
        return Validator::make(
            $data,
            [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|string|min:8|same:password',
            ],
            [
                'firstname.required' => 'The first name field is required.',
                'firstname.string' => 'The first name field must be a string.',
                'firstname.max' => 'The first name field must be less than 255 characters.',
                'lastname.required' => 'The last name field is required.',
                'lastname.string' => 'The last name field must be a string.',
                'lastname.max' => 'The last name field must be less than 255 characters.',
                'username.required' => 'The username field is required.',
                'username.string' => 'The username field must be a string.',
                'username.max' => 'The username field must be less than 255 characters.',
                'username.unique' => 'The username has already been taken.',
                'password.required' => 'The password field is required.',
                'password.string' => 'The password field must be a string.',
                'password.min' => 'The password field must be at least 8 characters long.',
                'confirm_password.required' => 'The confirm password field is required.',
                'confirm_password.string' => 'The confirm password field must be a string.',
                'confirm_password.min' => 'The confirm password field must be at least 8 characters long.',
                'confirm_password.same' => 'The confirm password and password must match.',
            ]
        );
    }

    public function createUser(array $data)
    {
        $validator = $this->validateRegister($data);

        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
            ];
        }


        try {

            DB::beginTransaction();
            $user = User::create([
                'first_name' => trim($data['firstname']),
                'last_name' => trim($data['lastname']),
                'username' => trim($data['username']),
                'email' => !empty($data['email']) ? trim($data['email']) : null,
                'email_verified_at' => !empty($data['email']) ? now() : null,
                'address' => null,
                'barangay_id' => null,
                'password' => Hash::make($data['password']),
                'role' => 'resident',
                'date_of_birth' => null,
                'profile_photo' => null,
                'is_verified' => false,
                'department_id' => null,
            ]);
            DB::commit();
            return [
                'success' => true,
                'message' => 'User created successfully',
                'user' => $user,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error creating user: ' . $e->getMessage(),
            ];
        }
    }

    public function validateLogin(array $data)
    {
        Log::info('kaabot ni diri');
        return Validator::make(
            $data,
            [
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:8',
            ],
            [
                'username.required' => 'The username field is required.',
                'username.string' => 'The username field must be a string.',
                'username.max' => 'The username field must be less than 255 characters.',
            ]
        );
    }

    public function login(array $data)
    {
        $validator = $this->validateLogin($data);
        Log::info('kaabot pod ni diri');
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
            ];
        }
        $loginField = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$loginField => $data['username'], 'password' => $data['password']])) {
            Log::info('Login successful');
            session()->regenerate();
            return [
                'success' => true,
                'message' => 'Login successful',
                'user' => Auth::user(),
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Invalid credentials',
            ];
        }
    }

    public function validatePasswordReset(array $data)
    {
        return Validator::make(
            $data,
            [
                'email' => 'required|email|exists:users,email',
            ],
            [
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.exists' => 'We could not find a user with that email address.',
            ]
        );
    }

    public function sendPasswordResetLink(array $data)
    {
        $validator = $this->validatePasswordReset($data);

        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Please enter a valid email address.',
            ];
        }

        $status = Password::sendResetLink(
            ['email' => $data['email']]
        );

        if ($status === Password::RESET_LINK_SENT) {
            $maskedEmail = $this->maskEmail($data['email']);
            return [
                'success' => true,
                'message' => 'Password reset link has been sent to ' . $maskedEmail,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Unable to send password reset link. Please try again later.',
            ];
        }
    }

    private function maskEmail($email)
    {
        $parts = explode('@', $email);
        $username = $parts[0];
        $domain = $parts[1];

        if (strlen($username) <= 2) {
            $maskedUsername = substr($username, 0, 1) . str_repeat('*', strlen($username) - 1);
        } else {
            $maskedUsername = substr($username, 0, 2) . str_repeat('*', strlen($username) - 2);
        }

        return $maskedUsername . '@' . $domain;
    }

    public function validatePasswordResetForm(array $data)
    {
        return Validator::make(
            $data,
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string|min:8|confirmed',
                'token' => 'required|string',
            ],
            [
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.exists' => 'We could not find a user with that email address.',
                'password.required' => 'The password field is required.',
                'password.string' => 'The password field must be a string.',
                'password.min' => 'The password must be at least 8 characters long.',
                'password.confirmed' => 'The password confirmation does not match.',
                'token.required' => 'The reset token is required.',
            ]
        );
    }

    public function resetPassword(array $data)
    {
        $validator = $this->validatePasswordResetForm($data);

        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Please check your input and try again.',
            ];
        }

        $status = Password::reset(
            [
                'email' => $data['email'],
                'password' => $data['password'],
                'password_confirmation' => $data['password_confirmation'],
                'token' => $data['token'],
            ],
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return [
                'success' => true,
                'message' => 'Your password has been reset successfully. You can now login with your new password.',
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Invalid or expired reset token. Please request a new password reset link.',
            ];
        }
    }
}
