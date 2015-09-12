var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
 mix.styles([
  'bootstrap.min.css',
  'jasny-bootstrap.css',
  'select2.css',
  'jquery.bootstrap-touchspin.min.css'
 ], 'public/css/app.css');

 mix.scripts([
  'jquery.js',
  'jquery.bootstrap-touchspin.js',
  'select2.js',
  'bootstrap.min.js'
 ], 'public/js/app.js','resources/assets/js');

 mix.version(['css/app.css', 'js/app.js']);
});
