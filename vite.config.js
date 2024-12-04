import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {viteStaticCopy} from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        // viteStaticCopy({
        //     targets: [
        //         {
        //             src: 'resources/js/rev-slider',
        //             dest: '../js'
        //         }
        //     ],
        // }),
    ],
    optimizeDeps: {
        include: ['ev-emitter', 'desandro-matches-selector', 'gsap/TweenLite', 'get-size', 'fizzy-ui-utils', 'outlayer', 'masonry-layout', 'outlayer/item', 'isotope-layout', 'isotope-layout/js/layout-mode', 'isotope-layout/js/layout-modes/masonry', 'isotope-layout/js/layout-modes/fit-rows', 'isotope-layout/js/layout-modes/vertical'], // Add CommonJS dependencies here
    },
    build: {
        sourcemap: true,
    },
});
