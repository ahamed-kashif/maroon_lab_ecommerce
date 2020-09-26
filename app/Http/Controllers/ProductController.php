<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
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
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('product.create')->with([
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * initial stage of storing. Store a newly created resource in session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function session_store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('images')[0]->store('public/images/products');
        $request->validate([
            'title' => 'required|string|max:20',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'salePrice' => 'nullable|numeric',
            'images.*' => 'nullable|image|dimensions:ratio=12/13,min_width=600,min_height=650,max_width=1200,max_height=1300'
        ]);
        $product = new Product;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        if($request->has('sale_price')){
            $product->discounted_price = $request->input('sale_price');
        }
        if($request->has('sku')){
            $product->sku = $request->input('sku');
        }
        if($request->input('in_stock') === 'instock'){
            $product->in_stock = true;
        }else{
            $product->in_stock = false;
        }
        if($request->has('quantity')){
            $product->quantity = $request->input('quantity');
        }
        if($request->has('purchase_note')){
            $product->purchase_note = $request->input('purchase_note');
        }
        $product->is_active = $request->has('is_active');
        $product->is_featured = $request->has('is_featured');
        try{
            $product->save();
            if($request->has('category_id')){
                foreach ($request->input('category_id') as $category_id){
                    $category = Category::find($category_id);
                    $product->categories()->attach($category);
                }
            }
            if($request->has('images')){
                foreach ($request->file('images') as $img){
                    $product->images()->create([
                       'url' =>  $img->store('public/images/products')
                    ]);
                }
            }
            return redirect()->back()->with('success','stored successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error',$e->getCode().':'.$e->getMessage());
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
