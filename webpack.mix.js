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

//mix.js('resources/assets/js/app.js', 'public/js')
//   .sass('resources/assets/sass/app.scss', 'public/css');

// 공통
mix.js([
        'resources/assets/js/app.js',
        'resources/assets/js/common.js',
    ], 'public/js/common/common.js')
    .sass('resources/assets/sass/common_scss.scss', 'public/css/common.css');


// btc 페이지
mix.js([
        'resources/assets/js/homepage/coin.js'
    ], 'public/js/homepage/coin.js');