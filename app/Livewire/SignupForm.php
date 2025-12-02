<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class SignupForm extends Component
{
    public $firstname;
    public $lastname;
    public $username;
    public $password;
    public $confirm_password;
    public $role;
    public $Street_Purok;
    public $barangay_id = '';
    public $department_id;

    
    

    public function submit(AuthServices $authServices)
    {   
        
        $data = [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'password' => $this->password,
            'confirm_password' => $this->confirm_password,
            'Street_Purok' => $this->Street_Purok,
            'barangay_id' => $this->barangay_id
        ];
        $result = $authServices->createUser($data);
        
        Log::info($result);
        if($result['success']) {
            Auth::login($result['user']);
            session()->flash('success', $result['message']);
            $this->reset('firstname', 'lastname', 'username', 'password', 'confirm_password', 'Street_Purok', 'barangay_id', 'department_id');
            return redirect('/');
        }
        

        if(isset($result['errors'])) {
            foreach($result['errors']->messages() as $field => $messages) {
                $this->addError($field, $messages[0]);
            }
            $this->reset('firstname', 'lastname', 'username', 'password', 'confirm_password', 'Street_Purok', 'barangay_id', 'department_id');
        }else{
            session()->flash('error', $result['message']);
            $this->reset('firstname', 'lastname', 'username', 'password', 'confirm_password', 'Street_Purok', 'barangay_id', 'department_id');
        }

        

       
    }
    public function render()
    {
    return view('components.signup', [
        'barangays' => \App\Models\Baranggay::all()
    ]);
    }
}
