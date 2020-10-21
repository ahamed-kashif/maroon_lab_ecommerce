<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\ShippingDetails;
use App\Models\ShippingMethod;
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
        if(!auth()->has_shipping_details()){
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
               return redirect()->route('cart.inex')->with('error', $e->getMessage());
           }
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
