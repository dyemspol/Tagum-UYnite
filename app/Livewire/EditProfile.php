<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EditProfile extends Component
{
    use WithFileUploads;

    public $user;
    public $first_name;
    public $last_name;
    public $email;
    public $current_password;
    public $password; 
    public $password_confirmation;
    public $photo; 
    public $barangay_id;

    public function mount($user)
    {
        $this->user = $user;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->barangay_id = $user->barangay_id;
    }

    public function render()
    {
        return view('livewire.edit-profile', [
            'barangays' => \App\Models\Baranggay::all(),
        ]);
    }

    public function updateProfile()
    {
        
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$this->user->id,
            'barangay_id' => 'required|exists:barangays,id',
            'photo' => 'nullable|image|max:5000', // 1MB Max
        ];

        if (!empty($this->current_password) || !empty($this->password)) {
            $rules['current_password'] = 'required|string';
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $this->validate($rules);

        if (!empty($this->current_password)) {
             if (!Hash::check($this->current_password, $this->user->password)) {
                $this->addError('current_password', 'The provided password does not match your current password.');
                return;
            }
        }

        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'email_verified_at' => now(),
            'barangay_id' => $this->barangay_id,
        ];

        if (!empty($this->password)) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($this->password);
        }

        if ($this->photo) {
            $path = $this->photo->store('profile-photos', 'public');
            $data['profile_photo'] = Storage::url($path);
        }

        $this->user->update($data);
        Log::info('Profile utin');
        $this->reset(['current_password', 'password', 'password_confirmation', 'photo']);
        Log::info('Profile updated successfully');
        $this->dispatch('profile-updated'); 
        $this->dispatch('close-edit-profile'); // Helper to close modal if needed
    }
}
