<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return view
     */
    public function index()
    {
        if(auth()->user()->has('roles')){
            $orders = Order::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            $pendingOrders = Order::where('status','pending')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            $confirmedOrders = Order::where('status','confirmed')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            $completeOrders = Order::where('status','completed')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            $dueOrders = Order::whereHas('transaction', function ($q){
                $q->where('status','pending');
            })->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            $paidOrders = Order::whereHas('transaction', function ($q){
                $q->where('status','paid');
            })->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            $products = Product::count();
            $activeProducts = Product::where('is_active',1)->count();
            $featuredProducts = Product::where('is_featured',1)->count();
            $categories = Category::count();
            $activeCategories = Category::where('is_active',1)->count();
            $featuredCategories = Category::where('is_featured',1)->count();
            $subcategories = SubCategory::count();
            $activeSubcategories = SubCategory::where('is_active',1)->count();
            $users = User::where('id','!=',auth()->user()->id)->count();
            $income = Transaction::where('status','paid')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('total_payable_amount');
            $notShippedOrders = Order::whereHas('order_tracking', function ($q){
                $q->whereIn('status',['processing','pending']);
            })->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            $shippedOrders = Order::whereHas('order_tracking', function ($q){
                $q->where('status','shipping');
            })->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            $deliveredOrders = Order::whereHas('order_tracking', function ($q){
                $q->where('status','delivered');
            })->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
            return view('dashboard.admin_dashboard')->with([
                'orders' => $orders,
                'pendingOrders' => $pendingOrders,
                'confirmedOrders' => $confirmedOrders,
                'completedOrders' => $completeOrders,
                'dueOrders' => $dueOrders,
                'paidOrders' => $paidOrders,
                'products' => $products,
                'activeProducts' => $activeProducts,
                'featuredProducts' => $featuredProducts,
                'categories' => $categories,
                'activeCategories' => $activeCategories,
                'featuredCategories' => $featuredCategories,
                'subcategories' => $subcategories,
                'activeSubcategories' => $activeSubcategories,
                'users' => $users,
                'income' => $income,
                'notShippedOrders' => $notShippedOrders,
                'shippedOrders' => $shippedOrders,
                'deliveredOrders' => $deliveredOrders
            ]);
        }
        return redirect()->route('home')->with('error','unauthorized access!');
    }
}
