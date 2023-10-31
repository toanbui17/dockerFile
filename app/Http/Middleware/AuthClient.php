<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->lever == 0 || Auth::user()->lever == 1) {
            # code...
            return $next($request);
        }else{
            return back()->withErrors([
                'msg'   => 'khong co quyen truy cap',
            ]);
        }
    }
}
