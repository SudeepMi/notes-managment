<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectifNotMaster
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard='superadmin')
    {
        if (!Auth::guard($guard)->check()) {
	        return redirect( route('cpannel.master.loginpage'));
	    }
        return $next($request);
    }
}
