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

        $userVerification->validate([
            'birthday' => $this->birthday,
            'barangay_id' => $this->barangay_id,
            'address' => $this->address,
            'verification_photo' => $this->verification_photo,
        ]);

        $verifyUser = $userVerification->verifyUser($user->id, [
            'birthday' => $this->birthday,
            'barangay_id' => $this->barangay_id,
            'address' => $this->address,
            'verification_photo' => $this->verification_photo,
        ], $cloudinaryServices);

        if ($verifyUser) {
            Log::info('Verification success for user: ' . $user->id);
            return redirect('/profile')->with('success', 'Your verification request has been submitted and is now pending review.');
        }

        session()->flash('error', 'Failed to submit verification request. Please try again.');
    }
}
