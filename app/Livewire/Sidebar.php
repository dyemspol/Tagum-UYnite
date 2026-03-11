<?php

namespace App\Livewire;

use App\Models\Department;
use App\Services\CloudinaryServices;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class Sidebar extends Component
{
    use WithFileUploads;
    public $department;
    public $departmentPhoto;
    public $user;

    public function mount($user = null)
    {
        $this->user = $user ?? Auth::user();
        $this->department = Department::where('id', $this->user->department_id)->first();
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
    public function updatedDepartmentPhoto(CloudinaryServices $cloudinaryServices)
    {
        $this->validate([
            'departmentPhoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = [
                'department_photo' => $this->departmentPhoto
            ];
            if (!$this->departmentPhoto) return;

            $uploadedFileUrl = $cloudinaryServices->uploadProfilePhoto($this->departmentPhoto);

            $data['department_photo'] = $uploadedFileUrl;
            $this->department->update($data);
            Log::info('Cloudinary upload successful: ' . $uploadedFileUrl);


            $this->departmentPhoto = null;
            $this->mount($this->user);
        } catch (\Exception $uploadError) {
            Log::error('Cloudinary upload error: ' . $uploadError->getMessage());
            throw new \Exception('Failed to upload department photo. Please try again.');
        }
    }
}
