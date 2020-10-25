@extends('layouts.app')
@section('css')
    @include('extras.sweetalert2-css')
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-7 col-xl-8">
                @include('partials.partials-order-details',['order'=>$order])
                @include('partials.partials-order-products',['order'=>$order])
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-5 col-xl-4">
                @if($order->status == 'cancelled')
                    @include('partials.partials-order-cancelled')
                @endif
                @include('partials.partials-order-activity')
                @include('partials.partials-customer-order-payment-status')
                @include('partials.paritals-customer-invoice')
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('js')
    @include('extras.sweetalert2-js')
@endsection
