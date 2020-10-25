@extends('layouts.dashboard')
@section('dashboard-content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">My Orders</h5>
        </div>
        <div class="card-body">
            @foreach($orders as $order)
                <div class="order-box">
                <div class="card border m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <a href="{{route('customer.order.show',$order->id)}}"><h5>ID : #{{strtoupper($order->code)}}</h5></a>
                                @switch($order->status)
                                    @case('pending')
                                    <span class="badge badge-warning-inverse">{{$order->status}}</span>
                                    @break
                                    @case('confirmed')
                                    <span class="badge badge-info-inverse">{{$order->status}}</span>
                                    @break
                                    @case('completed')
                                    <span class="badge badge-success-inverse">{{$order->status}}</span>
                                    @break
                                    @case('cancelled')
                                    <span class="badge badge-danger-inverse">{{$order->status}}</span>
                                    @break
                                @endswitch
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-0">Total : ৳<strong>{{$order->transaction->total_payable_amount}}</strong></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Price</th>
                                        <th scope="col" class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            @if($product->images()->count() != 0)
                                                <img src="{{asset($product->images()->first()->url) }}" class="img-fluid" alt="product" width="35">
                                            @else
                                                <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product" width="35">
                                            @endif
                                        </td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->pivot->quantity}}</td>
                                        <td>৳{{$product->price}}</td>
                                        <td class="text-right">৳{{$product->price * $product->pivot->quantity}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h5>Shipping Status : @switch($order->order_tracking->status)
                                        @case('pending')
                                        <span class="badge badge-warning-inverse">{{$order->order_tracking->status}}</span>
                                        @break
                                        @case('processing')
                                        <span class="badge badge-info-inverse">{{$order->order_tracking->status}}</span>
                                        @break
                                        @case('shipping')
                                        <span class="badge badge-primary-inverse">{{$order->order_tracking->status}}</span>
                                        @break
                                        @case('delivered')
                                        <span class="badge badge-success-inverse">{{$order->order_tracking->status}}</span>
                                        @break
                                        @case('cancelled')
                                        <span class="badge badge-danger-inverse">{{$order->order_tracking->status}}</span>
                                        @break
                                    @endswitch</h5>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-0"><a href="{{route('customer.order.invoice',$order->id)}}" class="btn btn-success-rgba font-16"><i class="feather icon-file mr-2"></i>Invoice</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer text-right">
            <div class="float-right">
                {{$orders->links()}}
            </div>
        </div>
    </div>
@endsection
