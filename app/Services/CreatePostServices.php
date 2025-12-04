<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Baranggay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CreatePostServices
{
    public function validatePost(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'barangay_id' => 'required|exists:barangays,id',
            'department_id' => 'required|exists:departments,id',
        ],
        [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field must be less than 255 characters.',
            'content.required' => 'The content field is required.',
            'content.string' => 'The content field must be a string.',
            'barangay_id.required' => 'The barangay field is required.',
            'barangay_id.exists' => 'The selected barangay is invalid.',
            'department_id.required' => 'The department field is required.',
            'department_id.exists' => 'The selected department is invalid.',
        ]);
    }
}