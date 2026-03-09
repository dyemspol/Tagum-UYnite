<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Baranggay;

class Settings extends Component
{
    public $user;
    public $barangay_id;
    public $address;
    public $date_of_birth;
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
        $this->barangay_id = $this->user->barangay_id;
        $this->address = $this->user->address;
        $this->date_of_birth = $this->user->date_of_birth;
        $this->username = $this->user->username;
    }
    public function updateProfile()
    {
        $this->validate([
            'barangay_id' => 'required|exists:barangays,id',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'username' => 'required|unique:users,username,' . $this->user->id,
        ]);
        try {
            $this->user->update([
                'barangay_id' => $this->barangay_id,
                'address' => $this->address,
                'date_of_birth' => $this->date_of_birth,
                'username' => $this->username,
            ]);
            session()->flash('success', 'Profile updated successfully!');
            return true;
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update profile!');
            return false;
        }
    }
}
