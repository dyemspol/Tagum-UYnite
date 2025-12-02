<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Validator;
class LoginForm extends Component
{
    public $username;
    public $password;

    public function render()
    {
        return view('components.login');
    }

    public function submit(AuthServices $authServices)
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password,
        ];
        $result = $authServices->login($data);

        if($result['success']) {

            session()->flash('success', $result['message']);

            $this->reset('username', 'password');
            
            return redirect('/');
        }

        if (isset($result['errors'])) {
            foreach ($result['errors']->messages() as $field => $messages) {
                $this->addError($field, $messages[0]);
            }
        }else{
            $this->addError('error_message', $result['message']);
        }
    }

    
}
