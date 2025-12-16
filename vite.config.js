import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/passwordShow.js",
                "resources/js/app.js",
                "resources/js/commentModal.js",
                "resources/js/notifModalToggle.js",
                "resources/js/postPreview.js",
                "resources/js/autocompleteLocation.js",
                "resources/js/Homepage.js"
            ],
            refresh: true, // hot reload
        }),
    ],
    server: {
        hmr: {
            host: 'tagum-uynite.test',
        },
    },
});
