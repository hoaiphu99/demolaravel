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
        echo __DIR__;
        //$request->headers->add(['API_KEY' => 'ABCDE']);
        $token = $request->headers->get('API_KEY');
        if($token == '') {
            return response()->json(['message' => __DIR__], 401);
        }
        else if($token != 'ABCDE') {
            return response()->json(['message' => $token], 401);
        }
        return $next($request);
    }
}
