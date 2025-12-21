import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;
window.Pusher.logToConsole = true;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: 'tagum-uynite-key',
    wsHost: 'tagumuynite.up.railway.app',
    wsPort: 443,
    wssPort: 443,
    forceTLS: true,
    enabledTransports: ['ws', 'wss'],
});
