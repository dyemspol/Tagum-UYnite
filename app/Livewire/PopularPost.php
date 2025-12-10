<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;

class PopularPost extends Component
{
    public $post;
    public $likes = 0;
    public $dislikes = 0;
    public $userReaction;
    public function render()
    {
        return view('livewire.popular-post', [
            
            'isProfilePage' => false
        ]);
    }
    public function mount()
    {
        $this->loadReactionCounts();
          if(Auth::check()){
            $reaction = Reaction::where('report_id', $this->post->id)->where('user_id', Auth::id())->first();
            $this->userReaction = $reaction ? $reaction->reaction_type : null;
        }
    }
    public function loadReactionCounts()
    {
         $this->post->load('reactions'); 
        $this->likes = $this->post->reactions->where('reaction_type', 'like')->count();
        $this->dislikes = $this->post->reactions->where('reaction_type', 'dislike')->count();
    }
    public function toggleReaction($type)
    {
        $user = Auth::user();
        $reaction = Reaction::where('report_id', $this->post->id)->where('user_id', $user->id)->first();
        
        if ($reaction) {
            if ($reaction->reaction_type === $type) {
                $reaction->delete();
                $this->userReaction = null;
            } else {
                $reaction->update(['reaction_type' => $type]);
                $this->userReaction = $type;
            }
        } else {
            
            Reaction::create([
                'report_id' => $this->post->id,
                'user_id' => Auth::id(),
                'reaction_type' => $type
            ]);
            $this->userReaction = $type;
        }
        $this->loadReactionCounts();
    }
}
