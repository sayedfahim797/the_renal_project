<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Doctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
           return redirect()->route('login');
        }

        // role_id 1 = staff
        if (Auth::user()->role_id == 1) {
            return redirect()->route('staff');
        }
        // role_id 2 = doctor
        if (Auth::user()->role_id == 2) {
            return $next($request);
        }
        // role_id 3 = admin
        if (Auth::user()->role_id == 3) {
            return redirect()->route('admin');
        }
    }
}
