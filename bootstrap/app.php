<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\SupplierMiddleware;
use App\Http\Middleware\AdminMiddleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
       # $middleware->append(SupplierMiddleware::class);
       # $middleware->append(AdminMiddleware::class);
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
