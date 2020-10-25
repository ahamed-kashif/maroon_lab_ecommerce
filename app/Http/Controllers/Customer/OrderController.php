<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the user orders.
     *
     * @return view
     */
    public function index()
    {
        $orders = auth()->user()->orders()->paginate(5);
        return view('order.customer.index')->with([
           'orders' => $orders
        ]);
    }

    /**
     * user invoice page.
     *
     *
     * @param $id
     * @return view
     */
    public function invoice($id)
    {
        if(is_numeric($id)){
            $order = Order::with('order_tracking.shipping_method','transaction.payment_method','user')->find($id);
            if(auth()->user()->id == $order->user->id){
                if($order != null){
                    return view('checkout.invoice')->with([
                        'order' => $order
                    ]);
                }else{
                    return redirect()->back()->with('error','unauthorized access!');
                }
            }else{
                return redirect()->back()->with('error','order you are looking for does not exists!');
            }
        }else{
            return redirect()->back()->with('error','wrong url!');
        }
    }

    /**
     * order show page.
     *
     * @param $id
     * @return view
     */
    public function show($id)
    {
        if(is_numeric($id)){
            $order = Order::with('order_tracking.shipping_method','transaction.payment_method','user')->find($id);
            if(auth()->user()->id == $order->user->id){
                if($order != null){
                    return view('order.customer.show')->with([
                        'order' => $order
                    ]);
                }else{
                    return redirect()->back()->with('error','unauthorized access!');
                }
            }else{
                return redirect()->back()->with('error','order you are looking for does not exists!');
            }
        }else{
            return redirect()->back()->with('error','wrong url!');
        }
    }

}
