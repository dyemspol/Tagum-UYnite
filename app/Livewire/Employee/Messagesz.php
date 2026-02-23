<?php

namespace App\Livewire\Employee;

use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Message;

class Messagesz extends Component
{
    public $conversations;
    public $chatMessages = [];
    public $selectedConversation;
    public function render()
    {
        return view('livewire.employee.message');
    }
    public function mount()
    {
        $staff = Auth::user();
        if ($staff && $staff->department_id !== null) {
            $this->conversations = Conversation::with('user')
                ->where('department_id', $staff->department_id)
                ->latest('updated_at')
                ->get();
        } else {
            $this->conversations = collect();
        }
    }
    public function selectedConversation($conversationId)
    {
        $staff = Auth::user();
        $chat = Conversation::where('id', $conversationId)
            ->where('department_id', $staff->department_id)
            ->first();

        if ($chat) {
            $this->selectedConversation = $chat->id;
            $this->chatMessages = Message::where('conversation_id', $chat->id)
                ->oldest()
                ->get();
        } else {
            $this->selectedConversation = null;
            $this->chatMessages = collect();
        }
    }
}
