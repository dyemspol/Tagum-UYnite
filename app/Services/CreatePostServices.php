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
use Illuminate\Foundation\Cloud;
use App\Services\CloudinaryServices;
use App\Models\Department;

class CreatePostServices
{
    public function validatePost(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'barangay_id' => 'required|exists:barangays,id',
            'department_id' => 'required|exists:departments,id',
            'Street_Purok' => 'required|string',
            'landmark' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',

        ],
        [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field must be less than 255 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description field must be a string.',
            'barangay_id.required' => 'The barangay field is required.',
            'barangay_id.exists' => 'The selected barangay is invalid.',
            'department_id.required' => 'The department field is required.',
            'department_id.exists' => 'The selected department is invalid.',
            'Street_Purok.required' => 'The street/purok field is required.',
            'Street_Purok.string' => 'The street/purok field must be a string.',
            'landmark.required' => 'The landmark field is required.',
            'landmark.string' => 'The landmark field must be a string.',
            'latitude.required' => 'The latitude field is required.',
            'latitude.numeric' => 'The latitude field must be a number.',
            'longitude.required' => 'The longitude field is required.',
            'longitude.numeric' => 'The longitude field must be a number.',
        ]);
    }

    public function createPost(int $id, array $data, array $media, CloudinaryServices $cloudinaryServices)
    {
        Log::info('CreatePostServices: Attempting to create post', ['user_id' => $id, 'title' => $data['title'] ?? 'N/A']);

        $validator = $this->validatePost($data);
        if ($validator->fails()) {
            Log::warning('CreatePostServices: Validation failed', ['errors' => $validator->errors()]);
            return [
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ];
        }

        try {
            DB::beginTransaction();
            $reportId = $this->generateReportId($data['department_id']);
            
      
            
            $post = Report::create([
                'report_id' => $reportId,
                'user_id' => $id,
                'title' => $data['title'],
                'content' => $data['description'],
                'barangay_id' => $data['barangay_id'],
                'department_id' => $data['department_id'],
                'Street_Purok' => $data['Street_Purok'] ?? null,
                'address_details' => $data['landmark'] ?? null,
                'latitude' => $data['latitude'] ?? null,
                'longitude' => $data['longitude'] ?? null,
                'report_status' => 'pending',
                'post_status' => 'approved',
                'rejection_reason' => null,
                'priority_level' => 'low',
                'reviewed_by' => null,
                
            ]);

            if (!empty($media)) {
                Log::info('CreatePostServices: Uploading media', ['count' => count($media)]);
                $cloudinaryServices->uploadPostMedia($media, $post->id);
            }

            DB::commit();

            Log::info('CreatePostServices: Post created successfully', ['post_id' => $post->id]);

            return [
                'success' => true,
                'message' => 'Post created successfully.',
                'post' => $post,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('CreatePostServices: Error creating post: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => 'An error occurred while creating the post.',
            ];
        }
    }
    public function generateReportId(int $departmentId)
    {
        $department = Department::find($departmentId);

        if (!$department) {
            return null;
        }else {
            switch ($department->department_name) {
                case 'Engineering Office':
                    $reportId = 'EO' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                    break;
                case 'CENRO':
                    $reportId = 'CE' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                    break;
                case 'CDRRMO':
                    $reportId = 'CD' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                    break;
                case 'General Services Office':
                    $reportId = 'GS' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                    break;
                case 'Public Safety / Traffic Office':
                    $reportId = 'PS' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                    break;
                case 'Health Office':
                    $reportId = 'HO' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                    break;
                case 'Social Welfare':
                    $reportId = 'SW' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                    break;
                default:
                    $reportId = 'RP' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                    break;
            }
        }
        return $reportId;
    }
}