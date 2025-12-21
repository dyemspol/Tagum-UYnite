import { io } from 'socket.io-client';

// Connect to Socket.IO server
const socketUrl = import.meta.env.VITE_SOCKET_IO_URL || 'http://localhost:3000';
const socket = io(socketUrl, {
    transports: ['websocket', 'polling'],
    autoConnect: true
});

socket.on('connect', () => {
    console.log('✅ Connected to Socket.IO server:', socket.id);
});

socket.on('disconnect', () => {
    console.log('❌ Disconnected from Socket.IO server');
});

socket.on('connect_error', (error) => {
    console.error('Socket.IO connection error:', error);
});

// Make socket globally available
window.socket = socket;

export default socket;
