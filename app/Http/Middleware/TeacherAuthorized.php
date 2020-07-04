<?php

namespace App\Http\Middleware;

use App\Models\Teacher;
use Closure;

class TeacherAuthorized
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
        if ($user->teachers->toArray()!== []) {
            return $next($request);
        }
        abort(403, "Vous n'êtes pas autorisé");
    }
}
