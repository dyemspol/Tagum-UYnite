<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Message;
use App\Models\Conversation;

// Get new messages after a specific message ID
Route::get('/messages/{conversationId}/latest', function ($conversationId, Request $request) {
    $afterId = $request->query('after', 0);

    $messages = Message::where('conversation_id', $conversationId)
        ->where('id', '>', $afterId)
        ->with('sender:id,first_name,last_name')
        ->orderBy('created_at', 'asc')
        ->get();

    return response()->json([
        'success' => true,
        'messages' => $messages
    ]);
});

// Send a new message
Route::post('/messages/send', function (Request $request) {
    $validated = $request->validate([
        'conversation_id' => 'required|exists:conversations,id',
        'message' => 'required|string|max:1000',
        'sender_id' => 'required|exists:users,id'
    ]);

    $message = Message::create([
        'conversation_id' => $validated['conversation_id'],
        'sender_id' => $validated['sender_id'],
        'message' => $validated['message'],
    ]);

    return response()->json([
        'success' => true,
        'message' => $message->load('sender:id,first_name,last_name')
    ]);
});

// Get all messages in a conversation
Route::get('/messages/{conversationId}', function ($conversationId) {
    $messages = Message::where('conversation_id', $conversationId)
        ->with('sender:id,first_name,last_name')
        ->orderBy('created_at', 'asc')
        ->get();

    return response()->json([
        'success' => true,
        'messages' => $messages
    ]);
});
