<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Services\CloudinaryServices;
use App\Models\Verification;

class UserVerification
{
    public function validateVerification(array $data)
    {
        return Validator::make($data, [
            'barangay_id' => 'required|exists:barangays,id',
            'address' => 'required|string|max:255',
            'verification_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    public function verifyUser(int $userId, array $data, CloudinaryServices $cloudinaryServices)
    {
        try {
            $user = User::findOrFail($userId);
            $user->update([
                'barangay_id' => $data['barangay_id'],
                'address' => $data['address'],
                'is_verified' => true,
            ]);
            foreach ($data['verification_photo'] as $photo) {
                $url = $cloudinaryServices->uploadVerificationPhoto($photo);
                Verification::create([
                    'user_id' => $userId,
                    'verification_photo' => $url,
                ]);
            }
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
