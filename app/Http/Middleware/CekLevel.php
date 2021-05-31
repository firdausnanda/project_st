<?php

namespace App\Http\Middleware;

use Closure;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$levels)
    {
        $user = $request->user();

        if($user) {
            if ($user->isSuperAdmin()) {
                return $next($request);
            }
        }
        return redirect('/');
        //return $next($request);
    }
}
