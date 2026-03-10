<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Baranggay;

class Settings extends Component
{
    public $user;
    public $email;
    public $username;
    public $password;
    public $password_confirmation;
    public function render()
    {
        $user = Auth::user();
        $barangays = Baranggay::all();
        return view('livewire.employee.settings', compact('user', 'barangays'));
    }
    public function mount($user = null)
    {
        $this->user = $user ?? Auth::user();

        $this->username = $this->user->username;
        $this->email = $this->user->email;
    }
    public function updateProfile()
    {
        $hasChanges = false;
        if ($this->username != $this->user->username) $hasChanges = true;
        if ($this->email != $this->user->email) $hasChanges = true;

        if (!$hasChanges) {
            session()->flash('error', 'No changes made!');
            return;
        }
        $this->validate([
            'username' => 'required|unique:users,username,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);
        try {
            $this->user->update([
                'username' => $this->username,
                'email' => $this->email,
            ]);

            session()->flash('success', 'Profile updated successfully!');
            return true;
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update profile!');
            return false;
        }
    }
}
