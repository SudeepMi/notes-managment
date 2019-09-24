<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectifAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard='admin')
    {
        if (Auth::guard($guard)->check()) {
	        return redirect( route('cpannel.admin.home'));
	    }
        return $next($request);
    }
}
