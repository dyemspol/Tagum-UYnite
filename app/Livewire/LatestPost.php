<?php

namespace App\Livewire;

use Livewire\Component;

class LatestPost extends Component
{
    public $post;
    public $isProfilePage;
    public function render()
    {
        return view('livewire.latest-post', [
            'isProfilePage' => false
        ]);
    }
}
