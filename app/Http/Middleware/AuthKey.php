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
        //$request->headers->add(['API_KEY' => 'ABCDE']);
//        $token = $request->header('API_KEY');
//        if($token == '') {
//          return response()->json(['message' => 'No token found! '.$token], 401);
//        }
        $token = $request->header('APP_KEY');
        echo $token;
        if($token != 'PHU') {
            return response()->json(['message' => 'App key not found'.$token], 401);
        }
        return $next($request);
    }
}
