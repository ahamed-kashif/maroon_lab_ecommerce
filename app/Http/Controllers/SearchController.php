<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Display a listing of the search result.
     *
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title','like',"%$query%")->get();

        return view('search.index')->with([
           'products' => $products
        ]);

    }

    /**
     * fetch products like query from db.
     *
     * @param Request $request
     * @return void
     */
    public function fetch(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);
        $query = $request->get('query');
        $products = Product::where('title','like',"%$query%")->get();
        return $products->pluck('title')->toArray();
    }


}
