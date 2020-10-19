<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Cart\Item;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Session::get('cart');
        Session::save();
        dd($cart);
        //return $cart;
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
            return redirect()->back()->with('error','product already added');
        }
        return redirect()->back()->with('success','added product!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_item(Request $request)
    {
        if(session()->has('cart')){
            $item = new Item(Product::find($request->product), Variant::whereIn('id',$request->variants));
            $cart = session()->get('cart');
            session()->forget('cart');

            if(in_array($item,$cart->items())){
                $cart->update_item($item,$request->quantity);
            }

            Session::put('cart',$cart);
            $request->session()->save();
            dd($cart);
            return $cart;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove_item(Request $request)
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
