<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,string $role)
    {

        $roles = [
            'admin' => [1],
            'user' => [2]
        ];

        $roleIDs = $roles[$role] ?? [];

        if(!in_array(auth()->user->user_level_id,$roleIDs)){
            abort(403);
        }


        return $next($request);
    }
}
