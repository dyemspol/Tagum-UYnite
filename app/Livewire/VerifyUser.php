<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\UserVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\CloudinaryServices;
use App\Models\Baranggay;
class VerifyUser extends Component
{
    use WithFileUploads;
    public $birthday;
    public $barangay_id;
    public $address;
    public $verification_photo = [];
    public function render()
    {
        return view('livewire.verify-user', [
            'barangays' => Baranggay::all(),
        ]);
    }
    public function verifyUser(UserVerification $userVerification, CloudinaryServices $cloudinaryServices)
    {
        $user = Auth::user();
        $validator = $userVerification->validateVerification([
            'birthday' => $this->birthday,
            'barangay_id' => $this->barangay_id,
            'address' => $this->address,
            'verification_photo' => $this->verification_photo,
        ]);
        if ($validator->fails()) {
            Log::info('error');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $verifyUser = $userVerification->verifyUser($user->id, [
            'birthday' => $this->birthday,
            'barangay_id' => $this->barangay_id,
            'address' => $this->address,
            'verification_photo' => $this->verification_photo,
        ], $cloudinaryServices);
    
        if ($verifyUser) {
            Log::info('success');
            return redirect()->back()->with('success', 'User verified successfully!');
        }
        return redirect()->back()->with('error', 'Failed to verify user!');
        }
    
    
}
