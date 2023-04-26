<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (str_contains($role, $request->user()->role)) {
            return $next($request);
        }

        abort(403, 'Недостаточно прав доступа' . $role, ['Error'=>'Access right error']);
    }
}
