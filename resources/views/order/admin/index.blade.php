@extends('layouts.app')
@section('css')
    @include('extras.datatable-css')
@endsection
@section('content')
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <h5 class="card-title">Orders</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle">Orders are displayed here. Click the order code to see the order</h6>
                @include('partials.alert')
                <div class="table-responsive">
                    <table id="datatable-buttons" class="display table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>CODE</th>
                            <th>CUSTOMER</th>
                            <th>TOTAL</th>
                            <th>SHIPPING_STATUS</th>
                            <th>PAYMENT_STATUS</th>
                            <th>STATUS</th>
                            <th>CREATED_AT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <a href="{{route('admin.order.show',$order->id)}}">
                                        {{__($order->code)}}
                                    </a>
                                </td>
                                <td>{{$order->user->name}}</td>
                                <td>
                                    {{$order->transaction->total_payable_amount}}
                                </td>
                                <td>
                                    {{$order->order_tracking->status}}
                                </td>
                                <td>
                                    {{$order->transaction->status}}
                                </td>
                                <td>
                                    {{$order->status}}
                                </td>
                                <td>
                                    {{date_format(date_create($order->created_at),'d/m/y')}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>CODE</th>
                            <th>CUSTOMER</th>
                            <th>TOTAL</th>
                            <th>SHIPPING_STATUS</th>
                            <th>PAYMENT_STATUS</th>
                            <th>STATUS</th>
                            <th>CREATED_AT</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection
@section('js')
    @include('extras.datatable-js')

@endsection
