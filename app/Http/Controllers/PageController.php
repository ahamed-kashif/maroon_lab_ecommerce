<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
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
        if (auth()->user()->can('index page')) {
            $page = Page::all();
            return view('page.index')->with([
                'pages' => $page
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
        if(auth()->user()->can('create page')){
            return view('page.create');
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
            'body' => 'required',
            'footer' => 'required',
            'url' => 'required','unique'
        ]);

        $page = new Page;
        $page->title = $request->title;
        $page->body = $request->body;
        $page->footer = $request->footer;
        $page->url = $request->url;

        try{
            $page->save();
            return redirect(route('page.index'))->with('success','successfully stored');
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getmessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param $url
     *  @return view
     */
    public function show($url)
    {
        if(auth()->user()->can('show page')){

            if(is_string($url)){
                $page = Page::where('url',$url)->first();

                if($page == null){
                    return redirect()->back()->with('error','Page not exists!');
                }
                return view('page.show')->with([
                    'pages' => $page
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
     * @param $url
     *  @return view
     */
    public function edit($url)
    {

        if(auth()->user()->can('edit page')){
            if(is_string($url)){
                $page = Page::where('url',$url)->first();
                if($page == null){
                    return redirect()->back()->with('error','Page not exists!');
                }
                return view('page.edit')->with([
                    'pages' => $page,
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
     * @param  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $url)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'footer' => 'required',
            'url' => 'required','unique'
        ]);

        if(auth()->user()->can('update page')){
            if(is_string($url)){
                $page = Page::where('url',$url)->first();
                if($page == null){
                    return redirect()->back()->with('error','Page not exists!');
                }
                $page->title = $request->title;
                $page->body = $request->body;
                $page->footer = $request->footer;
                $page->url = $request->url;

                try{
                    $page->save();
                    return redirect(route('page.index'))->with('success','successfully updated!');
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
     * @param  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy($url)
    {
        if(auth()->user()->can('delete page')){
            if(is_string($url)){
                $page = Page::where('url',$url)->first();
                if($page == null){
                    return redirect()->back()->with('error','Page not exists!');
                }
                try{
                    $page->delete();
                    return redirect(route('page.index'))->with('success','successfully deleted!');
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
