import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/postcss'; // <-- DIUBAH KE BARIS INI

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [
                tailwindcss, // <-- Bagian ini tetap sama, tapi sumbernya sudah beda
            ],
        },
    },
});