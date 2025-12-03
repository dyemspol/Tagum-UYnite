<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthServices;
class LoginPage extends Component
{
    public $username;
    public $password;
    public $rememberMe = false;
    public $showError = false;
    public function render()
    {
        return view('livewire.login-page');
    }

    public function submit(AuthServices $authServices)
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'rememberMe' => $this->rememberMe,
        ];
        

        $result = $authServices->login($data);

        if($result['success']) {

            session()->flash('success', $result['message']);
            return redirect('/');
        } else {
            $this->showError = true;
            if (!empty($result['field'])) {
            $this->reset($result['field']); 
            }
        }
    }

    public function clearFieldError($field)
    {
        $this->resetErrorBag($field);
    }
}
