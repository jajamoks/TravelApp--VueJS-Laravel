<?php

namespace App\Providers;

use App\AuthorizeTransaction;
use Illuminate\Support\ServiceProvider;

class AuthorizeServiceProvider extends ServiceProvider
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
        $this->app->bind(AuthorizeTransaction::class, function () {
            return function (\App\User $user, $paymentInfo, \App\EscapeCart $escapeCart) {
                return new AuthorizeTransaction($user, $paymentInfo, $escapeCart);
            };
        });

    }
}
