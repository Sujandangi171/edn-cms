<?php

namespace App\Http\Middleware;

use App\Models\System\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    public function handle(Request $request, Closure $next): Response
    {
        $visitor = Visitor::where('session_id', session()->getId())->first();

        if (!$visitor) {
            Visitor::create([
                'session_id' => session()->getId(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        return $next($request);
    }
}
