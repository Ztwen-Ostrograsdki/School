<?php

namespace App\Http\Middleware;

use Closure;

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
        $user = $request->user();

        if ($user) {
            $roles = $user->getRoles();
            if ($user && in_array('superAdmin', $roles) || in_array('admin', $roles)) {
                return $next($request);
            }
            return abort(403, "Vous n'etes pas autorisé");
        }
        else{
            return abort(500, "Vous n'etes pas autorisé");
        }
        
    }
    
}
