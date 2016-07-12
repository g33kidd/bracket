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

 elixir.config.js.browserify.transformers
 	.find(transformer => transformer.name === 'babelify')
 	.options.plugins = [
 		'transform-object-rest-spread',
 		'lodash'
 	];

elixir(function(mix) {
  mix.sass('app.scss');
  mix.browserify('app.js');
  mix.browserify('admin/admin.jsx');
});
