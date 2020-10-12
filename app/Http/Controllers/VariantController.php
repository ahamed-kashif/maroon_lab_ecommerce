<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\VariantType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VariantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return view|Redirect
     */
    public function index()
    {
        if(auth()->user()->can('index variant')){
            $variant = Variant::all();
            return view('variant.index')->with([
                'variants' => $variant
            ]);
        }
        else{
            return redirect('home')->with('error','Unauthorized Access');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        if(auth()->user()->can('create variant')){
            $variants = Variant::all();
            return view('variant.create')->with([
                'variants' => $variants
            ]);
        }
        else{
            return redirect('home')->with('error','Unauthorized Access');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Redirect
     */
    public function store(Request $request)
    {

        $request->validate([
            'type' => 'required',
            'value' => 'required',
            'unit' => 'required'
        ]);

        $variant = new Variant;
        $variant->type = $request->type;
        $variant->value = $request->value;
        $variant->unit = $request->unit;
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
     * @param    $id
     * @return view|Redirect
     */
    public function show($id){
        if(auth()->user()->can('show variant')){
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
        }
        return redirect('home')->with('error','Unauthorized Access!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return view|Redirect
     */
    public function edit($id)
    {

        if(auth()->user()->can('edit variant')){
            if(is_numeric($id)){
                $variant = Variant::find($id);
                $variants = Variant::all();
                if($variant == null){
                    return redirect()->back()->with('error','Variant not exists!');
                }
                return view('variant.edit')->with([
                    'variant' => $variant,
                    'variants' => $variants
                ]);
            }else{
                return redirect()->back()->with('error','wrong url!');
            }
        }
        return redirect('home')->with('error','Unauthorized Access!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int $id
     * @return Redirect
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'value' => 'required',
            'unit' => 'required'
        ]);

        if(auth()->user()->can('update variant')){
            if(is_numeric($id)){
                $variant = Variant::find($id);
                if($variant == null){
                    return redirect()->back()->with('error','Variant not exists!');
                }
                $variant->type = $request->type;
                $variant->value = $request->value;
                $variant->unit = $request->unit;
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
        return redirect('home')->with('error','Unauthorized Access!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete variant')){
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
        return redirect('home')->with('error','Unauthorized Access!');

    }
}
