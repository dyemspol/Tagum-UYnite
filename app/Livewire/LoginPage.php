<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Log;

class LoginPage extends Component
{
    public $username;
    public $password;

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

        ];


        $result = $authServices->login($data);

        if ($result['success']) {
            $user = $result['user'];
            Log::info('kaabot pod nenenene diri');
            session()->flash('success', $result['message']);
            if ($user->role == 'superadmin') {
                return redirect('/superadmin');
            }
            if ($user->role == 'employee') {
                return redirect('/dashboard');
            }
            if ($user->role == 'resident') {
                return redirect('/');
            }
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
