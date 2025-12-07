<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Baranggay;
use Livewire\WithFileUploads;
use App\Models\Department;
use GuzzleHttp\Promise\Create;
use App\Services\CreatePostServices;
use App\Services\CloudinaryServices;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    use WithFileUploads;


    public $title;
    public $description;
    public $barangay_id = '';
    public $department_id = '';
    public $Street_Purok;
    public $landmark;
    public $latitude;
    public $longitude;
    public $media = [];

    public $showError = false;

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

    public function submit(CreatePostServices $createPostServices, CloudinaryServices $cloudinaryServices)
    {
        $userId = Auth::id();
        $data   = [
            'title' => 'required',
            'description' => 'required',
            'barangay_id' => 'required',
            'department_id' => 'required',
            'Street_Purok' => 'required',
            'landmark' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        $createPostServices->createPost($userId, $data, $this->media, $cloudinaryServices) ;

        if($result['success']) {

            session()->flash('success', $result['message']);

            $this->reset('username', 'password');
            
            return redirect('/');
        }

        if (isset($result['errors'])) {
            $this->showError = true;
        }else{
            $this->showError = true;
        }
    }
}
