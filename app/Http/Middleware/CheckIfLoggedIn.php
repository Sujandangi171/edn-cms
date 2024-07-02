<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if (isset(Auth::user()->id)) {
            return redirect()->route('home.index');
        }
        return $next($request);
    }
}
