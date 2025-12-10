<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Baranggay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class AuthServices
{
    public function register(array $data)
    {
        return User::create($data);
    }

    public function validateRegister(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'barangay_id' => 'required|exists:barangays,id',
            'Street_Purok' => 'required|string|max:255',
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
            'barangay_id.required' => 'The barangay field is required.',
            'barangay_id.exists' => 'The selected barangay is invalid.',
            'Street_Purok.required' => 'The street purok field is required.',
            'Street_Purok.string' => 'The street purok field must be a string.',
            'Street_Purok.max' => 'The street purok field must be less than 255 characters.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password field must be a string.',
            'password.min' => 'The password field must be at least 8 characters long.',
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.string' => 'The confirm password field must be a string.',
            'confirm_password.min' => 'The confirm password field must be at least 8 characters long.',
            'confirm_password.same' => 'The confirm password and password must match.',
        ]);
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
       

        try{

        DB::beginTransaction();
        $barangay = Baranggay::find($data['barangay_id']);
        $address = $data['Street_Purok'] . ' ' . $barangay->barangay_name;
        $user = User::create([
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'username' => $data['username'],
            'barangay_id' => $data['barangay_id'],
            'complete_address' => $address,
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'profile_photo' => null,
            'department_id' => null,
        ]);
        DB::commit();
        return [
            'success' => true,
            'message' => 'User created successfully',
            'user' => $user,
        ];
        }catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error creating user: ' . $e->getMessage(),
            ];
        }
        
    }

    public function validateLogin(array $data)
    {
        Log::info('kaabot ni diri');
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ], 
        [
            'username.required' => 'The username field is required.',
            'username.string' => 'The username field must be a string.',
            'username.max' => 'The username field must be less than 255 characters.',
        ]);
    }

    public function login(array $data)
    {
        $validator = $this->validateLogin($data);
        Log::info('kaabot pod ni diri');
        if($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
            ];
        }

        if(Auth::attempt($data)) {
            Log::info('Login successful');
            session()->regenerate();
            return [
                'success' => true,
                'message' => 'Login successful',
                'user' => Auth::user(),
            ];
        }else{
            return [
                'success' => false,
                'message' => 'Invalid credentials',
            ];
        }
    }
}