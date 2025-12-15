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
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
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
                $result = $this->cloudinary->uploadApi()->upload($file->getRealPath(), [
                    'public_id' => $publicId,
                    'folder' => $folder,
                    'resource_type' => $resourceType,
                    'quality' => 'auto:good',
                    'fetch_format' => 'auto',
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
        $publicId = 'profile_photos/' . time() . '_' . uniqid();
        
        $result = $this->cloudinary->uploadApi()->upload($file->getRealPath(), [
            'public_id' => $publicId,
            'folder' => 'profile_photos',
            'resource_type' => 'image',
            'quality' => 'auto:good',
            'fetch_format' => 'auto',
        ]);
        
        return $result['secure_url'];
    }

}