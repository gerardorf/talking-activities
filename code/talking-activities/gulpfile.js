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
    mix.sass(['app.scss',
        'callToAction.css'
    ], 'public/css/app.css');

    mix.scripts([
        'app.js',
        'routes.js'
    ], 'public/js/app.js');

    mix.scripts([
        'login/*.js'
    ], 'public/js/login.js');

    mix.scripts([
        'welcome/*.js'
    ], 'public/js/welcome.js');
    
    mix.copy('resources/assets/html/views', 'public/views');
});
