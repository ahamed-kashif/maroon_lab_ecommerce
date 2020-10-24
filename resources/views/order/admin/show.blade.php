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
                @include('partials.partials-order-invoice',['order' => $order])
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-5 col-xl-4">

                @include('partials.partials-order-status-confirm',['order'=>$order])
                @include('partials.partials-order-tracking',['order',$order])
                @include('partials.partials-order-transaction-status',['order',$order])
                <div class="card m-b-30">

                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('js')
    <script src="{{asset('/js/restapi.js')}}"></script>
    @include('extras.sweetalert2-js')
    <script>
        $(document).ready(function(){
            $('.order-status').on('click',function() {
                let url = '{{route('admin.order.confirm',$order->id)}}';
                let confirmOrder = $.ajax({
                    dataType: 'json',
                    type: 'PUT',
                    data: {api_token: $api_token},
                    url: url,
                });

                confirmOrder.done(function (data) {
                    console.log(data);
                    if (data.message === 'successfully confirmed this order.') {
                        swal(
                            {
                                title: 'Nice Work!',
                                text: data.message,
                                type: 'success',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 2500
                            }
                        )
                        location.reload();
                    } else {
                        swal(
                            {
                                title: 'oh snap!',
                                text: data.message,
                                type: 'warning',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 2500
                            }
                        )
                    }
                });
                confirmOrder.fail(function (data) {
                    alert(data.message);
                    parent.remove();
                });
            });
            $('.tracking-status').on('click',function() {
                let url = '{{route('admin.order.shipping.status',$order->id)}}';
                let shippingStatus = $.ajax({
                    dataType: 'json',
                    type: 'PUT',
                    data: {api_token: $api_token},
                    url: url,
                });

                shippingStatus.done(function (data) {
                    console.log(data);
                    if (data.message === 'successfully updated shipping status.') {
                        swal(
                            {
                                title: 'Nice Work!',
                                text: data.message,
                                type: 'success',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 2500
                            }
                        )
                        location.reload();
                    } else {
                        swal(
                            {
                                title: 'oh snap!',
                                text: data.message,
                                type: 'warning',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 2500
                            }
                        )
                    }
                });
                shippingStatus.fail(function (data) {
                    console.log(data);
                });
            });
            $('.transaction-status').on('click',function() {
                let url = '{{route('admin.order.payment.status',$order->id)}}';
                let transactionStatus = $.ajax({
                    dataType: 'json',
                    type: 'PUT',
                    data: {api_token: $api_token},
                    url: url,
                });

                transactionStatus.done(function (data) {
                    console.log(data);
                    if (data.message === 'successfully updated payment status.') {
                        swal(
                            {
                                title: 'Nice Work!',
                                text: data.message,
                                type: 'success',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 2500
                            }
                        )
                        location.reload();
                    } else {
                        swal(
                            {
                                title: 'oh snap!',
                                text: data.message,
                                type: 'warning',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 2500
                            }
                        )
                    }
                });
                transactionStatus.fail(function (data) {
                    console.log(data);
                });
            });
        });
    </script>
@endsection
