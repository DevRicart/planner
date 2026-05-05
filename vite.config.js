import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Necessary for Docker/Linux file watching
    server: {
        host: true,

        watch: {
            usePolling: true,
            interval: 1000,
        },

        hmr: {
            host: 'localhost',
        },
    },
});
