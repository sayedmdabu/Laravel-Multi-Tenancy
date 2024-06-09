import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/app/css/app.css',
                'resources/app/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
