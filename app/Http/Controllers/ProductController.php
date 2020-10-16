<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\SubCategory;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use File;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        if(auth()->user()->can('index product')){
            $products = Product::all();
            return view('product.index')->with([
                'products' => $products
            ]);
        }else{
            return redirect()->route('home')->with('error','Unauthorized access!');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        if(auth()->user()->can('create product')){
            $categories = Category::all();
            $subcategories = SubCategory::all();
            $variants = Variant::all();
            //dd($variants);
            return view('product.create')->with([
                'categories' => $categories,
                'subcategories' => $subcategories,
                'variants' => $variants
            ]);
        }else{
            return redirect()->route('home')->with('error','Unauthorized access!');
        }

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
            'variants.*' => 'nullable',
            'images.*' => 'nullable|image|dimensions:ratio=12/13,min_width=600,min_height=650,max_width=1200,max_height=1300'
        ]);
        $product = new Product;
        $product->title = $request->input('title');
        $product->short_description = $request->input('short_description');
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
            if($request->has('variants')){
                $variants = Variant::whereIn('id',$request->input('variants'))->get();
                $product->variants()->attach($variants->pluck('id'));
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
        if(auth()->user()->can('edit product')) {
            if (is_numeric($id)) {
                $product = product::find($id);
                if ($product == null) {
                    return redirect()->back()->with('error', 'product not exists!');
                }
                $categories = Category::all();
                $variants = Variant::all();
                return view('product.edit')->with([
                    'product' => $product,
                    'categories' => $categories,
                    'variants' => $variants
                ]);
            }else{
                return redirect()->back()->withErrors('wrong url!');
            }
        }else{
            return redirect()->route('home')->with('error','Unauthorized access!');
        }

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
        if(auth()->user()->can('edit product')){
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
        }else{
            $response['message'] = 'Unauthorized access!';
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
        if(auth()->user()->can('edit product')){
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'salePrice' => 'nullable|numeric',
                'sku' => 'nullable|string|max:60',
                'images.*' => 'nullable|image|dimensions:ratio=12/13,min_width=600,min_height=650,max_width=1200,max_height=1300'
            ]);
            if(is_numeric($id)){
                $product =Product::find($id);
                if($product == null){
                    return redirect()->back()->with('error','product does not exists!');
                }
                $product->title = $request->input('title');
                $product->short_description = $request->input('short_description');
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
                    //
                    $product->save();
                    if($request->has('category_id')){
                        $product->categories()->sync($request->input('category_id'));
                    }
                    if($request->has('images')){
                        foreach ($request->file('images') as $img){

                            $product->images()->create([
                                'url' =>  Storage::url($img->store('public/images/products'))
                            ]);
                        }
                    }
                    if($request->has('variants')){
                        $product->variants()->sync($request->input('variants'));
                    }else{
                        $product->variants()->detach();
                    }
                    return redirect()->route('product.index')->with('success','updated successfully');
                }catch (\Exception $e){
                    return redirect()->back()->with('error',$e->getCode().':'.$e->getMessage());
                }
            }
        }else{
            return redirect()->route('home')->with('error','Unauthorized access!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete product')){
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
        }else{
            return redirect()->route('home')->with('error','Unauthorized access!');
        }

    }
}
