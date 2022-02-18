<?php

namespace App\Http\Middleware;

use Closure;

class IsWholesale
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
        $user = auth()->user();
        if(!$user){
            return abort(404);
        } else {
            if($user->is_admin){
                return $next($request);
            } elseif($user->is_wholesaler){
                return $next($request);
            } else {
                return abort(404);
            }
        }
    }
}
