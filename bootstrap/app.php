<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([

            'admin' => \App\Http\Middleware\Admin::class,
            'Cart' => \Darryldecode\Cart\Facades\CartFacade::class,
            'Paystack' => Unicodeveloper\Paystack\Facades\Paystack::class,

        ]);

    })

    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('bookings:update-pending')->everyMinute();
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

    // 'Cart' => Darryldecode\Cart\Facades\CartFacade::class
