<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->admin == '1'){
                return $next($request);
            }
        }
        return redirect()->action('AdminController@login')->with('not_admin', 'You are not admin of this site'); 
    }
}
