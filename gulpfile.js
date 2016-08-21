var elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(function(mix) {
  mix.sass('app.scss')
  	 .webpack('app.js', 'public/js', 'resources/assets/js/app')
  	 .webpack('admin.js', 'public/js', 'resources/assets/js/admin')
  	 .browserSync({
  	 	proxy: 'bracket'
  	 });

  // I don't care about admin right now..
  // mix.webpack('admin/admin.js');
});
