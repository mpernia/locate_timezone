<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Src\Shared\Infrastructure\Middlewares\SetLocale;
use Src\Shared\Infrastructure\Middlewares\SetTimeZone;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../src/Shared/Routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('api', [
            SetLocale::class,
            SetTimeZone::class,
        ]);
        /*$middleware->api(prepend: [
            SetLocale::class,
            SetTimeZone::class,
        ]);*/
        //$middleware->append(SetLocale::class);
        //$middleware->append(SetTimeZone::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
