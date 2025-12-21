/**
 * Tagum-UYnite Chat Client
 * Pure JavaScript client for connecting to the chat API
 * 
 * Usage:
 * const chat = new TagumChatClient('https://tagumuynite.up.railway.app', conversationId, userId);
 * chat.onNewMessage((message) => {
 *     console.log('New message:', message);
 * });
 * chat.sendMessage('Hello!');
 */

class TagumChatClient {
    constructor(baseUrl, conversationId, userId) {
        this.baseUrl = baseUrl;
        this.conversationId = conversationId;
        this.userId = userId;
        this.lastMessageId = 0;
        this.pollingInterval = null;
        this.messageCallbacks = [];
        this.errorCallbacks = [];

        console.log(`[TagumChat] Initialized for conversation ${conversationId}`);
    }

    /**
     * Start listening for new messages
     * @param {number} intervalMs - Polling interval in milliseconds (default: 3000)
     */
    start(intervalMs = 3000) {
        console.log(`[TagumChat] Starting polling every ${intervalMs}ms`);

        // Load initial messages
        this.loadAllMessages();

        // Start polling for new messages
        this.pollingInterval = setInterval(() => {
            this.pollNewMessages();
        }, intervalMs);
    }

    /**
     * Stop listening for new messages
     */
    stop() {
        if (this.pollingInterval) {
            clearInterval(this.pollingInterval);
            this.pollingInterval = null;
            console.log('[TagumChat] Stopped polling');
        }
    }

    /**
     * Register a callback for new messages
     * @param {Function} callback - Function to call when new message arrives
     */
    onNewMessage(callback) {
        this.messageCallbacks.push(callback);
    }

    /**
     * Register a callback for errors
     * @param {Function} callback - Function to call when error occurs
     */
    onError(callback) {
        this.errorCallbacks.push(callback);
    }

    /**
     * Load all messages in the conversation
     */
    async loadAllMessages() {
        try {
            const response = await fetch(`${this.baseUrl}/api/messages/${this.conversationId}`);
            const data = await response.json();

            if (data.success && data.messages.length > 0) {
                this.lastMessageId = data.messages[data.messages.length - 1].id;
                console.log(`[TagumChat] Loaded ${data.messages.length} messages`);

                // Trigger callbacks for all messages
                data.messages.forEach(message => {
                    this.messageCallbacks.forEach(cb => cb(message));
                });
            }
        } catch (error) {
            console.error('[TagumChat] Error loading messages:', error);
            this.errorCallbacks.forEach(cb => cb(error));
        }
    }

    /**
     * Poll for new messages
     */
    async pollNewMessages() {
        try {
            const response = await fetch(
                `${this.baseUrl}/api/messages/${this.conversationId}/latest?after=${this.lastMessageId}`
            );
            const data = await response.json();

            if (data.success && data.messages && data.messages.length > 0) {
                console.log(`[TagumChat] Received ${data.messages.length} new message(s)`);

                // Update last message ID
                this.lastMessageId = data.messages[data.messages.length - 1].id;

                // Trigger callbacks for each new message
                data.messages.forEach(message => {
                    this.messageCallbacks.forEach(cb => cb(message));
                });
            }
        } catch (error) {
            console.error('[TagumChat] Polling error:', error);
            this.errorCallbacks.forEach(cb => cb(error));
        }
    }

    /**
     * Send a message
     * @param {string} text - Message text
     * @returns {Promise<Object>} - Response data
     */
    async sendMessage(text) {
        try {
            const response = await fetch(`${this.baseUrl}/api/messages/send`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    conversation_id: this.conversationId,
                    sender_id: this.userId,
                    message: text
                })
            });

            const data = await response.json();

            if (data.success) {
                console.log('[TagumChat] Message sent successfully');
                return data.message;
            } else {
                throw new Error('Failed to send message');
            }
        } catch (error) {
            console.error('[TagumChat] Error sending message:', error);
            this.errorCallbacks.forEach(cb => cb(error));
            throw error;
        }
    }
}

// Example usage:
/*
// Initialize the client
const chat = new TagumChatClient(
    'https://tagumuynite.up.railway.app',  // Base URL
    123,                                     // Conversation ID
    456                                      // User ID
);

// Listen for new messages
chat.onNewMessage((message) => {
    console.log('New message from:', message.sender.first_name);
    console.log('Text:', message.message);
    console.log('Time:', message.created_at);
    
    // Display in your UI
    displayMessage(message);
});

// Handle errors
chat.onError((error) => {
    console.error('Chat error:', error);
});

// Start listening (polls every 3 seconds)
chat.start(3000);

// Send a message
document.getElementById('sendButton').addEventListener('click', async () => {
    const text = document.getElementById('messageInput').value;
    try {
        await chat.sendMessage(text);
        document.getElementById('messageInput').value = '';
    } catch (error) {
        alert('Failed to send message');
    }
});

// Stop listening when done
// chat.stop();
*/
