const mix = require('laravel-mix');

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

mix.js('resources/js/myapp.js', 'public/js')
    .styles([
        'resources/css/home.css', 
        'resources/css/contact.css',
        'resources/css/feedback.css',
        'resources/css/catalog.css',
        'resources/css/footer.css',
        'resources/css/orders.css'
        //
    ], 'public/css/all.css' );
