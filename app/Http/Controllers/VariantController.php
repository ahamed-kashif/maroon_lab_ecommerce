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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        if(auth()->user()->can('create variant')){
            $variant = Variant::all();
            return view('variant.create')->with([
                'variants' => $variant
            ]);
        }
        else{
            return redirect('home')->with('error','Unauthorized Access');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function show($id){
        if(auth()->user()->can('show subcategory')){
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
     * @param  \App\variant  $variant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {

        if(auth()->user()->can('show variant')){
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
        return redirect('home')->with('error','Unauthorized Access!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\variant  $variant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'code' => 'required|max:30',
        ]);

        if(auth()->user()->can('update variant')){
            if(is_numeric($id)){
                $variant = Variant::find($id);
                if($variant == null){
                    return redirect()->back()->with('error','Variant not exists!');
                }
                $variant->title = $request->title;
                $variant->code = $request->code;
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
     * @param  \App\variant  $variant
     * @return \Illuminate\Http\RedirectResponse
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
