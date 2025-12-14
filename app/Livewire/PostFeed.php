<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use App\Services\HomepageServices;
use Livewire\Attributes\On;

class PostFeed extends Component
{
    public $type = 'latest';
    public $selectedCategories = []; 

    
    #[On('toggle-category')]
    public function toggleCategory($id)
    {
        if (in_array($id, $this->selectedCategories)) {
           
            $this->selectedCategories = array_diff($this->selectedCategories, [$id]);
        } else {
           
            $this->selectedCategories[] = $id;
        }
    }

    public function render(HomepageServices $homepageServices)
    {
        $posts = $homepageServices->getFeedPosts($this->type, $this->selectedCategories);

        return view('livewire.post-feed', [
            'posts' => $posts
        ]);
    }
}
