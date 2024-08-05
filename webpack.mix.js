let mix = require('laravel-mix');

mix.js([
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/scripts.js',
], 'public/assets/js/app.js')
    .minify('public/assets/js/app.js')
    .setPublicPath('public');

mix.styles([
    'resources/css/bootstrap.min.css'
], 'public/assets/css/app.css')
    .minify('public/assets/css/app.css');

mix.styles([
    'resources/css/sign-in.css',
], 'public/assets/css/sign-in.css')
    .minify('public/assets/css/sign-in.css');
