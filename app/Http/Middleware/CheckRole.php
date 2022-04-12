<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //NEW
    // public function handle($request, Closure $next)
    // {
    //     $roles = $this->getRequiredRoleForRoute($request->route());
    //     if ($request->user()->hasRole($roles) || !$roles)
    //     {
    //         return $next($request);
    //     }

    //     return redirect('/welcome');
    // }
    
    // private function getRequiredRoleForRoute($route)
    // {
    //     $actions = $route->getAction();
    //     return isset($actions['roles']) ? $actions['roles'] : null;
    // }
    // OLD
    public function handle($request, Closure $next,...$roles)
    {
        if(in_array($request->user()->role,$roles)){
            return $next($request);
        }
        return redirect('/');
    }
}
