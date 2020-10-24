<?php

namespace App\Http\Controllers;

use App\Models\ShippingMethod;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ShippingMethodController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        if(auth()->user()->can('index shipping_method')){
            $Shipping_Method = ShippingMethod::all();
            return view('shipping_method.index')->with([
                'shipping_methods' => $Shipping_Method
            ]);
        }else{
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
        if(auth()->user()->can('create shipping_method')){
            return view('shipping_method.create');
        }
        else{
            return redirect('home')->with('error','Unauthorized Access');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *  @return view
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'phone_number' => ['required','min:11','max:11'],
            'short_code' => 'required|max:5',
        ]);

        $Shipping_Method = new ShippingMethod;
        $Shipping_Method->title = $request->title;
        $Shipping_Method->phone_number = $request->phone_number;
        $Shipping_Method->short_code = $request->short_code;
        if($request->has('active')){
            $Shipping_Method->is_active = true;
        }else{
            $Shipping_Method->is_active = false;
        }
        try{
            $Shipping_Method->save();
            return redirect(route('shipping_method.index'))->with('success','successfully stored');
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getmessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *  @return view
     */
    public function show($id)
    {
        if(auth()->user()->can('show shipping_method')){
            if(is_numeric($id)){
                $Shipping_Method = ShippingMethod::find($id);
                if($Shipping_Method == null){
                    return redirect()->back()->with('error','Shipping method not exists!');
                }
                return view('shipping_method.show')->with([
                    'Shipping_Methods' => $Shipping_Method
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
     * @param $id
     *  @return view
     */
    public function edit($id)
    {

        if(auth()->user()->can('edit shipping_method')){
            if(is_numeric($id)){
                $Shipping_Method = ShippingMethod::find($id);
                if($Shipping_Method == null){
                    return redirect()->back()->with('error','Shipping Method not exists!');
                }
                return view('shipping_method.edit')->with([
                    'Shipping_Method' => $Shipping_Method,
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'phone_number' => 'required|min:11|max:11',
            'short_code' => 'required|max:5'
        ]);

        if(auth()->user()->can('update shipping_method')){
            if(is_numeric($id)){
                $Shipping_Method = ShippingMethod::find($id);
                if($Shipping_Method == null){
                    return redirect()->back()->with('error','Shipping Method not exists!');
                }
                $Shipping_Method->title = $request->title;
                $Shipping_Method->phone_number = $request->phone_number;
                $Shipping_Method->short_code = $request->short_code;
                if($request->has('active')){
                    $Shipping_Method->is_active = true;
                }else{
                    $Shipping_Method->is_active = false;
                }
                try{
                    $Shipping_Method->save();
                    return redirect(route('shipping_method.index'))->with('success','successfully updated!');
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete shipping_method')){
            if(is_numeric($id)){
                $Shipping_Method = ShippingMethod::find($id);
                if($Shipping_Method == null){
                    return redirect()->back()->with('error','Shipping Method not exists!');
                }
                try{
                    $Shipping_Method->delete();
                    return redirect(route('shipping_method.index'))->with('success','successfully deleted!');
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
