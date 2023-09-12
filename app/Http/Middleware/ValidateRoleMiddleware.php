<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if an user is logged in
        if (!$request->user()) {
            return redirect()->route('login');
        }

        if (
            $request->user()->role_id == UserRole::SuperAdministrator ||
            $request->user()->role_id == UserRole::Administrator
        ) {
            return $next($request);
        }



        abort(403, 'You are not authorized to access this page.');
    }
}
