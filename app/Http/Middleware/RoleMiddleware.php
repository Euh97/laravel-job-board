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
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // ...$roles : variadic parameter to accept multiple roles. byst2bl 3a shakel array bl parameter
        if(auth()->check()){
            $role = auth()->user()->role;
            $hasAccess = in_array($role, $roles);
            if(!$hasAccess){
                return abort(403);   
            }
        }
        
        return $next($request);
    }
}
