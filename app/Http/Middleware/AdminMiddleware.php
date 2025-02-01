<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = json_decode($request->user()->role, true);
        if (!is_array($roles) || !in_array('admin', $roles)) {
            abort(403, 'شما ادمین نیستید');
        }

        return $next($request);
    }
}
