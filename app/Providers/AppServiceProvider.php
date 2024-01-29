<?php

namespace App\Providers;

use App\CoreExtensions\SessionGuardExtended;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if(config('app.env') !== 'development') {
            URL::forceScheme('https');
        }
        //

        /**
         * Extending Illuminate\Auth\SessionGuard()
         * This is so we can store the OAuth tokens in the session
         */
        Auth::extend(
            'sessionExtended',
            function ($app) {

                $guard = new SessionGuardExtended(
                    'sessionExtended',
                    new BarbieUserProvider(),
                    app()->make('session.store'),
                    request()
                );

                // When using the remember me functionality of the authentication services we
                // will need to be set the encryption instance of the guard, which allows
                // secure, encrypted cookie values to get generated fosr those cookies.
                if (method_exists($guard, 'setCookieJar')) {
                    $guard->setCookieJar($this->app['cookie']);
                }

                if (method_exists($guard, 'setDispatcher')) {
                    $guard->setDispatcher($this->app['events']);
                }

                if (method_exists($guard, 'setRequest')) {
                    $guard->setRequest($this->app->refresh('request', $guard, 'setRequest'));
                }

                return $guard;
            }
        );

    }
}
