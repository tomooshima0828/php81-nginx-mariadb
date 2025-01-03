import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
      host: true,
      hmr: {
          host: 'localhost',
      }
    },
    css: {
        postcss: {
            plugins: [tailwindcss],
        },
    },
});
