<?php

use App\Http\Middleware\EndMiddleware;
use App\Http\Middleware\StartMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // //antes global:
        // $middleware->prepend([
        //     StartMiddleware::class
        // ]);
        // //global depois
        // $middleware->append([
        //     EndMiddleware::class
        // ]);

        //grupo middleware
        $middleware->prependToGroup('lancar_antes',[
            StartMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
