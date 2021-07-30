<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
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
        //print_r(Auth::guard($guard));die;
        if(!Auth::guard('admin')->check()){
            //echo '1'; die();
            return redirect('admin/login');
        }
        return $next($request);
    }
}
