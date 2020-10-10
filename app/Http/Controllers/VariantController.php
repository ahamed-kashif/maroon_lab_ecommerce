<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }





    public function index()
    {
        $variant = Variant::all();
        return view('variant.index')->with([
            'variants' => $variant
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variant = Variant::all();
        return view('variant.create')->with([
            'variants' => $variant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:20',
            'code' => 'required|max:30',
        ]);

        $variant = new Variant;
        $variant->title = $request->title;
        $variant->code = $request->code;

        try{
            $variant->save();
            return redirect(route('variant.index'))->with('success','successfully stored');
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getmessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function show($id){
            if(is_numeric($id)){
                $variant = Variant::find($id);
                if($variant == null){
                    return redirect()->back()->with('error','Variant not exists!');
                }
                return view('variant.show')->with([
                    'variant' => $variant
                ]);
            }else{
                return redirect()->back()->with('error','wrong url!');
            }

        return redirect('home')->with('error','Unauthorized Access!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        if(is_numeric($id)){
                $variant = Variant::find($id);
                if($variant == null){
                    return redirect()->back()->with('error','Variant not exists!');
                }
                return view('variant.edit')->with([
                    'variant' => $variant
                ]);
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'value' => 'required|max:30',
        ]);

        if(is_numeric($id)){
            $variant = Variant::find($id);
            if($variant == null){
                return redirect()->back()->with('error','Variant not exists!');
            }
            $variant->title = $request->title;
            $variant->value = $request->value;
            try{
                $variant->save();
                return redirect(route('variant.index'))->with('success','successfully updated!');
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
     * @param  \App\variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_numeric($id)){
            $variant = Variant::find($id);
            if($variant == null){
                return redirect()->back()->with('error','Variant not exists!');
            }
            try{
                $variant->delete();
                return redirect(route('variant.index'))->with('success','successfully deleted!');
            }catch (\Exception $e){
                return redirect()->back()->withErrors($e);
            }
        }else{
            return redirect()->back()->with('error','wrong url!');
        }
    }
}
