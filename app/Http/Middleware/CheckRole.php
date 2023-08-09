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


        Log::info('User:', $user->toArray()); // Convert the user to an array for logging
        Log::info('Desired Role:', [$role]); // Log the desired role in an array
        if (!$user || !$user->hasRole($roleId, 0)) {
            session()->flash('error', 'You are not authorized to access this page.');
            // $this->dispatchBrowserEvent('alert',[
            //     'type'=>'error',
            //     'message'=>"You are not authorized to access this page. Or Check Your Role Status"
            // ]);
            return redirect()->route('not.admin');
        }

        return $next($request);
    }
}
