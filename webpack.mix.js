let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/thread_list.js', 'public/js')
    .js('resources/assets/js/thread_main.js', 'public/js')
    .sass('resources/assets/sass/thread_list.scss', 'public/css')
    .sass('resources/assets/sass/thread_main.scss', 'public/css')
    .copy('resources/assets/css/bootstrap.min.css', 'public/css')
;
