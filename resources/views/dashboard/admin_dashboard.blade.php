@extends('layouts.dashboard')
@section('dashboard-content')
    <div class="profilebox py-4 text-center mb-4">
        <img src="{{asset('/images/users/user-group.png')}}" class="img-fluid mb-3" alt="profile">
        <div class="profilename">
            <a href="{{route('user.list')}}"><h5>TOTAL USERS: {{$users}}</h5></a>
        </div>
    </div>
    <div class="text-right m-b-30 pr-5">
        <h4 class="text-primary-gradient">{{strtoupper(date('F')).', '.date('Y')}}</h4>
    </div>
    <table>
        <tr>
            <td class="pr-5">
                <div class="ecom-dashboard-widget">
                    <div class="media">
                        <a href="{{route('admin.order.index')}}" class="text-secondary-gradient"><i class="feather icon-package"></i></a>
                        <h5>ORDERS</h5>
                    </div>
                </div>
            </td>
            <td class="pr-2">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('admin.order.index')}}" class="text-dark font-weight-bold">TOTAL:   {{$orders}}</a>
                    </li>
                    <li>
                        <a href="{{route('admin.order.index','pending')}}" class="text-dark font-weight-bold">PENDING:   <span class="text-warning">{{$pendingOrders}}</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.order.index','confirmed')}}" class="text-dark font-weight-bold">CONFIRMED: {{$confirmedOrders}}</a>
                    </li>
                </ul>
            </td>
            <td class="pr-5"></td>
            <td class="pr-5"></td>
            <td class="pr-5">
                <div class="ecom-dashboard-widget">
                    <div class="media">
                        <a href="{{route('product.index')}}" class="text-secondary-gradient"><i class="feather icon-box"></i></a>
                            <h5>PRODUCTS</h5>
                    </div>
                </div>
            </td>
            <td class="pr-2">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('product.index')}}" class="text-dark font-weight-bold">TOTAL:   {{$products}}</a>
                    </li>
                    <li>
                        <a href="{{route('product.index','active')}}" class="text-dark font-weight-bold">ACTIVE:   <span class="text-success">{{$activeProducts}}</span></a>
                    </li>
                    <li>
                        <a href="{{route('product.index','featured')}}" class="text-dark font-weight-bold">FEATURED:   {{$featuredProducts}}</a>
                    </li>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="pr-5">
                <div class="ecom-dashboard-widget">
                    <div class="media">
                        <a href="{{route('transaction.index')}}" class="text-secondary-gradient"><i class="feather icon-dollar-sign"></i></a>
                        <h5>TRANSACTIONS</h5>
                    </div>
                </div>
            </td>
            <td class="pr-2">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('admin.order.index','due')}}" class="text-dark font-weight-bold">DUE:   <span class="text-warning">{{$dueOrders}}</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.order.index','paid')}}" class="text-dark font-weight-bold">PAID: {{$paidOrders}}</a>
                    </li>
                </ul>
            </td>
            <td class="pr-5"></td>
            <td class="pr-5"></td>
            <td class="pr-5">
                <div class="ecom-dashboard-widget">
                    <div class="media">
                        <a href="{{route('admin.order.index')}}" class="text-secondary-gradient"><i class="fa fa-ship"></i></a>
                        <h5>SHIPPING</h5>
                    </div>
                </div>
            </td>
            <td class="pr-2">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('admin.order.index','pending')}}" class="text-dark font-weight-bold">PENDING:   {{$notShippedOrders}}</a>
                    </li>
                    <li>
                        <a href="{{route('admin.order.index','shipped')}}" class="text-dark font-weight-bold">SHIPPED:   <span class="text-success">{{$shippedOrders}}</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.order.index','delivered')}}" class="text-dark font-weight-bold">DELIVERED:   {{$deliveredOrders}}</a>
                    </li>
                </ul>
            </td>
        </tr>
    </table>

@endsection

