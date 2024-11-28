<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\ForceJsonRequestHeader;
use App\Http\Middleware\Cors;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
      $middleware->append(ForceJsonRequestHeader::class);
      $middleware->append(Cors::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        // $exceptions->render(function (AuthenticationException $e, Request $request) {

        //     return response()->json([                
        //         'success' => false,
        //         'message' => 'Not Authorized',
        //         'data' => null        
        //     ], 401);
        // });
    })->create();