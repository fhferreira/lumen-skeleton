<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['flash'];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('flash', function ()
        {
            return $this->app->make('App\Services\Flasher');
        });
    }

}
