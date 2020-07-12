<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
{
    public const DEFAULT_AUTH_ADMIN = 12345;
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
            if ($user && in_array('superAdmin', $roles)) {
                return $next($request);
            }
            return abort(403, "Vous n'etes pas autorisé");
        }
        else{
            return abort(500, "Vous n'etes pas autorisé");
        }
        
    }
}
