<?php

namespace App\Livewire\Employee;

use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class Messagesz extends Component
{
    public $conversations;
    public $chatMessages = [];
    public $selectedConversationId = null;
    public $newMessage;
    public $activeConversation;
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
            $this->selectedConversationId = $chat->id;
            $this->activeConversation = $chat;
            $this->chatMessages = Message::where('conversation_id', $chat->id)
                ->get();
        } else {
            $this->selectedConversationId = null;
            $this->chatMessages = collect();
        }
    }
    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required',
            'selectedConversationId' => 'required|exists:conversations,id'
        ]);

        if (!$this->selectedConversationId) return;

        try {
            Conversation::find($this->selectedConversationId)->touch();

            $message = Message::create([
                'conversation_id' => $this->selectedConversationId,
                'sender_id' => Auth::id(),
                'message' => $this->newMessage,
            ]);

            Log::info('Message saved successfully!');
            $this->mount();
            $this->newMessage = '';
            $this->chatMessages = Message::where('conversation_id', $this->selectedConversationId)->get();
            $this->dispatch('message-received-log');
        } catch (\Exception $e) {
            Log::error('CHAT ERROR: ' . $e->getMessage());
            $this->addError('newMessage', 'Failed to send message. ' . $e->getMessage());
        }
    }
}
