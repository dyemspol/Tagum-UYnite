<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthServices;
use Illuminate\Support\Facades\Log;

class ForgotPasswordPage extends Component
{
    public $email;
    
    public $showError = false;
    
    public function render()
    {
        return view('livewire.forgot-password-page');
    }

    public function sendResetLink(AuthServices $authServices)
    {
        $data = [
            'email' => $this->email,
        ];
        
        $result = $authServices->sendPasswordResetLink($data);

        if($result['success']) {
            Log::info('Password reset link sent successfully');
            session()->flash('success', $result['message']);
            $this->reset('email');
            $this->showError = false;
        } else {
            $this->showError = true;
            if (isset($result['errors'])) {
                foreach ($result['errors']->messages() as $field => $messages) {
                    $this->addError($field, $messages[0]);
                }
            }
            if (!empty($result['field'])) {
                $this->reset($result['field']); 
            }
        }
    }

    public function clearFieldError($field)
    {
        $this->resetErrorBag($field);
        $this->showError = false;
    }
}

