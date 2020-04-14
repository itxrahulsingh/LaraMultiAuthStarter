<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (!Auth::guard('admin')->check()){
//            this will redirect user to admin login page
//            return redirect('/admin/login');
//            This Abort the route and shoe 404 Error
            return abort('404','you have some typo in your Url Please Recheck');
        }
        return $next($request);
    }
}
