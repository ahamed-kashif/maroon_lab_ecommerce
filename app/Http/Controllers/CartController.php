<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Cart\Item;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display cart session.
     *
     * @return Redirect|view
     */
    public function index()
    {
        if(!session()->has('cart')){
            return redirect()->route('store.index')->withErrors('your cart is empty!');
        }
        $cart = session()->get('cart');

        return view('cart.index')->with([
            'cart' => $cart
        ]);
    }

    /**
     * update cart with special order notes.
     *
     * @param Request $request
     * @return Redirect
     */
    public function update_cart(Request $request)
    {
        if(session()->has('cart')){
            $cart = session()->get('cart');
            session()->forget('cart');
            session()->save();
            $cart->order_note = $request->specialNotes;
            session()->put('cart',$cart);
            session()->save();
            return  redirect()->back()->with('success','order notes updated');
        }
        return redirect()->back()->with('error','cart does not exist');
    }

    /**
     * add product to cart session.
     *
     * @param  Request  $request
     * @param  int $id
     * @return Response
     */
    public function add_product(Request $request, $id)
    {
        $product = Product::find($id);
        $variants = [];
        if($product->variants()->exists()){
            if($request->input('variants') == null){
                return redirect()->back()->with('error','Please select a variant type!');
            }
            $variants = Variant::whereIn('id',$request->input('variants'))->get();
        }

        $quantity = $request->input('quantity');
        if($quantity <= 0){
            return redirect()->back()->with('error','please select atleast one item');
        }
        if(Session::has('cart')){
            $cart = $request->session()->get('cart');
            $request->session()->forget('cart');
        }else{
            $cart= new Cart;
        }
        $item = new Item($product,$variants);
        $added = $cart->add_item($item,$request->quantity);

        $request->session()->put('cart',$cart);
        $request->session()->save();
        if(!$added){
            return redirect()->route('store.index')->with('error','product already added');
        }
        return redirect()->back()->with('success','added product!');
    }

    /**
     * update the specified product's quantity in cart.
     *
     * @param  int  $id
     * @param  Request $request
     * @return string[]
     */
    public function update_item(Request $request, $id)
    {
        $request->validate([
           'qty' => 'required'
        ]);
        if(session()->has('cart')){
            foreach(session()->get('cart')->items() as $item){
                if($item->product()->id == $id){
                    //forget the session
                    $cart = session()->get('cart');
                    session()->forget('cart');
                    //update cart
                    $cart->update_item($item,$request->qty);
                    session()->put('cart',$cart);
                    session()->save();

                    return ['message'=> 'updated', 'amount' => $item->amount()];
                }
            }
            return ['message'=> 'requested product not found'];
        }
        return ['message'=> 'cart does not exist'];
    }

    /**
     * remove specified item from cart.
     *
     * @param  int  $id
     * @return Redirect
     */
    public function remove_item($id)
    {
        $product = Product::find($id);
        if(!session()->has('cart')){
            return redirect()->route('store.index')->with('error','cart does not exists');
        }
        $cart = session()->get('cart');
        foreach ($cart->items() as $item){
            if($item->product()->id == $id){
                session()->forget('cart');
                session()->save();
                $cart->remove_item($item);
                session()->put('cart',$cart);
                session()->save();
                return redirect()->back()->with('success','removed this item from cart..');
            }
        }
        return redirect()->back()->with('error','requested item not found in this cart');
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
