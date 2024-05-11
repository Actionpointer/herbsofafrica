<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next,$role): Response
    {
        $roles = $request->user()->role ?? [];
        abort_unless(in_array($role,$roles),404,'You do not have permission to view this page');
        return $next($request);
    }
}
