<?php

namespace App\Http\Middleware;

use Closure;

class OrderSession
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('order')){
            return $next($request);
        }
        return redirect()->back()->with('error','please place an order');
    }
}
