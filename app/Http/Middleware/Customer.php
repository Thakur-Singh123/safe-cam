<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        //Get auth details
        $user_detail = Auth::user();
        //Check if user type customer or not
        if ($user_detail->user_type == 'Customer') {
            return $next($request);
        } else {
            return redirect('login'); 
        }
    }
}
