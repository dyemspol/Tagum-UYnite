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

class HomepageServices
{
    public function getPosts()
    {
        return Report::with(['user', 'postImages', 'department', 'barangay', 'reactions'])
                    ->where('post_status', 'approved')
                    ->get();
    }
    public function getLatestPosts()
    {
        return Report::with(['user', 'postImages', 'department', 'barangay', 'reactions'])
                    ->where('post_status', 'approved')
                    ->orderBy('created_at', 'desc')
                    ->get();
    }
    public function getPopularPosts()
    {
        return Report::with(['user', 'postImages', 'department', 'barangay', 'reactions'])
                    ->popular()
                    ->where('post_status', 'approved')
                    ->get();
    }
    public function getProfilePosts($userId)
    {
        return Report::with(['user', 'postImages', 'department', 'barangay', 'reactions'])
                    ->where('user_id', $userId)
                    ->get();
    }
}