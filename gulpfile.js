var elixir = require("laravel-elixir");

elixir(function (mix)
{
    mix.less('app.less')
        .scripts(['app.js'], 'public/js/app.js', 'resources/assets/js');
});
