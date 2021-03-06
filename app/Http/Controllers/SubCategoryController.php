<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        if(auth()->user()->can('index subcategory')){
            $SubCategories = SubCategory::all();
            if($request->has('active')){
                $SubCategories = $SubCategories->where('is_active',1);
            }
            return view('SubCategory.index')->with([
                'subcategories' => $SubCategories
            ]);
        }else{
            return redirect('home')->with('error','Unauthorized Access');
        }
    }


    public function create()
    {
        if(auth()->user()->can('create subcategory')){
            $categories = Category::all();
            return view('SubCategory.create')->with([
                'categories' => $categories
            ]);
        }else{
            return redirect('home')->with('error','Unauthorized Access');
        }

    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required|max:20|unique:sub_categories',
            'short_code' => 'required|max:5',
            'category_id' => 'required|int'
        ]);


        $subcategory = new SubCategory;

        $subcategory->title = $request->title;
        $subcategory->short_code = $request->short_code;

        if($request->has('description')){
            $subcategory->description = $request->description;
        }
        $subcategory->is_active = $request->has('is_active');
        $subcategory->category_id = $request->category_id;

        try{
            $subcategory->save();
            return redirect(route('SubCategory.index'))->with('success','successfully stored');
        }catch (\Exception $e){
            //dd($e);
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function show($id)
    {
        if(auth()->user()->can('show subcategory')){
            if(is_numeric($id)){
                $SubCategory = SubCategory::find($id);
                if($SubCategory == null){
                    return redirect()->back()->with('error','SubCategory not exists!');
                }
                return view('SubCategory.show')->with([
                    'subcategory' => $SubCategory
                ]);
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');
    }

    public function edit($id)
    {
        if(auth()->user()->can('edit subcategory')){
            if(is_numeric($id)){
                $SubCategory = SubCategory::find($id);
                if($SubCategory == null){
                    return redirect()->back()->with('error','Subcategory not exists!');
                }
                $categories = Category::all();
                return view('SubCategory.edit')->with([
                    'subcategory' => $SubCategory,
                    'categories' => $categories
                ]);
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');
    }

    public function destroy($id)
    {
        if(auth()->user()->can('delete subcategory')){
            if(is_numeric($id)){
                $subcategory = SubCategory::find($id);
                if($subcategory == null){
                    return redirect()->back()->with('error','category not exists!');
                }
                try{
                    $subcategory->delete();
                    return redirect(route('SubCategory.index'))->with('success','successfully deleted!');
                }catch (\Exception $e){
                    return redirect()->back()->withErrors($e->getMessage());
                }
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->can('update subcategory')){
            if(is_numeric($id)){
                $subcategory = SubCategory::find($id);
                if($subcategory == null){
                    return redirect()->back()->with('error','sub-category not exists!');
                }
                $request->validate([
                    'title' => 'required|max:20',
                    'short_code' => 'required|max:5',
                    'category_id' => 'required|int'
                ]);
                $subcategory->title = $request->title;
                $subcategory->short_code = $request->short_code;
                if($request->has('description')){
                    $subcategory->description = $request->description;
                }
                $subcategory->is_active = $request->has('is_active');
                $subcategory->category_id = $request->category_id;

                try{
                    $subcategory->save();
                    return redirect(route('SubCategory.index'))->with('success','successfully updated!');
                }catch (\Exception $e){
                    return redirect()->back()->withErrors($e->getMessage());
                }
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');
    }












}
