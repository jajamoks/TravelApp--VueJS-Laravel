<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ymlp;

class YmlpServiceProvider extends ServiceProvider
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
        $this->app->singleton(Ymlp::class, function ($app) {
            return new Ymlp(config('ymlp'));
        });
    }
}
