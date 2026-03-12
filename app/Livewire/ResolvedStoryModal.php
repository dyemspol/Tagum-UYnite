<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use Livewire\Attributes\On;

class ResolvedStoryModal extends Component
{
    public $resolvedReport = null;
    public function render()
    {
        return view('livewire.resolved-story-modal');
    }
    #[On('open-modal')]
    public function openResolvedModal($id)
    {
        $this->resolvedReport = Report::with('user', 'postImages')->find($id);
    }
    public function closeResolvedModal()
    {
        $this->resolvedReport = null;
    }
}
