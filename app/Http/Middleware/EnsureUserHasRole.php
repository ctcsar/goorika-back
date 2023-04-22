<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($request->user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Недостаточно прав доступа', ['Error'=>'Access right error']);
    }
}
