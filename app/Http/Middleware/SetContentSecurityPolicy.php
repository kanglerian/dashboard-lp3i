<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header('Content-Security-Policy', "frame-ancestors 'self' http://politekniklp3i-tasikmalaya.ac.id");

        return $response;
    }
}
