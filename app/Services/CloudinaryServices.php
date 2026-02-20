<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Baranggay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Report;
use Illuminate\Http\UploadedFile;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Models\PostImages;

class CloudinaryServices
{
    public function uploadPostMedia(array $mediaFiles, int $reportId): array
    {
        $uploadedImages = [];
        $folder = 'reports/post_media'; // Your chosen Cloudinary folder

        foreach ($mediaFiles as $file) {
            // Check if the file is a Livewire TemporaryUploadedFile object
            if (!$file instanceof TemporaryUploadedFile) {
                continue;
            }

            try {
                // Determine resource type for Cloudinary
                $resourceType = str_starts_with($file->getMimeType(), 'video') ? 'video' : 'image';

                // Bypass the broken Facade and use SDK directly
                $cloudinary = new \Cloudinary\Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key'    => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                ]);

                // Upload to Cloudinary using the file's real path
                $result = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                    'folder' => $folder,
                    'resource_type' => $resourceType,
                ]);

                // Save to database
                $postImage = PostImages::create([
                    'report_id' => $reportId,
                    'public_id' => $result['public_id'],
                    'mime_type' => $file->getMimeType(),
                    'cdn_url' => $result['secure_url'], // Storing the full URL
                ]);

                $uploadedImages[] = $postImage;
            } catch (\Exception $e) {
                Log::error('Cloudinary upload failed for report ' . $reportId, ['error' => $e->getMessage()]);
            }
        }

        return $uploadedImages;
    }
    public function uploadProfilePhoto(TemporaryUploadedFile $file): string
    {
        try {
            // Bypass the broken Facade and use SDK directly
            $cloudinary = new \Cloudinary\Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            $result = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                'folder' => 'profile_photos',
                'resource_type' => 'image'
            ]);

            return $result['secure_url'];
        } catch (\Exception $e) {
            Log::error('Cloudinary upload failure: ' . $e->getMessage());
            throw $e;
        }
    }

    public function uploadVerificationPhoto(UploadedFile|TemporaryUploadedFile $file): string
    {
        try {
            $cloudinary = new \Cloudinary\Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            $result = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                'folder' => 'verification_photos',
                'resource_type' => 'image'
            ]);

            return $result['secure_url'];
        } catch (\Exception $e) {
            Log::error('Cloudinary upload failure: ' . $e->getMessage());
            throw $e;
        }
    }
}
