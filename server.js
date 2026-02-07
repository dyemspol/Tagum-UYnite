const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const cors = require('cors');

const app = express();
const server = http.createServer(app);

// Middleware
app.use(cors());
app.use(express.json());

// Socket.IO setup
const io = new Server(server, {
    cors: {
        origin: process.env.FRONTEND_URL || "http://localhost",
        methods: ["GET", "POST"],
        credentials: true
    }
});

// Health check endpoint
app.get('/health', (req, res) => {
    res.json({ status: 'ok', connections: io.engine.clientsCount });
});

// Laravel calls this endpoint when a message is sent
app.post('/broadcast-message', (req, res) => {
    const { conversation_id, message } = req.body;

    console.log(`Broadcasting message to conversation-${conversation_id}:`, message);

    // Broadcast to all clients in this conversation room
    io.to(`conversation-${conversation_id}`).emit('new-message', message);

    res.json({ success: true, broadcasted_to: `conversation-${conversation_id}` });
});

// Socket.IO connection handling
io.on('connection', (socket) => {
    console.log('Client connected:', socket.id);

    // Join a conversation room
    socket.on('join-conversation', (conversationId) => {
        socket.join(`conversation-${conversationId}`);
        console.log(`Socket ${socket.id} joined conversation-${conversationId}`);
        socket.emit('joined-conversation', { conversation_id: conversationId });
    });

    // Leave a conversation room
    socket.on('leave-conversation', (conversationId) => {
        socket.leave(`conversation-${conversationId}`);
        console.log(`Socket ${socket.id} left conversation-${conversationId}`);
    });

    socket.on('disconnect', () => {
        console.log('Client disconnected:', socket.id);
    });
});

const PORT = process.env.PORT || 3000;

server.listen(PORT, '0.0.0.0', () => {
    console.log(`Socket.IO server running on port ${PORT}`);
});
