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
         if($token == '') {
             return response()->json(['message' => 'No token found!'], 401);
         }
         else if($token != 'ASUNA') {
             return response()->json(['message' => 'API Not response!'], 401);
         }
        return $next($request);
    }
}
