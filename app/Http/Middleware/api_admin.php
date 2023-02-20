<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class api_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user =Auth::user();
        if (Auth::check()) {
            if ($user->role == "admin") {
                return $next($request);
            }else{
                return response()->json([
                    "msg"=>"for admin only"
                ]);
            }
        }else {
            return response()->json([
                "msg"=>"you should log in",
            ]);
        }

    }
}
