<?php

namespace App\Http\Controllers;

use App\Events\Order\OrderCreateEvent;
use App\Models\Order;
use App\Models\OrderTracking;
use App\Models\PaymentMethod;
use App\Models\ShippingDetails;
use App\Models\ShippingMethod;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Mockery\Exception;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $shipping_methods = ShippingMethod::active()->get();
        $payment_methods = PaymentMethod::active()->get();
        return view('checkout.create')->with([
            'shipping_methods' => $shipping_methods,
            'payment_methods' => $payment_methods
        ]);
    }

    /**
     * Checkout happens here.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $cart = session()->get('cart');

        //one time shipping address storing
        if(!auth()->user()->has_shipping_details()){
           $shipping_details =new ShippingDetails;
           $shipping_details->user_id = auth()->user()->id;
           $shipping_details->name = $request->name;
           $shipping_details->contact_number = $request->contact_number;
           $shipping_details->address = $request->address;
           $shipping_details->city = $request->city;
           $shipping_details->district = $request->district;
           $shipping_details->post_code = $request->post_code;
           try{
               $shipping_details->save();
           }catch(Exception $e){
               return redirect()->route('cart.index')->with('error', 'something bad happened during storing shipping address');
           }
        }

        //storing transaction details
        $transaction = new Transaction;
        $transaction->code = strtoupper('TK'.uniqid()) ;
        $transaction->payment_method_id = $request->payment_method;
        $transaction->total_payable_amount = $cart->bill();
        try{
            $transaction->save();
        }catch(Exception $e){
            return redirect()->route('cart.index')->with('error','something bad happened in transaction!');
        }

        //storing tracking details
        $tracking =new OrderTracking;
        $tracking->shipping_method_id = $request->shipping_method;
        try{
            $tracking->save();
        }catch (Exception $e){
            return redirect()->route('cart.index')->with('error','something bad happened with tracking');
        }

        //storing order
        $order = new Order;
        $order->code = strtoupper('OD'.uniqid());
        $order->user_id = auth()->user()->id;
        $order->total = $cart->total();
        $order->discount = $cart->discount();
        $order->shipping_to = $request->name;
        $order->shipping_to_contact = $request->contact_number;
        $order->shipping_address = $request->address;
        $order->shipping_city = $request->city;
        $order->shipping_district = $request->district;
        $order->shipping_post_code = $request->post_code;
        $order->transaction_id = $transaction->id;
        $order->order_tracking_id = $tracking->id;

        try{
            $order->save();
            foreach ($cart->items() as $item){
                if(count($item->variants()) > 0){
                    $order->products()->attach($item->product(),[
                        'variants' => $item->variants(),
                        'quantity' => $item->getQty()
                    ]);
                }else{
                    $order->products()->attach($item->product(),[
                        'quantity' => $item->getQty()
                    ]);
                }

            }
            event(new OrderCreateEvent(auth()->user()));
            session()->forget('cart');
            session()->save();
            return view('checkout.complete');
        }catch (Exception $e){
            return redirect()->route('cart.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
