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
                @if($order->status == 'pending')
                    @include('partials.partials-order-status-confirm',['order'=>$order])
                @endif
                @include('partials.partials-order-tracking')
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Chat with Customers</h5>
                    </div>
                    <div class="card-body">
                        <div class="chat-detail order-chat-detail mb-0">
                            <div class="chat-body">
                                <div class="chat-day text-center mb-3">
                                    <span class="badge badge-secondary">Today</span>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>Hello!</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:18 pm<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-left">
                                    <div class="chat-message-text">
                                        <span>Yes, Sir</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>Schedule demo.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-left">
                                    <div class="chat-message-text">
                                        <span>Sure, I will.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>Great. Thanks</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-left">
                                    <div class="chat-message-text">
                                        <span>I have completed.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>Please, send me.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-left">
                                    <div class="chat-message-text">
                                        <span>Sure, I will email you.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                                    </div>
                                </div>
                                <div class="chat-message chat-message-right">
                                    <div class="chat-message-text">
                                        <span>Ok, Got it.</span>
                                    </div>
                                    <div class="chat-message-meta">
                                        <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-bottom px-0 pb-0">
                                <div class="chat-messagebar">
                                    <form>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-secondary-rgba" type="button" id="button-addonmic"><i class="feather icon-mic"></i></button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Type a message..." aria-label="Text">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary-rgba" type="submit" id="button-addonlink"><i class="feather icon-link"></i></button>
                                                <button class="btn btn-primary-rgba" type="button" id="button-addonsend"><i class="feather icon-send"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Downloads</h5>
                    </div>
                    <div class="card-body">
                        <p><button type="button" class="btn btn-primary-rgba my-1"><i class="feather icon-file mr-2"></i>Invoice</button></p>
                        <p><button type="button" class="btn btn-info-rgba my-1"><i class="feather icon-box mr-2"></i>Packaing Slip</button></p>
                        <p><button type="button" class="btn btn-success-rgba my-1"><i class="feather icon-gift mr-2"></i>Gift Wrap Detail</button></p>
                    </div>
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
            $('.order-confirm').on('click',function() {
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
                        $('.order-confirm').prop("disabled",true);
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
        });
    </script>
@endsection
