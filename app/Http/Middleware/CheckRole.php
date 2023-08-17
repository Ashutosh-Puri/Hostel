<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,string $role): Response
    {   
        $user = Auth::guard('admin')->user();
        $roleId = Role::where('role', $role)->value('id');
        if (!$user || !$user->hasRole($roleId, 0)) {
            session()->flash('error', 'You are not authorized to access this page.');
            abort(403);
        }
        return $next($request);
    }
}
