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

mix
  .webpackConfig({
    resolve: {
      alias: {
        'react-dom': '@hot-loader/react-dom'
      }
    }
  })
  .js('resources/js/landing.js', 'public/js')
  .sass('resources/sass/landing.scss', 'public/css');


mix.browserSync({
    proxy: 'localhost:8000',
    open: false
});
