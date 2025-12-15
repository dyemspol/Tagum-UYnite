<?php

namespace App\Livewire;
use App\Models\Department;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatbox extends Component
{
    public $departments;
    public $chatMessages = [];
    public $selectedConversation = null;
    public $selectedDepartmentId = null; 
    public $newMessage;

    public function render()
    {
        return view('livewire.chatbox');
    }

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function selectDepartment($departmentId)
    {
        $this->selectedDepartmentId = $departmentId;
        
        
        $conversation = Conversation::where('user_id', Auth::id())
                        ->where('department_id', $departmentId)
                        ->first();

        if ($conversation) {
            $this->selectedConversation = $conversation->id;
            $this->chatMessages = Message::where('conversation_id', $conversation->id)->get();
        } else {
            $this->selectedConversation = null;
            $this->chatMessages = []; 
        }
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required',
            'selectedDepartmentId' => 'required'
        ]);

        if (!$this->selectedConversation) {
             $conversation = Conversation::create([
                'user_id' => Auth::id(),
                'department_id' => $this->selectedDepartmentId
            ]);
            $this->selectedConversation = $conversation->id;
        }

        Message::create([
            'conversation_id' => $this->selectedConversation,
            'sender_id' => Auth::id(),
            'message' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->chatMessages = Message::where('conversation_id', $this->selectedConversation)->get();
    }

}
