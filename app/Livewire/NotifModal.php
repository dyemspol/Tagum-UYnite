<?php

namespace App\Livewire;
use App\Models\Report;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class NotifModal extends Component
{
    public $notifications = [];
    public function mount()
    {
        $this->loadNotifications();
    }
    public function loadNotifications()
    {
        $user = Auth::user();
        if (!$user) return;

        
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

        $this->notifications = $comments->merge($reactions)
            ->sortByDesc('created_at')
            ->take(20)
            ->values();
    }
    public function render()
    {
        return view('livewire.notif-modal');
    }
}
