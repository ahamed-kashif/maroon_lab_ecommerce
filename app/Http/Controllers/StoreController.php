<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
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
     * Show the list of categorized products.
     * @param int $id
     * @param Request $request
     * @return view
     */
    public function category(Request $request, $id)
    {
        $category = Category::find($id);
        if($category->has('products')){
            $products = $category->products();
            if($request->has('price')) {
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
        return redirect()->route('store.index')->with('error','no product exists in this category..');

    }
    /**
     * Show the list of categorized products.
     * @param int $id
     * @param Request $request
     * @return view
     */
    public function subcategory(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory->has('products')){
            $products = $subCategory->products();
            if($request->has('price')) {
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
        return redirect()->route('store.index')->with('error','no product exists in this sub-category..');

    }


    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @param int $id
     * @return view
     */
    public function product(Request $request, $id)
    {
        if(is_numeric($id)){
            $product = Product::with('variants')->where('id',$id)->first();
            if($product == null){
                return redirect()->route('store.index')->with('error','Product Does not exist..');
            }

            $products = Product::where('id','!=',$product->id)->limit(4)->get();
            if($product->variants->count() > 0){
                if($request->has('variant')){
                    $variant = $product->variants->where('id',$request->variant)->first();
                    if($variant != null){
                        $price = $variant->pivot->price;
                        if($variant->pivot->discounted_price != null){
                            $discounted_price = $variant->pivot->discounted_price;
                        }else{
                            $discounted_price = 0;
                        }
                    }else{
                        return redirect()->route('store.index')->with('error','wrong request');
                    }
                }else{
                    $price = $product->variants->first()->pivot->price;
                    //dd($price);
                    if($product->variants->first()->pivot->discounted_price != null){
                        $discounted_price = $product->variants->first()->pivot->discounted_price;
                    }else{
                        $discounted_price = 0;
                    }
                }
            }else{
                $price = $product->price;
                if($product->discounted_price != null){
                    $discounted_price = $product->discounted_price;
                }else{
                    $discounted_price = 0;
                }
            }


            return view('store.product_show')->with([
                'product' => $product,
                'price' => $price,
                'discounted_price' => $discounted_price,
                'products' => $products

            ]);
        }
        return redirect()->route('store.index')->with('error','URL does not exists!');

    }
}
