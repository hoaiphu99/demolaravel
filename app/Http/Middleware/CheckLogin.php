<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CheckLogin
{
    // Except routes
    protected $except =[
        'login',
        'logout',
        'register'
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        foreach ($this->except as $excluded_route) {
            if ($request->path() === $excluded_route) {
                return $next($request);
            }
        }
        if(!$request->session()->has('user'))
            return redirect(route('login'));
        return $next($request);
    }
}
