import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import dotenv from 'dotenv';

dotenv.config();

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/filament/admin/theme.css',
                'resources/css/public/public.css',
            ],
            refresh: [
                ...refreshPaths
            ],
        }),
    ],
    server: {
        host: process.env.VITE_HOST || 'localhost',
        watch: {
            usePolling: false,
        },
    }
});
