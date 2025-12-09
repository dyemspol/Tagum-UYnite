<?php

namespace App\Livewire;

use Livewire\Component;

class PostCard extends Component
{
    public $post;
    public $isProfilePage;
    
    public function render()
    {
        return view('livewire.post-card', ['isProfilePage' => false]);
    }
}
