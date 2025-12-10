<?php
namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Services\HomepageServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Report;

class HomepageController extends Controller
{
    public function __construct(HomepageServices $HomepageServices)
    {
        $this->HomepageServices = $HomepageServices;
    }
    public function index()
    {
        // Fetch all posts with their relationships, ordered by newest first
        $posts = $this->HomepageServices->getPosts();
        return view('page.HomePage', [
            'isProfilePage' => false,
            'posts' => $posts
        ]);
    }

    public function latestpost()
    {
        $posts = $this->HomepageServices->getLatestPosts();
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

    public function popularPOST()
    {
        $posts = $this->HomepageServices->getPopularPosts();

        return view('page.PopularPage', [
            'isProfilePage' => false,
            'posts' => $posts   
        ]);
    }
}