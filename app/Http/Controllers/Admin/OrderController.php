<?php

namespace App\Http\Controllers\Admin;

use App\Events\Order\OrderConfirmedEvent;
use App\Events\Order\PaymentStatusUpdateEvent;
use App\Events\Order\ShippingStatusUpdateEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderTracking;
use App\Models\Transaction;
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
    public function order_status($id)
    {
        if(is_numeric($id)) {
            $order = Order::with(['user', 'transaction.payment_method', 'order_tracking.shipping_method', 'products.images'])->find($id);
            $data['content'] = $order;
            if ($order != null) {
                if (auth()->user()->can('update order')) {
                    try{
                        $order->status = 'confirmed';
                        switch ($order->status){
                            case 'pending':
                                $order->update([
                                    'status' => 'confirmed',
                                ]);
                                break;
                            case 'confirmed':
                                if($order->order_tracking->status == 'delivered' && $order->transaction->status == 'paid'){
                                    $order->update([
                                        'status' => 'completed',
                                    ]);
                                    break;
                                }else{
                                    $data['message'] = 'this order is not delivered or not paid or both';
                                    return $data;
                                }
                        }
                        $order->save();
                        $data['message'] = 'successfully confirmed this order.';
                        event(new OrderConfirmedEvent($order));
                    }catch(\Exception $e){
                        $data['message'] = $e->getMessage();
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
     * update shipping status.
     *
     * @param  int  $id
     * @return string[]
     */
    public function tracking($id)
    {
        if(is_numeric($id)) {
            $order = Order::with(['order_tracking','user'])->find($id);
            //dd($order->user->email);
            $tracking = OrderTracking::find($order->order_tracking->id);
            $data['content'] = $order;
            if ($order != null) {
                if (auth()->user()->can('update order')) {
                    if($order->status == 'confirmed'){
                        try{
                            switch ($order->order_tracking->status){
                                case 'pending':
                                    $tracking->update([
                                        'status' => 'processing',
                                        'processing_started_at' => date('Y-m-d H:i:s')
                                    ]);
                                    break;
                                case 'processing':
                                    $tracking->update([
                                        'status' => 'shipping',
                                        'shipping_started_at' => date('Y-m-d H:i:s')
                                    ]);
                                    break;
                                case 'shipping':
                                    $tracking->update([
                                        'status' => 'delivered',
                                        'delivered_at' => date('Y-m-d H:i:s')
                                    ]);
                                    break;
                            }
                            event(new ShippingStatusUpdateEvent($order));
                            $data['message'] = 'successfully updated shipping status.';
                        }catch(\Exception $e){
                            $data['message'] = $e->getMessage();
                        }
                    }else{
                        $data['message'] = 'Confirm the order first';
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
     * update shipping status.
     *
     * @param  int  $id
     * @return string[]
     */
    public function transaction($id)
    {
        if(is_numeric($id)) {
            $order = Order::with(['transaction','user'])->find($id);
            $transaction = Transaction::find($order->transaction->id);
            $data['content'] = $order;
            if ($order != null) {
                if (auth()->user()->can('update order')) {
                    if($order->status == 'confirmed'){
                        try{
                            switch ($order->transaction->status){
                                case 'pending':
                                    $transaction->update([
                                        'status' => 'paid',
                                        'processing_started_at' => date('Y-m-d H:i:s')
                                    ]);
                                    break;
                            }
                            event(new PaymentStatusUpdateEvent($order));
                            $data['message'] = 'successfully updated payment status.';
                        }catch(\Exception $e){
                            $data['message'] = $e->getMessage();
                        }
                    }else{
                        $data['message'] = 'Confirm the order first';
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
}
