<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Accountreview extends Component
{
    public $selectedUser = null;

    public function render()
    {
        return view('livewire.admin.accountreview', [
            'users' => User::with('verificationStatus')
                ->where('role', 'resident')
                ->where('is_verified', 0)
                ->whereHas('verificationStatus', function ($query) {
                    $query->where('status', 'pending');
                })
                ->get()
        ]);
    }

    public function showUser($id)
    {
        $this->selectedUser = User::with(['verificationStatus', 'verification'])->find($id);
    }
    public function approveUser($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'is_verified' => 1,

        ]);
        $user->verificationStatus->update([
            'status' => 'approved',
        ]);
        $this->selectedUser = null;
        session()->flash('success', 'User approved successfully');
    }
    public function closeUser()
    {
        $this->selectedUser = null;
    }
}
