<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $products = Product::active();
        if($request->has('price')) {
            if ($request->has('category')) {
                $category = $request->category;
                $products = $products->whereHas('categories', function ($q) use ($category) {
                    $q->where('category_id', $category);
                });
            }
            $priceOrder = $request->price;
            if($priceOrder == 'desc'){
                $products = $products->orderBy('price','desc');
            }else{
                $products= $products->orderBy('price','asc');
            }
        }else{
            $products= $products->orderBy('price','asc');
        }
        $products = $products->paginate(12);
        return view('store.index')->with([
            'products' => $products
        ]);
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
     * @return view
     */
    public function product($id)
    {
        if(is_numeric($id)){
            $product = Product::find($id);
            if($product == null){
                return redirect()->route('store.index')->with('error','Product Does not exist..');
            }
            return view('store.product_show')->with([
                'product' => $product
            ]);
        }
        return redirect()->route('store.index')->with('error','URL does not exists!');

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
