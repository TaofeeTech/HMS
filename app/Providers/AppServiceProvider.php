<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Unicodeveloper\Paystack\PaystackServiceProvider::class,
        // Unicodeveloper\Paystack\PaystackServiceProvider::class;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
