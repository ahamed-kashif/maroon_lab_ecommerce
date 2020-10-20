<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentMethodController extends Controller
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
        if(auth()->user()->can('index payment_method')){
            $payment_Method = PaymentMethod::all();
            return view('payment_method.index')->with([
                'payment_methods' => $payment_Method
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
        if(auth()->user()->can('create payment_method')){
            $payment_Method = PaymentMethod::all();
            return view('payment_method.create');
        }
        else{
            return redirect('home')->with('error','Unauthorized Access');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $request
     * @return view
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_code' => 'required',


        ]);

        $payment_Method = new PaymentMethod();
        $payment_Method->title = $request->title;
        $payment_Method->short_code = $request->short_code;
        $payment_Method->is_active = $request->has('is_active');

        try{
            $payment_Method->save();
            return redirect(route('payment_method.index'))->with('success','successfully stored');
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
        if(auth()->user()->can('show payment_method')){
            if(is_numeric($id)){
                $payment_Method = PaymentMethod::find($id);
                if($payment_Method == null){
                    return redirect()->back()->with('error','Payment method not exists!');
                }
                return view('payment_method.show')->with([
                    'Payment_Methods' => $payment_Method
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

        if(auth()->user()->can('edit payment_method')){
            if(is_numeric($id)){
                $payment_Method = PaymentMethod::find($id);
                if($payment_Method == null){
                    return redirect()->back()->with('error','Payment Method not exists!');
                }
                return view('payment_method.edit')->with([
                    'Payment_Methods' => $payment_Method,
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
     * @param $request
     * @param $id
     * @return view
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short_code' => 'required',


        ]);

        if(auth()->user()->can('update payment_method')){
            if(is_numeric($id)){
                $payment_Method = PaymentMethod::find($id);
                if($payment_Method == null){
                    return redirect()->back()->with('error','Payment Method not exists!');
                }
                $payment_Method->title = $request->title;
                $payment_Method->short_code = $request->short_code;
                $payment_Method->is_active = $request->has('is_active');

                try{
                    $payment_Method->save();
                    return redirect(route('payment_method.index'))->with('success','successfully updated!');
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
     *@param $id
     * @return view
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete payment_method')){
            if(is_numeric($id)){
                $payment_Method = PaymentMethod::find($id);
                if($payment_Method == null){
                    return redirect()->back()->with('error','Payment Method not exists!');
                }
                try{
                    $payment_Method->delete();
                    return redirect(route('payment_method.index'))->with('success','successfully deleted!');
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
