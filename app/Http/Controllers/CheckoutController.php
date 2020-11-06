<?php

namespace App\Http\Controllers;

use App\Cart\Item;
use App\Events\Order\OrderCreateEvent;
use App\Models\Order;
use App\Models\OrderTracking;
use App\Models\PaymentMethod;
use App\Models\ShippingDetails;
use App\Models\ShippingMethod;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mockery\Exception;
use MongoDB\Driver\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new checkout.
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
     * @return view|Redirect
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'contact_number' => 'required|max:11',
           'address' => 'required',
           'city' => 'required',
           'post_code' => 'required',
           'district' => 'required',
           'shipping_method' => 'required',
           'payment_method' => 'required',
        ]);

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
        $numOfOrders = Order::count();
        $numOfOrders++;
        $numOfOrders = $numOfOrders+5000;
        $order->code = strtoupper('OD'.$numOfOrders);
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
                //dd($item->variant());
                if($item->variant() != null){
                    $order->products()->attach($item->product(),[
                        'variants' => $item->variant(),
                        'quantity' => $item->getQty(),
                        'price' => $item->getPrice(),
                        'discounted_price' => $item->getDiscountedPrice()
                    ]);
                }else{
                    $order->products()->attach($item->product(),[
                        'quantity' => $item->getQty(),
                        'price' => $item->getPrice(),
                        'discounted_price' => $item->getDiscountedPrice()
                    ]);
                }

            }
            event(new OrderCreateEvent($order));
            session()->forget('cart');
            session()->save();
            session()->put('order',$order);
            session()->save();
            return redirect()->route('checkout.complete');
        }catch (Exception $e){
            return redirect()->route('cart.index')->with('error',$e->getMessage());
        }
    }

    /**
     * checkout complete page.
     *
     *
     * @return view
     */
    public function complete()
    {
        $order = session()->get('order');
        session()->forget('order');
        session()->save();
        return view('checkout.complete')->with([
            'order' => $order
        ]);
    }

}
