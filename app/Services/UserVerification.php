<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Services\CloudinaryServices;
use App\Models\Verification;
use App\Models\VerifcationStatus;

class UserVerification
{
    public function validateVerification(array $data)
    {
        $minBirthDate = now()->subYears(18)->format('Y-m-d');

        return Validator::make($data, [
            'birthday' => [
                'required',
                'date',
                'before_or_equal:' . $minBirthDate,
            ],
            'barangay_id' => 'required|exists:barangays,id',
            'address' => 'required|string|max:255',
            'verification_photo' => 'required|array',
            'verification_photo.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'birthday.before_or_equal' => 'You must be at least 18 years old to verify your account.',
        ]);
    }

    public function verifyUser(int $userId, array $data, CloudinaryServices $cloudinaryServices)
    {
        try {
            $user = User::findOrFail($userId);

            if($user->is_verified) {
                return false;
            }
            $user->update([
                'date_of_birth' => $data['birthday'],
                'barangay_id' => $data['barangay_id'],
                'address' => $data['address'],
                
            ]);
            $photos = isset($data['verification_photo']) && is_array($data['verification_photo'])
                ? $data['verification_photo']
                : [$data['verification_photo']];
            foreach ($photos as $photo) {
                if (!$photo) continue;
                $url = $cloudinaryServices->uploadVerificationPhoto($photo);
                Verification::create([
                    'user_id' => $userId,
                    'verification_photo' => $url,
                ]);
            }
            VerifcationStatus::create([
                'user_id' => $userId,
                'status' => 'pending',
            ]);
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
