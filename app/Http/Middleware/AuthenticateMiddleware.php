<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna telah login
        if (Auth::check()) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login
        return redirect('/login');
    }
}
