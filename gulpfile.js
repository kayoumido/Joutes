const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    /*mix.sass('app.scss')
       .webpack('app.js');*/
       mix.scripts([
        	"custom/alert-popup.js",
        	"custom/footer.js",
        	"custom/form-validations.js",
        	"custom/login-popup.js",
        	"custom/select2.js",
        	"custom/tables.js",
        	"custom/tournament.schedule.open.js",
            "custom/page-return.js",
            "custom/score-edition.js",
    	]);
});
