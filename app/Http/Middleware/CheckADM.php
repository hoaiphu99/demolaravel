<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckADM
{
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
        if($request->session()->has('user')){
            if (session()->get('user')->utype == 'USR')
                return redirect(route('index'));
        }
        return $next($request);
    }
}
