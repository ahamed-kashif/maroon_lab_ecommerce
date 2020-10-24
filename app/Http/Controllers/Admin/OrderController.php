<?php

namespace App\Http\Controllers\Admin;

use App\Events\Order\OrderConfirmedEvent;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_numeric($id)){
            $order = Order::with(['user','transaction.payment_method','order_tracking.shipping_method','products.images'])->find($id);
            if($order != null){
                if(auth()->user()->can('show order')){
                    return view('order.admin.show')->with([
                        'order' => $order
                    ]);
                }
                return redirect()->back()->with('error','unauthorized access');
            }
            return redirect()->back()->with('error','page does not exists');
        }
        return redirect()->back()->withErrors('wrong url!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        if(is_numeric($id)) {
            $order = Order::with(['user', 'transaction.payment_method', 'order_tracking.shipping_method', 'products.images'])->find($id);
            if ($order != null) {
                if (auth()->user()->can('show order')) {
                    return view('checkout.invoice')->with([
                        'order' => $order
                    ]);
                }
            }
        }
    }

    /**
     * update order status to confirm.
     *
     *
     * @param  int  $id
     * @return string[]
     */
    public function confirm($id)
    {
        if(is_numeric($id)) {
            $order = Order::find($id);
            $data['content'] = $order;
            if ($order != null) {
                if (auth()->user()->can('show order')) {
                    if($order->status == 'confirmed'){
                        $data['message'] = 'already confirmed';
                    }else{
                        try{
                            $order->status = 'confirmed';
                            $order->save();
                            $data['message'] = 'successfully confirmed this order.';
                            event(new OrderConfirmedEvent($order));
                        }catch(\Exception $e){
                            $data['message'] = $e->getMessage();
                        }
                    }
                }else{
                    $data['message'] = 'Unauthorized Access!';
                }
            }else{
                $data['message'] = 'resource did not found!';
            }
        }else{
            $data['content'] = '';
            $data['message'] = 'wrong url';
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
