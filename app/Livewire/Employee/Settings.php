<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Baranggay;
use Livewire\WithFileUploads;
use App\Services\CloudinaryServices;
use Illuminate\Support\Facades\Log;

class Settings extends Component
{
    use WithFileUploads;
    public $user;
    public $email;
    public $username;
    public $profile_photo;
    public $password;
    public $password_confirmation;
    public function render()
    {

        return view('livewire.employee.settings', [
            'user' => $this->user,
            'barangays' => Baranggay::all(),
        ]);
    }
    public function mount($user = null)
    {
        $this->user = $user ?? Auth::user();

        $this->username = $this->user->username;
        $this->email = $this->user->email;
    }
    public function updateProfile(CloudinaryServices $cloudinaryServices)
    {
        $hasChanges = false;
        if ($this->username != $this->user->username) $hasChanges = true;
        if ($this->email != $this->user->email) $hasChanges = true;
        if (!empty($this->profile_photo)) $hasChanges = true;

        if (!$hasChanges) {
            session()->flash('error', 'No changes made!');
            return;
        }
        $this->validate([
            'username' => 'required|unique:users,username,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        try {
            $data = [
                'username' => $this->username,
                'email' => $this->email,
            ];
            if ($this->profile_photo) {
                try {
                    $uploadedFileUrl = $cloudinaryServices->uploadProfilePhoto($this->profile_photo);

                    $data['profile_photo'] = $uploadedFileUrl;
                    Log::info('Cloudinary upload successful: ' . $uploadedFileUrl);
                } catch (\Exception $uploadError) {
                    Log::error('Cloudinary upload error: ' . $uploadError->getMessage());
                    throw new \Exception('Failed to upload profile photo. Please try again.');
                }
            }
            $this->user->update($data);
            $this->profile_photo = null;
            $this->mount($this->user);
            session()->flash('success', 'Profile updated successfully!');
            return true;
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update profile!');
            return false;
        }
    }
}
