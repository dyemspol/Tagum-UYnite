<?php
namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Services\HomepageServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Report;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reaction;


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

    public function popularpost()
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
        return view('page.searchPage', [
            'isProfilePage' => false,
            'posts' => $posts,
            'searchQuery' => $searchQuery
        ]);
    }
    public function message()
    {
        return view('page.messagePage', [
            'isProfilePage' => false,
        ]);
    }

    public function notifications()
    {
        $user = Auth::user();
        $notifications = collect();

        if ($user) {
            $myPostIds = Report::where('user_id', $user->id)->pluck('id');

            $comments = Comment::whereIn('report_id', $myPostIds)
                ->where('user_id', '!=', $user->id)
                ->with(['user', 'report'])
                ->latest()
                ->take(20)
                ->get()
                ->map(function ($item) {
                    $item->type = 'comment';
                    return $item;
                });

            $reactions = Reaction::whereIn('report_id', $myPostIds)
                ->where('user_id', '!=', $user->id)
                ->with(['user', 'report'])
                ->latest()
                ->take(20)
                ->get()
                ->map(function ($item) {
                    $item->type = 'reaction';
                    return $item;
                });

            $notifications = $comments->merge($reactions)
                ->sortByDesc('created_at')
                ->take(50)
                ->values();
        }

        return view('page.notificationPage', [
            'isProfilePage' => false,
            'notifications' => $notifications,
        ]);
    }
}