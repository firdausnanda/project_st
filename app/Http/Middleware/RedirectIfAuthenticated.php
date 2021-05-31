<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->role == 'superadmin') {
                return redirect('/admin');
            }elseif (Auth::user()->role == 'admin') {
                return redirect('/prodi');
            }elseif (Auth::user()->role == 'user') {
                return redirect('/user');
            }else{
                return redirect('/login');
            }
            // return redirect('/');
        }
        return $next($request);
    }
}
