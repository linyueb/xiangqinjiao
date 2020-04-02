<?php

namespace Lyue\Restful\Jwt;


use Illuminate\Support\ServiceProvider;

class JwtProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Jwt', function ($app) {
            return new Jwt($app);
        });
    }
}
