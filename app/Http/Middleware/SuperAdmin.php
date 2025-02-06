<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        //Get user details
        $user_detail = Auth::user();
        //Check if user type super admin or not
        if ($user_detail->user->type == 'Super_Admin') {
            return $next($request);
        } else {
            return redirect('login'); 
        }
    }
}
