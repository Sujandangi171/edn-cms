<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSystemAuth
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()) {
            return redirect()->route('login')->withErrors(['error' => 'Please login to continue']);
        }
        return $next($request);
    }
}
