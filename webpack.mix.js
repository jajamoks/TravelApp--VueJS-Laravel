const { mix } = require('laravel-mix');
const webpack = require('webpack');
/*if(process.NODE_ENV !== 'production') {
    var BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
    mix.webpackConfig({
        plugins: [new BundleAnalyzerPlugin()]
    });
} */
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
  .copy('node_modules/tinymce/skins/lightgray/content.min.css', 'public/js/skins/lightgray/content.min.css', false)
  .copy('node_modules/tinymce/skins/lightgray', 'public/js/skins/lightgray', false)
  .copy('node_modules/tinymce/plugins/image', 'public/js/plugins/image', false)
  .copy('node_modules/tinymce/plugins/lists', 'public/js/plugins/lists', false)
  .copy('node_modules/tinymce/plugins/media', 'public/js/plugins/media', false)
  .js('resources/assets/js/public', 'public/js')
  .sass('resources/assets/sass/public.scss', 'public/css')
  .sass('resources/assets/sass/admin.scss', 'public/css')
  .sass('resources/assets/sass/user.scss', 'public/css')
  .copy('resources/assets/js/vendor/markerwithlabel.js', 'public/js')
  .copy('resources/assets/js/vendor/markerwithlabel.js', 'public/js')
  .extract([
    'jquery',
    'slick-carousel',
    'bootstrap-sass/assets/javascripts/bootstrap',
    'jquery.easing',
    'jquery-backstretch',
    'hammerjs',
    'vue',
    './resources/assets/js/vendor/jquery.youtubebackground',
  ])
  .options({
    processCssUrls: false,
  })
  .js('resources/assets/js/user', 'public/js')
  .js('resources/assets/js/admin', 'public/js')
  .webpackConfig({
    resolve: {
      modules: ['node_modules'],
      alias: {
        vue$: 'vue/dist/vue.js',
      },
    },
  })
  .version();
