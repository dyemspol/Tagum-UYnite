# Tagum-UYnite WebSocket Server Deployment

## Quick Deploy to Railway:

1. Open terminal in the `websocket-deploy` folder
2. Run: `railway login` (if not already logged in)
3. Run: `railway init`
4. Select your project: "Tagum-UYnite"
5. Create new service: "tagum-uynite-websocket"
6. Run: `railway up`
7. Run: `railway domain` to generate a public URL
8. Copy the URL (e.g., `tagum-uynite-websocket.up.railway.app`)

## Set Environment Variables:

In Railway dashboard for the websocket service:
- `FRONTEND_URL` = `https://tagumuynite.up.railway.app`

## Then update your main Laravel app's Railway variables:
- `SOCKET_IO_URL` = `https://tagum-uynite-websocket.up.railway.app`
- `VITE_SOCKET_IO_URL` = `https://tagum-uynite-websocket.up.railway.app`

## Local Testing:
```bash
cd websocket-deploy
npm install
node server.js
```

Server will run on http://localhost:3000
