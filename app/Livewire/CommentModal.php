<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Report;
use App\Models\Comment;
use App\Models\User;
use App\Models\Baranggay;
use App\Models\Reaction;
use App\Models\PostImages;
use Illuminate\Support\Facades\Auth;

class CommentModal extends Component
{
    public $post;
    public $comment = '';
    public $comments = [];
    public $commentModal = false;

    
    public function render()
    {
        return view('livewire.comment-modal');
    }

    #[On('openCommentModal')]
public function loadPost($postId) {
    $this->post = Report::with('comments.user','reactions.user','postImages','barangay','user')->find($postId);
    $this->comments = Comment::with('user')->where('report_id', $postId)->get();
    $this->commentModal = true;
    }
    public function submitComment() {
        $this->validate(['comment' => 'required|min:1']);
        Comment::create([
            'user_id' => Auth::id(),
            'body' => $this->comment,
            'report_id' => $this->post->id
        ]);
        $this->comments = Comment::with('user')->where('report_id', $this->post->id)->get();
        $this->comment = '';
    }
}
