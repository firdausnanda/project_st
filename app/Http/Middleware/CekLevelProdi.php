<?php

namespace App\Http\Middleware;

use Closure;

class CekLevelProdi
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
        $user = $request->user();

        if($user) {
            if ($user->isProdi()) {
                return $next($request);
            }
        }
        return redirect('/');
        //return $next($request);
    }
}
