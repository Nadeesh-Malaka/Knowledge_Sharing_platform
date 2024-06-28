<?php

// app/Http/Kernel.php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Global HTTP middleware stack
    protected $middleware = [
        // Other global middleware
    ];

    // Middleware groups
    protected $middlewareGroups = [
        'web' => [
            // Other web middleware
            //add mee

            
        ],

        'api' => [
            // Other api middleware
        ],
    ];

    // Route middleware
    protected $routeMiddleware = [

        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'admin' => \App\Http\Middleware\Admin::class, // Register your admin middleware here
    ];
}
