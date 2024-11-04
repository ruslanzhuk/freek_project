<?php

namespace App\Http;

use App\Http\Middleware\CheckAuthenticated;

class Kernel
{
    protected $routeMiddleware = [
        'check.auth' => CheckAuthenticated::class,
    ];
}
