import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import {normalizePath} from "vite";

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [normalizePath('resources/css/app.css'), normalizePath('resources/js/app.js')],
            refresh: true,
        }),
    ],
});
