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
    public function refreshMessages()
    {
        \Illuminate\Support\Facades\Log::info('Real-time message listener triggered for conversation: ' . $this->selectedConversation);
        $this->chatMessages = Message::where('conversation_id', $this->selectedConversation)->get();
        $this->dispatch('message-received-log');
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

        if (!$this->selectedConversation && $this->selectedDepartmentId) {
             $conversation = Conversation::firstOrCreate([
                'user_id' => Auth::id(),
                'department_id' => $this->selectedDepartmentId
            ]);
            $this->selectedConversation = $conversation->id;
        }

        if (!$this->selectedConversation) return;

        try {
            $message = Message::create([
                'conversation_id' => $this->selectedConversation,
                'sender_id' => Auth::id(),
                'message' => $this->newMessage,
            ]);

            // Notify Socket.IO server about the new message
            try {
                $socketUrl = env('SOCKET_IO_URL', 'http://localhost:3000');
                \Illuminate\Support\Facades\Http::post("{$socketUrl}/broadcast-message", [
                    'conversation_id' => $this->selectedConversation,
                    'message' => [
                        'id' => $message->id,
                        'conversation_id' => $message->conversation_id,
                        'sender_id' => $message->sender_id,
                        'message' => $message->message,
                        'created_at' => $message->created_at->toISOString(),
                        'sender' => [
                            'id' => Auth::id(),
                            'first_name' => Auth::user()->first_name,
                            'last_name' => Auth::user()->last_name,
                        ]
                    ]
                ]);
                \Illuminate\Support\Facades\Log::info('Message sent to Socket.IO server successfully!');
            } catch (\Exception $socketError) {
                \Illuminate\Support\Facades\Log::warning('Socket.IO notification failed: ' . $socketError->getMessage());
                // Don't fail the whole operation if Socket.IO is down
            }

            $this->newMessage = '';
            $this->chatMessages = Message::where('conversation_id', $this->selectedConversation)->get();
            $this->dispatch('message-received-log');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('CHAT ERROR: ' . $e->getMessage());
            $this->addError('newMessage', 'Failed to send message. ' . $e->getMessage());
        }
    }

}
