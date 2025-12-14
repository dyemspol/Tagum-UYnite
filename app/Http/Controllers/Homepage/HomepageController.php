<?php
namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Services\HomepageServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Report;
use App\Models\User;


class HomepageController extends Controller
{
    protected $HomepageServices;

    public function __construct(HomepageServices $homepageServices)
    {
        $this->HomepageServices = $homepageServices;
    }
    public function index()
    {
        // Fetch all posts with their relationships, ordered by newest first
        
        return view('page.HomePage', [
            'isProfilePage' => false,
            
        ]);
    }

    public function latestpost()
    {
        
        return view('page.LatestPage', [
            'isProfilePage' => false,
            
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
        
        $user = Auth::user();
        $post = Report::where('user_id', $user->id)->get();
        
        return view('page.profilePage', compact('user', 'post'));
    }

    public function popularPOST()
    {
        

        return view('page.PopularPage', [
            'isProfilePage' => false,
            
        ]);
    }
    public function searchPosts(Request $request)
    {
        $searchQuery = $request->input('search');
        $posts = [];
        if ($searchQuery) {
            $posts = $this->HomepageServices->searchPosts($searchQuery);
        }
        return view('page.HomePage', [
            'isProfilePage' => false,
            'posts' => $posts,
            'searchQuery' => $searchQuery
        ]);
    }
}