<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $role = strtolower(trim((string) ($user->role ?? '')));

            if ($role === 'admin') {
                return $next($request);
            }

            // Auto-promote first or single user if role is empty or user
            try {
                if (empty($role) || \App\Models\User::count() === 1) {
                    $user->role = 'admin';
                    $user->save();
                    return $next($request);
                }
            } catch (\Throwable $e) {
                // Ignore DB error during count check
            }

            return redirect()->route('home')->with('error', 'Administrator access required.');
        }

        return redirect()->route('login')->with('error', 'Please log in to access the admin panel.');
    }
}
