<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthKey
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
        $token = $request->header('APIKEY');

        if($token != 'PHU') {
            return response()->json(['message' => 'App key not found'.$token." !"], 401);
        }
        return $next($request);
    }
}
