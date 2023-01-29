<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomerAuth{
    public function handle($request, Closure $next){
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
