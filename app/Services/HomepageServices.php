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
    public function getFeedPosts($type, $categoryIds = [])
    {
        $query = Report::with(['user', 'postImages', 'department', 'barangay', 'reactions'])
                    ->where('post_status', 'approved');

        if (!empty($categoryIds)) {
            $query->whereIn('department_id', $categoryIds);
        }
        if ($type === 'popular') {
            $query->popular(); 
        } else {
            $query->latest();
        }

        return $query->get();
    }
    public function searchPosts($searchQuery)
    {
        return Report::with(['user', 'postImages', 'department', 'barangay', 'reactions'])
                    ->where('post_status', 'approved')
                    ->where(function($query)use ($searchQuery){
                        $query->where('title', 'like', '%' . $searchQuery . '%')
                        ->orWhere('content', 'like', '%' . $searchQuery . '%')
                        ->orWhereHas('barangay', function($q) use ($searchQuery) {
                            $q->where('barangay_name', 'like', '%' . $searchQuery . '%');
                        });
                    })
                    ->latest()
                    ->get();
    }
}