<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;
use App\Models\User;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Log;

class Staffaccounts extends Component
{
    public $password;
    public $first_name;
    public $last_name;
    public $username;
    public $department_id;

    public $selectedStaff = null;

    public function render()
    {
        return view('livewire.admin.staffaccounts', [
            'departments' => Department::all(),
            'users' => User::where('role', 'employee')->get(),
        ]);
    }
    public function submit(AuthServices $authServices)
    {
        $data = [
            'firstname' => $this->first_name,
            'lastname' => $this->last_name,
            'username' => $this->username,
            'department_id' => $this->department_id,
            'password' => $this->password,
        ];

        $staff = $authServices->createUser($data);
        Log::info('Signup result received.', ['success' => $staff['success'] ?? false, 'message' => $staff['message'] ?? '']);

        if ($staff['success']) {
            $this->reset('first_name', 'last_name', 'username', 'department_id', 'password');
            session()->flash('success', "Staff account created successfully");
            $this->dispatch('close-modal');
        } else {
            session()->flash('error', "Failed to create staff account");
        }
    }
    public function showStaffModal($id)
    {
        $this->selectedStaff = User::where('id', $id)->first();
    }
    public function closeStaff()
    {
        $this->selectedStaff = null;
    }

    public function updatedDepartmentId($value)
    {
        $this->generateGenericPassword();
    }
    public function updatedUsername($value)
    {
        $this->generateGenericPassword();
    }
    public function generateGenericPassword()
    {
        if ($this->department_id && $this->username && is_numeric($this->department_id)) {
            $dept = Department::find($this->department_id);
            if ($dept) {
                $randomNumber = rand(1000, 9999);
                $this->password = $this->username . $dept->id . $randomNumber;
            }
        } else {
            $this->password = '';
        }
    }
}
