<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\View\View;

class UsersListController extends Controller
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
    public function index(){

        if(auth()->user()->can('index userslist')){
            $List  = User::all();
            return view('UsersList.index')->with([
                'users' => $List
            ]);

        }else{
            return redirect('home')->with('error','Unauthorized Access');
        }











}





}
