<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Redirect if user is not logged in
        if (!Auth::check()) {
            return redirect()->route('admin.auth.login')->with('error', 'Please log in as an admin.');
        }

        // Redirect if user is not an admin
        if (Auth::user()->role !== 'admin') {
            Auth::logout(); // Logout the non-admin user
            return redirect()->route('admin.auth.login')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }

}
