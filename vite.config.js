import { defineConfig } from 'vite';

export default defineConfig({
    build: {
        outDir: 'public/dist',
        assetsDir: 'assets',
        manifest: true,
        rollupOptions: {
            input: {
                app: 'resources/js/app.js',
                frontend: 'resources/js/frontend.js',
            },
        },
    },
});
