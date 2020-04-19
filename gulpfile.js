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


elixir(function(mix) {
 mix.sass('app.scss')
     .copy(
     'vendor/bower_components/jquery/dist/jquery.min.js',
     'public/js/vendor/jquery.js'
 )
     .copy(
     'vendor/bower_components/bootstrap/dist/css/bootstrap.css',
     'public/css/vendor/bootstrap.css'
 )     .copy(
     'vendor/bower_components/bootstrap/dist/js/bootstrap.js',
     'public/js/vendor/bootstrap.js'
 )
     .copy(
     'vendor/bower_components/bootstrap/fonts',
     'public/css/fonts'
 )
     .copy(
     'vendor/bower_components/font-awesome/fonts',
     'public/css/fonts'
 )   .copy(
     'vendor/bower_components/font-awesome/css',
     'public/css'
 )   .copy(
     'vendor/bower_components/hideshowpassword/hideShowPassword.min.js',
     'public/js/vendor/hideShowPassword.min.js'
 ) .copy(
     'vendor/bower_components/hideshowpassword/vendor/modernizr.custom.js',
     'public/js/vendor/modernizr.custom.js'
 );
});

//
//elixir(function(mix) {
//    mix.sass('app.scss');
//
// //mix.scripts([
// // 'jquery/dist/jquery.js',
// // 'bootstrap/dist/js/bootstrap.js'
// //], 'public/js/vendor.js');
//
//});
