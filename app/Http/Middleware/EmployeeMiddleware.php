<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user->role == 'employee') {
            return $next($request);
        } else if ($user->role == 'superadmin') {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        }
        return redirect()->route('login');
    }
}
