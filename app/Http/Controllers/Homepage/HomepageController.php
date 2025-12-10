<?php
namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Services\AuthServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Report;

class HomepageController extends Controller
{
    public function index()
    {
        // Fetch all posts with their relationships, ordered by newest first
        $posts = Report::with(['user', 'postImages', 'department', 'barangay'])
                    ->get();

        return view('page.HomePage', [
            'isProfilePage' => false,
            'posts' => $posts
        ]);
    }

    public function latestpost()
    {
        $posts = Report::with(['user', 'postImages', 'department', 'barangay'])
                    ->latest()
                    ->get();

        return view('page.LatestPage', [
            'isProfilePage' => false,
            'posts' => $posts
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('success', 'You have successfully logged out!');
    }
    
    public function profile()
    {
        $users = User::all();
        return view('page.profilePage', compact('users'));
    }
}