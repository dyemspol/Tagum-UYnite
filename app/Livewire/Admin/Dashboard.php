<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Department;

class Dashboard extends Component
{
    public $staff;
    public $users;
    public $staffdepartment;
    public $newusers = [];
    public $selectedUser = null;
    public function mount()
    {
        $this->getKPI();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
    public function getKPI()
    {
        $this->staff = User::where('role', 'employee')->count();
        $this->users = User::where('role', 'resident')->where('is_verified', '0')->count();
        $this->staffdepartment = User::where('role', 'employee')->groupBy('department')->count();
        $this->newusers = User::where('role', 'resident')->where('is_verified', '1')->orderby('created_at', 'desc')->get()->take(5);
    }
    public function showUser($id)
    {
        $this->selectedUser = User::where('id', $id)->first();
    }
    public function closeUser()
    {
        $this->selectedUser = null;
    }
}
