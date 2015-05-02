<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Password;
use Validator;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     */
    public function register()
    {
        //$this->customPasswordValidation();
    }

    /**
     * Customize validator & password broker password validation rule.
     *
     */
    protected function customPasswordValidation()
    {
        $passwordRegex = '/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*._-])[a-zA-Z0-9!@#$%^&*._-]{8,}$/';

        Validator::extend('password', function ($attribute, $value, $parameters) use ($passwordRegex)
        {
            return preg_match($passwordRegex, $value);
        });

        Password::validator(function ($credentials) use ($passwordRegex)
        {
            return preg_match($passwordRegex, $credentials['password']);
        });
    }

}
