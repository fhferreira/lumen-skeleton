<?php namespace App\Providers;

use Event;
use Illuminate\Events\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Event::listen('App\Events\ErrorOccurred', 'App\Jobs\EmailErrorReport@handle');
        //Event::listen('App\Events\UserCreated', 'App\Jobs\EmailUserCredentials@handle');
    }

}
