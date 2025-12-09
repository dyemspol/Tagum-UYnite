<?php
namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Services\AuthServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index()
    {
        // Fetch all posts with their relationships, ordered by newest first
        $posts = \App\Models\Report::with(['user', 'postImages', 'department', 'barangay'])
                    ->latest()
                    ->get();

        return view('page.HomePage', [
            'isProfilePage' => false,
            'posts' => $posts
        ]);
    }

    

}