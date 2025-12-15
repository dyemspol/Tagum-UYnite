<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;


class SignupForm extends Component
{
    public $firstname;
    public $lastname;
    public $username;
    public $password;
    public $confirm_password;
    public $role;
    public $department_id;
    public $showError = false;
    public $email;

    
  

    public function submit(AuthServices $authServices)
    {   
        
        $data = [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'password' => $this->password,
            'confirm_password' => $this->confirm_password,
            'email' => $this->email,
        ];
        $result = $authServices->createUser($data);
        Log::info('Signup result received.', ['success' => $result['success'] ?? false, 'message' => $result['message'] ?? '']);
        Log::info($result);
        if($result['success']) {
            Auth::login($result['user']);
            session()->flash('success', $result['message']);
            $this->reset('firstname', 'lastname', 'username', 'password', 'confirm_password', 'email');
            return redirect('/');
        }
        

        if(isset($result['errors'])) {
            foreach($result['errors']->messages() as $field => $messages) {
                $this->addError($field, $messages[0]);
                
            }
            $this->reset('firstname', 'lastname', 'username', 'password', 'confirm_password', 'email');
        }else{
            session()->flash('error', $result['message']);
            $this->reset('firstname', 'lastname', 'username', 'password', 'confirm_password', 'email');
            $this->showError = true;
        }

        

       
    }
    public function render()
    {
        return view('livewire.signup-form', [
            'barangays' => \App\Models\Baranggay::all(),
        ]);
    }
}
