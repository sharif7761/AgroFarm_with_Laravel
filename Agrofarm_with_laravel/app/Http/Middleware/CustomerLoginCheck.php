<?php

namespace App\Http\Middleware;

use Closure;

class CustomerLoginCheck
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
        if(!$request->session()->has('Cus_id')){
            return redirect('/');
        }else{
            return $next($request);
        }
    }
}
