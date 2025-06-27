<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        // For API requests, don't redirect - just return null
        if ($request->expectsJson() || $request->is('api/*')) {
            return null;
        }

        // For web requests, you can define a login route if needed
        // return route('login');
        return null; // or redirect to your frontend login page
    }
}