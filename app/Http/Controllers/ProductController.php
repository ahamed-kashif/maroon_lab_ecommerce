<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use File;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with([
           'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::find(16);
        return view('product.create')->with([
            'categories' => $categories,
            'subcategories' => $subcategories,
            'product' => $product
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
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
                       'url' =>  Storage::url($img->store('public/images/products'))
                    ]);
                }
            }
            return redirect()->back()->with('success','stored successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error',$e->getCode().':'.$e->getMessage());
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit')->with([
           'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * delete the the specified product's specified image.
     *
     *
     * @param $product_id
     * @param $image_id
     * @return string[]
     */
    public function destroy_image($product_id, $image_id)
    {
        $response = [];
        try{
            $product = Product::find($product_id);
            $image = Image::find($image_id);
            $response['data'] = $image;
            if($product->images->contains($image)){
                if(File::exists(public_path($image->url))){
                    File::delete(public_path($image->url));
                }else{
                    $response['message'] = 'image does not exists';
                }
            }else{
                $response['message'] = 'this image does not belongs to the specified product';
            }
            $product->images()->detach($image_id);
            $image->delete();
            $response['message'] = 'Successfully deleted this image';
        }catch(\Exception $e){
            $response['message'] = $e->getMessage();
        }
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        try{
            foreach($product->images()->get() as $img){
                if(File::exists(public_path($img->url))){
                    File::delete(public_path($img->url));
                }
            }
            $product->images()->detach();
            $product->categories()->detach();
            $product->delete();
            return redirect()->route('product.index')->with('success','successfully deleted');
        }catch(\Exception $e){
            return redirect()->route('product.index')->withErrors($e->getMessage());
        }
    }
}
