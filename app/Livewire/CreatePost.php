<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Baranggay;
use App\Models\Department;

class CreatePost extends Component
{
    public $title;
    public $content;
    public $barangay_id = '';
    public $department_id = '';
    public $Street_Purok;
    public $landmark;
    public $latitude;
    public $longitude;

    protected $listeners = ['setLatLng', 'resetCreatePostModal'];

    public function render()
    {
        return view('livewire.create-post', [
            'barangays' => Baranggay::all(),
            'departments' => Department::all(),
        ]);
    }

    public function setLatLng($lat, $lng)
    {
        $this->latitude = $lat;
        $this->longitude = $lng;
    }

    public function resetCreatePostModal()
    {
        $this->reset(['title','content','barangay_id','department_id','Street_Purok','landmark','latitude','longitude']);
    }

    public function submit()
    {
        dd($this->title, $this->content, $this->department_id, $this->barangay_id, $this->latitude, $this->longitude);
    }
}
