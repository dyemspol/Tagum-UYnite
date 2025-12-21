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
use Cloudinary\Cloudinary as CloudinarySDK;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile; 
use App\Models\PostImages; 
class CloudinaryServices
{
    protected $cloudinary;
    public function __construct()
    {
        $this->cloudinary = new CloudinarySDK([
            'cloud' => [
                'cloud_name' => config('cloudinary.cloud_name'),
                'api_key'    => config('cloudinary.api_key'),
                'api_secret' => config('cloudinary.api_secret'),
            ],
        ]);
    }
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
                $publicId = $folder . '/' . $reportId . '_' . time() . '_' . uniqid();
                
                // Upload to Cloudinary using the file's real path
                $result = \CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::upload($file->getRealPath(), [
                    'folder' => $folder,
                    'resource_type' => $resourceType,
                ]);
                
                // Save to database
                $postImage = PostImages::create([
                    'report_id' => $reportId,
                    'public_id' => $result->getPublicId(),
                    'mime_type' => $file->getMimeType(),
                    'cdn_url' => $result->getSecurePath(), // Storing the full URL
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
            $result = \CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::upload($file->getRealPath(), [
                'folder' => 'profile_photos',
                'resource_type' => 'image'
            ]);

            return $result->getSecurePath();
        } catch (\Exception $e) {
            Log::error('Cloudinary upload failure: ' . $e->getMessage());
            throw $e;
        }
    }

}