<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\VariantType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VariantTypeController extends Controller
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
        if(auth()->user()->can('index variantType')){
            $variantType = VariantType::all();
            return view('variant_type.index')->with([
                'variantTypes' => $variantType
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
        if(auth()->user()->can('create variantType')){

            return view('variant_type.create');
        }
        else{
            return redirect('home')->with('error','Unauthorized Access');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'unit' => 'required|max:20',

        ]);

        $varianttype = new VariantType();
        $varianttype->title = $request->title;
        $varianttype->unit = $request->unit;



        try{
            $varianttype->save();
            return redirect(route('variant_type.index'))->with('success','successfully stored');
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getmessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        if(auth()->user()->can('show variantType')){
            if(is_numeric($id)){
                $varianttype = VariantType::find($id);
                if($varianttype == null){
                    return redirect()->back()->with('error','Variant Type not exists!');
                }
                return view('variant_type.show')->with([
                    'variantTypes' => $varianttype
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
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {

        if(auth()->user()->can('edit variantType')){
            if(is_numeric($id)){
                $varianttype = VariantType::find($id);
                if($varianttype == null){
                    return redirect()->back()->with('error','Variant type not exists!');
                }
                return view('variant_type.edit')->with([
                    'variantTypes' => $varianttype
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
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'unit' => 'required|max:20',

        ]);

        if(auth()->user()->can('update variantType')){
            if(is_numeric($id)){
                $varianttype = VariantType::find($id);
                if($varianttype == null){
                    return redirect()->back()->with('error','Variant type not exists!');
                }
                $varianttype->title = $request->title;
                $varianttype->unit = $request->unit;

                try{
                    $varianttype->save();
                    return redirect(route('variant_type.index'))->with('success','successfully updated!');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete variantType')){
            if(is_numeric($id)){
                $varianttype = VariantType::with('variants')->find($id);
                if($varianttype == null){
                    return redirect()->back()->with('error','Variant type not exists!');
                }
                try{
//                    dd(Variant::whereIn('variant_type_id',$varianttype->variants->pluck('id'))->get());
//                    Variant::whereIn('variant_type_id',$varianttype->variants()->pluck('variants.id'))->delete();
                    $varianttype->delete();
                    return redirect(route('variant_type.index'))->with('success','successfully deleted!');
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
