import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/CSS/app.CSS', 'resources/JS/app.JS'],
            refresh: true,
        }),
    ],
});
