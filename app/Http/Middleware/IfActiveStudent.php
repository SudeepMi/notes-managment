<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IfActiveStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard='student')
    {
        if (Auth::guard($guard)->user()->status ==1) {
	        return redirect( route('student.home'));
	    }
        return $next($request);
    }
}
