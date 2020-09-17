<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(auth()->user()->can('index subcategory')){
            $SubCategories = SubCategory::all();
            return view('subcategory.index')->with([
                'subcategories' => $SubCategories
            ]);
        }else{
            return redirect('home')->with('error','Unauthorized Access');
        }
    }


    public function create()
    {
        if(auth()->user()->can('create subcategory')){
            return view('subcategory.create');
        }else{
            return redirect('home')->with('error','Unauthorized Access');
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20|unique:sub_categories',
            'short_code' => 'required|max:5'
        ]);

        $subcategory = new SubCategory;

        $subcategory->title = $request->title;
        $subcategory->short_code = $request->short_code;

        if($request->has('description')){
            $subcategory->description = $request->description;
        }
        $subcategory->is_active = $request->has('is_active');
        $subcategory->category_id = 1;

        try{
            $subcategory->save();
            return redirect(route('subcategory.index'))->with('success','successfully stored');
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
                return view('subcategory.show')->with([
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
                return view('subcategory.edit')->with([
                    'subcategory' => $SubCategory
                ]);
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');
    }















}
