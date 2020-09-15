<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|max:20',
           'short_code' => 'required|max:5'
        ]);
        $category = new Category;
        $category->title = $request->title;
        $category->short_code = $request->short_code;
        if($request->has('description')){
            $category->description = $request->description;
        }
        $category->is_active = $request->has('is_active');
        $category->is_featured = $request->has('is_featured');

        try{
            $category->save();
            return redirect(route('category.index'))->with('success','successfully stored');
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function show($id)
    {
        if(is_numeric($id)){
            $category = Category::find($id);
            if($category == null){
                return redirect()->back()->with('error','category not exists!');
            }
            return view('category.show')->with([
                'category' => $category
            ]);
        }else{
            return redirect()->back()->with('error','wrong url!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        if(is_numeric($id)){
            $category = Category::find($id);
            if($category == null){
                return redirect()->back()->with('error','category not exists!');
            }
            return view('category.edit')->with([
                'category' => $category
            ]);
        }else{
            return redirect()->back()->with('error','wrong url!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return view
     */
    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            $category = Category::find($id);
            if($category == null){
                return redirect()->back()->with('error','category not exists!');
            }
            $request->validate([
                'title' => 'required|max:20',
                'short_code' => 'required|max:5'
            ]);
            $category->title = $request->title;
            $category->short_code = $request->short_code;
            if($request->has('description')){
                $category->description = $request->description;
            }
            $category->is_active = $request->has('is_active');
            $category->is_featured = $request->has('is_featured');

            try{
                $category->save();
                return redirect(route('category.index'))->with('success','successfully updated!');
            }catch (\Exception $e){
                return redirect()->back()->withErrors($e);
            }
        }else{
            return redirect()->back()->with('error','wrong url!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return view
     */
    public function destroy($id)
    {
        if(is_numeric($id)){
            $category = Category::find($id);
            if($category == null){
                return redirect()->back()->with('error','category not exists!');
            }
            try{
                $category->delete();
                return redirect(route('category.index'))->with('success','successfully deleted!');
            }catch (\Exception $e){
                return redirect()->back()->withErrors($e);
            }
        }else{
            return redirect()->back()->with('error','wrong url!');
        }
    }
}
