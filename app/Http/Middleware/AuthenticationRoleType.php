<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticationRoleType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('role')){

        }
        return $next($request);
    }
}
