# Tagum-UYnite Chat API - External Client Guide

## For JavaScript Developers

This guide shows you how to connect to the Tagum-UYnite chat system using pure JavaScript.

## Quick Start

### 1. Include the Client Library

```html
<script src="https://tagumuynite.up.railway.app/tagum-chat-client.js"></script>
```

### 2. Initialize the Client

```javascript
const chat = new TagumChatClient(
    'https://tagumuynite.up.railway.app',  // Base URL
    123,                                     // Your conversation ID
    456                                      // Your user ID
);
```

### 3. Listen for Messages

```javascript
chat.onNewMessage((message) => {
    console.log('New message:', message);
    // message.id - Message ID
    // message.message - Message text
    // message.sender.first_name - Sender's first name
    // message.sender.last_name - Sender's last name
    // message.created_at - Timestamp
});
```

### 4. Start Listening

```javascript
chat.start(3000); // Poll every 3 seconds
```

### 5. Send Messages

```javascript
await chat.sendMessage('Hello from JavaScript!');
```

## Complete Example

```html
<!DOCTYPE html>
<html>
<head>
    <title>My Chat App</title>
</head>
<body>
    <div id="messages"></div>
    <input type="text" id="input" />
    <button id="send">Send</button>

    <script src="https://tagumuynite.up.railway.app/tagum-chat-client.js"></script>
    <script>
        const chat = new TagumChatClient(
            'https://tagumuynite.up.railway.app',
            1,  // conversation_id
            2   // user_id
        );

        chat.onNewMessage((msg) => {
            const div = document.getElementById('messages');
            div.innerHTML += `<p><b>${msg.sender.first_name}:</b> ${msg.message}</p>`;
        });

        chat.start(3000);

        document.getElementById('send').onclick = async () => {
            const text = document.getElementById('input').value;
            await chat.sendMessage(text);
            document.getElementById('input').value = '';
        };
    </script>
</body>
</html>
```

## API Endpoints

### Get New Messages
```
GET /api/messages/{conversationId}/latest?after={lastMessageId}
```

### Send Message
```
POST /api/messages/send
Body: {
    "conversation_id": 123,
    "sender_id": 456,
    "message": "Hello!"
}
```

### Get All Messages
```
GET /api/messages/{conversationId}
```

## Live Demo

Visit: `https://tagumuynite.up.railway.app/chat-demo.html`

## Message Object Structure

```javascript
{
    "id": 789,
    "conversation_id": 123,
    "sender_id": 456,
    "message": "Hello!",
    "created_at": "2025-12-22T02:30:00.000000Z",
    "sender": {
        "id": 456,
        "first_name": "John",
        "last_name": "Doe"
    }
}
```

## Methods

### `chat.start(intervalMs)`
Start polling for new messages.
- `intervalMs`: Polling interval in milliseconds (default: 3000)

### `chat.stop()`
Stop polling for messages.

### `chat.onNewMessage(callback)`
Register a callback for new messages.
- `callback`: Function that receives a message object

### `chat.onError(callback)`
Register a callback for errors.
- `callback`: Function that receives an error object

### `chat.sendMessage(text)`
Send a message.
- `text`: Message text
- Returns: Promise that resolves with the sent message

### `chat.loadAllMessages()`
Load all messages in the conversation.

## Notes

- The client uses **polling** (checks for new messages every 3 seconds by default)
- No WebSockets required - works everywhere!
- CORS is enabled for all origins
- Messages are fetched in chronological order
- The client automatically tracks the last message ID to only fetch new messages

## Support

For questions, contact the Tagum-UYnite team.
