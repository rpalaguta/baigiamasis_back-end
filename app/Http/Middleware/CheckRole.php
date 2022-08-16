<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        /** @var User */
        $user = Auth::User();

        $roles = explode('|', $role);
        // dd($roles);
        // dd(Auth::user());
        if (! $user->containsRoles($roles)) {
            abort(401, 'This action is unauthorized.');
        }
        return $next($request);
    }
}
