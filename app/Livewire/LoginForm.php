<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Validator;

class LoginForm extends Component
{
    public $username;
    public $password;
    public $showLoginModal = false;

    public function render()
    {
        return view('livewire.login-form');
    }
    public function mount()
    {
        $this->showLoginModal = true;
    }
    public function submit(AuthServices $authServices)
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password,
        ];
        $result = $authServices->login($data);

        if ($result['success']) {
            $user = $result['user'];
            session()->flash('success', $result['message']);

            if ($user->role == 'employee') {
                return redirect('/dashboard');
            } else if ($user->role == 'superadmin') {
                return redirect('/superadmin');
            } else {
                return redirect('/');
            }
        }
        $this->reset('username', 'password');



        if (isset($result['errors'])) {
            foreach ($result['errors']->messages() as $field => $messages) {
                $this->addError($field, $messages[0]);
            }
        } else {
            $this->addError('error_message', $result['message']);
        }

        if (isset($result['errors'])) {
            $this->reset('username', 'password');
        }
    }

    public function openLoginModal()
    {
        $this->showLoginModal = true;
    }
    public function closeLoginModal()
    {
        $this->showLoginModal = false;
    }
}
