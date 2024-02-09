<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SignInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validationAdmin = session()->has('id');
        if(!$validationAdmin) return redirect()->route('dashboard_login')->with('error', 'You dont have to access the page! Login first');
        return $next($request);
    }
}
