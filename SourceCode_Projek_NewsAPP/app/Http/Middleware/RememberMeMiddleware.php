<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RememberMeMiddleware
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
        // Jika user belum login tapi ada remember token di cookie
        if (!Auth::check() && $request->cookie(Auth::getRecallerName())) {
            // Coba login menggunakan remember token
            Auth::viaRemember();
        }

        return $next($request);
    }
}