<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Baranggay;
use App\Services\HomepageServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Report;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reaction;
use App\Services\CloudinaryServices;
use App\Services\UserVerification;



class HomepageController extends Controller
{
    protected $HomepageServices;
    protected $UserVerification;

    public function __construct(HomepageServices $homepageServices, UserVerification $userVerification)
    {
        $this->HomepageServices = $homepageServices;
        $this->UserVerification = $userVerification;
    }

    public function index()
    {


        return view('page.HomePage', [
            'isProfilePage' => false,

        ]);
    }

    public function latestpost()
    {

        return view('page.latestPage', [
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
        $barangays = Baranggay::all();

        return view('page.profilePage', compact('user', 'post', 'barangays'));
    }

    public function popularpost()
    {


        return view('page.popularPage', [
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
    public function verifyUser(Request $request, CloudinaryServices $cloudinaryServices)
    {
        $user = Auth::user();
        $realUser = User::findOrFail($user->id);
        $validator = $this->UserVerification->validateVerification($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $verifyUser = $this->UserVerification->verifyUser($realUser->id, $request->all(), $cloudinaryServices);

        if ($verifyUser) {
            return redirect()->back()->with('success', 'User verified successfully!');
        }
        return redirect()->back()->with('error', 'Failed to verify user!');
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
