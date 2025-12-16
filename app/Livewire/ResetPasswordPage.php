<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Log;

class ResetPasswordPage extends Component
{
    public $email;
    public $password;
    public $password_confirmation;
    public $token;
    
    public $showError = false;
    
    public function mount($token = null, $email = null)
    {
        $this->token = $token ?? request()->route('token', '');
        $this->email = $email ?? request()->query('email', '');
    }
    
    public function render()
    {
        return view('livewire.reset-password-page');
    }

    public function resetPassword(AuthServices $authServices)
    {
        $data = [
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token,
        ];
        
        $result = $authServices->resetPassword($data);

        if($result['success']) {
            Log::info('Password reset successfully');
            session()->flash('success', $result['message']);
            $this->reset(['password', 'password_confirmation']);
            $this->showError = false;
            return redirect('/login');
        } else {
            $this->showError = true;
            if (isset($result['errors'])) {
                foreach ($result['errors']->messages() as $field => $messages) {
                    $this->addError($field, $messages[0]);
                }
            }
        }
    }

    public function clearFieldError($field)
    {
        $this->resetErrorBag($field);
        $this->showError = false;
    }
}

