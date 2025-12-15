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
        $this->reset(['title','description','barangay_id','department_id','Street_Purok','landmark','latitude','longitude']);
    }

    public function submit(CreatePostServices $createPostServices, CloudinaryServices $cloudinaryServices)
    {
        $userId = Auth::id();
        

        $data =[
            'title' => $this->title,
            'description' => $this->description,
            'barangay_id' => $this->barangay_id,
            'department_id' => $this->department_id,
            'Street_Purok' => $this->Street_Purok,
            'landmark' => $this->landmark,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];

        \Illuminate\Support\Facades\Log::info('Livewire CreatePost: Data prepared', $data);

        $result = $createPostServices->createPost($userId, $data, $this->media, $cloudinaryServices) ;

        if($result['success']) {
            \Illuminate\Support\Facades\Log::info('Livewire CreatePost: Service returned success');

            session()->flash('success', $result['message']);

            $this->resetCreatePostModal();
            
            return redirect('/');
        }

        \Illuminate\Support\Facades\Log::warning('Livewire CreatePost: Service returned failure', ['result' => $result]);

        if (isset($result['errors'])) {
            foreach ($result['errors']->messages() as $field => $messages) {
                $this->addError($field, $messages[0]);
            }
        }else{
            $this->addError('error_message', $result['message']);
        }
    }
}
