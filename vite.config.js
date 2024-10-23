import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue2'; // or '@vitejs/plugin-vue' for Vue 3
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
});
