<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostCard extends Component
{
    public $post;
    public $isProfilePage;
    public $likes = 0;
    public $dislikes = 0;
    public $userReaction = null;


    public function render()
    {
        return view('livewire.post-card', ['isProfilePage' => false]);
    }

    public function mount()
    {
        Log::info('yaoyao');
        $this->loadReactionCounts();

          if(Auth::check()){
            $reaction = Reaction::where('report_id', $this->post->id)->where('user_id', Auth::id())->first();
            $this->userReaction = $reaction ? $reaction->reaction_type : null;
        }
    }
    public function loadreactionCounts()
    {
        $this->post->load('reactions');
        $this->likes = $this->post->reactions->where('reaction_type', 'like')->count();
        $this->dislikes = $this->post->reactions->where('reaction_type', 'dislike')->count();
        

      
    }

    public function toggleReaction($type)
    {
        Log::info('kaabot napod dere');
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
                'user_id' => $user->id,
                'reaction_type' => $type
            ]);
            $this->userReaction = $type;
        }
        $this->loadReactionCounts();
    }
}
