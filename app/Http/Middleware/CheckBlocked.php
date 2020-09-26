<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->blocked_at ) {
            auth()->logout();
            return redirect()->route('login')->with(['error' => 'Your account has been blocked. Please contact administrator']);
        }

        return $next($request);
    }
}
