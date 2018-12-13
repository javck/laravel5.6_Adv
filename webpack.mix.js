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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

//將以下樣式表壓成public/css/all.css
mix.styles([
    'public/css/bootstrap.css',
    'public/style.css',
    'public/css/dark.css',
    'public/css/font-icons.css',
    'public/css/animate.css',
    'public/css/magnific-popup.css',
    'public/css/responsive.css',
    'public/include/rs-plugin/css/settings.css',
    'public/include/rs-plugin/css/layers.css',
    'public/include/rs-plugin/css/navigation.css',
], 'public/css/all.css');

//將以下js壓成public/js/all.js
mix.scripts([
    'public/js/jquery.js',
    'public/js/plugins.js',
    'public/js/functions.js',
    'public/include/rs-plugin/js/jquery.themepunch.tools.min.js',
    'public/include/rs-plugin/js/jquery.themepunch.revolution.min.js',
    'public/include/rs-plugin/js/extensions/revolution.extension.video.min.js',
    'public/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js',
    'public/include/rs-plugin/js/extensions/revolution.extension.actions.min.js',
    'public/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js',
    'public/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js',
    'public/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js',
    'public/include/rs-plugin/js/extensions/revolution.extension.migration.min.js',
    'public/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js',
], 'public/js/all.js');

//將resources/assets/images/home_bg.jpg檔案複製到public/images/home_bg.jpg
mix.copy('resources/assets/images/home_bg.jpg', 'public/images/home_bg.jpg');

//關掉Mix的通知popup視窗
mix.disableNotifications();
