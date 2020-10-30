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
     * @param  int  $id
     * @return view
     */
    public function product($id)
    {
        if(is_numeric($id)){
            $product = Product::find($id);
            $products = $product->all();
            if($product == null){
                return redirect()->route('store.index')->with('error','Product Does not exist..');
            }
            return view('store.product_show')->with([
                'product' => $product,
                'products' => $products

            ]);
        }
        return redirect()->route('store.index')->with('error','URL does not exists!');

    }
}
