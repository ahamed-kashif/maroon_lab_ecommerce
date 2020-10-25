<?php

namespace App\Http\Middleware;

use Closure;

class Cart
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
        if($request->session()->has('cart')){
            if(count($request->session()->get('cart')->items()) > 0){
                return $next($request);
            }else{
                 $request->session()->forget('cart');
                 $request->session()->save();
            }
        }
        return redirect()->route('store.index')->with('error','You need put products in your cart to checkout!');

    }
}
