<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


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

    public function mount($user = null)
    {
         $this->user = $user ?? Auth::user();
        
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->barangay_id = $this->user->barangay_id;
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

        // Sanitize email: Convert empty string to null to avoid unique constraint issues
        $email = !empty($this->email) ? trim($this->email) : null;

        $data = [
            'first_name' => trim($this->first_name),
            'last_name' => trim($this->last_name),
            'email' => $email,
            'email_verified_at' => $email ? now() : null,
            'barangay_id' => $this->barangay_id,
        ];

        try {
            DB::beginTransaction();

            $currentUser = Auth::user();

            if (!empty($this->password)) {
                $data['password'] = Hash::make($this->password);
            }

            if ($this->photo) {
                // Debug: Check if config is actually loaded
                $cloudUrl = config('cloudinary.cloud_url');
                Log::info('Cloudinary Config Check: ' . (empty($cloudUrl) ? 'EMPTY' : 'Found (Length: ' . strlen($cloudUrl) . ')'));
                
                Log::info('Attempting Cloudinary upload for user: ' . $currentUser->id);
                
                try {
                    $uploadResponse = Cloudinary::upload($this->photo->getRealPath(), [
                        'folder' => 'profile-photos'
                    ]);

                    if (!$uploadResponse) {
                        throw new \Exception('Cloudinary upload returned no response.');
                    }

                    $data['profile_photo'] = $uploadResponse->getSecurePath();
                    Log::info('Cloudinary upload successful: ' . $data['profile_photo']);

                } catch (\Exception $uploadError) {
                    Log::error('Cloudinary Specific Error: ' . $uploadError->getMessage());
                    throw new \Exception('Cloudinary upload failed. Check your API keys and CLOUDINARY_URL.');
                }
            }

            $currentUser->update($data);

            DB::commit();

            $this->reset(['current_password', 'password', 'password_confirmation', 'photo']);
            Log::info('Profile updated successfully for user: ' . $currentUser->id);
            
            $this->dispatch('profile-updated'); 
            $this->dispatch('close-edit-profile'); 

            return redirect()->route('profile');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Final Profile Update Error: ' . $e->getMessage());
            
            // Show the actual error message so we can fix it!
            session()->flash('error', 'There was an error updating your profile: ' . $e->getMessage());
            return;
        }
    }
}
