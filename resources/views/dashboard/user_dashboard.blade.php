@extends('layouts.dashboard')
@section('dashboard-content')
    <div class="profilebox py-4 text-center mb-4">
        <img src="{{asset('/images/users/profile.svg')}}" class="img-fluid mb-3" alt="profile">
        <div class="profilename">
            <h5>{{auth()->user()->name}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="ecom-dashboard-widget">
                <div class="media">
                    <a href="{{route('customer.order.index')}}" class="text-secondary-gradient"><i class="feather icon-package"></i></a>
                    <div class="media-body text-secondary">
                        <h5>My Orders</h5>
                        <p>Total ({{auth()->user()->orders()->count()}})</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="ecom-dashboard-widget row">
                <div class="media text-center">
                    <a href="{{route('cart.index')}}" class="text-secondary-gradient"><i class="fa fa-shopping-basket"></i></a>
                    <div class="media-body text-secondary">
                        <h5>My Bag</h5>
                        <p>Items ({{session()->has('cart') ? count(session()->get('cart')->items()) : 0}})</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="ecom-dashboard-widget">
                <div class="media float-right">
                    <a href="{{route('store.index')}}" class="text-secondary-gradient"><i class="fa fa-shopping-bag"></i></a>
                    <div class="media-body text-secondary">
                        <h5>Shop</h5>
                        <p>Go get'em!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="ecom-dashboard-widget">
                <div class="media float-right">
                    <i class="feather icon-star text-secondary-gradient"></i>
                    <div class="media-body text-secondary">
                        <h5>My Favourites</h5>
                        <p>Coming soon!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
