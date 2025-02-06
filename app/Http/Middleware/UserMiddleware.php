<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class UserMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(!in_array('user', $request->user()->role))
        {
            abort(403,'شما ثبت نام نکرده اید');
        }
        return $next($request);
    }

}
