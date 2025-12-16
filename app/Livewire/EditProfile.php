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
 
        $hasChanges = false;
        if ($this->first_name !== $this->user->first_name) $hasChanges = true;
        if ($this->last_name  !== $this->user->last_name)  $hasChanges = true;
        if ($this->email      !== $this->user->email)      $hasChanges = true;
        if ($this->barangay_id !== $this->user->barangay_id) $hasChanges = true;
        if (!empty($this->photo)) $hasChanges = true;
        if (!empty($this->current_password) || !empty($this->password)) $hasChanges = true;

        // If nothing changed, simply close the modal nd stop here
        if (! $hasChanges) {
            $this->dispatch('close-edit-profile');
            return;
        }

        
        $rules = [
            'barangay_id' => 'required|exists:barangays,id',
            'photo' => 'nullable|image|max:5000', 
        ];

        if ($this->first_name !== $this->user->first_name) {
            $rules['first_name'] = 'required|string|max:255';
        }

        if ($this->last_name !== $this->user->last_name) {
            $rules['last_name'] = 'required|string|max:255';
        }
        if (!empty($this->current_password) || !empty($this->password)) {
            $rules['current_password'] = 'required|string';
            $rules['password'] = 'required|string|min:8|confirmed';
        }
        if (!empty($this->email) && $this->email !== $this->user->email) {
            $rules['email'] = 'required|email|max:255|unique:users,email,'.$this->user->id;
        }

        
        if (!empty($this->current_password)) {
             if (!Hash::check($this->current_password, $this->user->password)) {
                $this->addError('current_password', 'The provided password does not match your current password.');
                return;
            }
        }
        $this->validate($rules);

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
        $this->dispatch('close-edit-profile'); 
        return redirect()->route('profile');
    }
}
