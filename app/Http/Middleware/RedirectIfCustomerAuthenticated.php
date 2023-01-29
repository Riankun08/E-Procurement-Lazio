<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfCustomerAuthenticated{
    public function handle($request, Closure $next, $guard = null){
        if (Auth::guard('customer')->check()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
