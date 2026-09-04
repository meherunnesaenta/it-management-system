<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check() || !method_exists(auth()->user(), 'hasRole') || !auth()->user()->hasRole($role)) {
            abort(403, 'Unauthorized access. You need ' . $role . ' role.');
        }

        return $next($request);
    }
}
