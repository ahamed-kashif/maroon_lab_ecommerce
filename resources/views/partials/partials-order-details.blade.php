<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-7">
                <h5 class="card-title mb-0">Order No : #{{strtoupper($order->code)}}</h5>
            </div>
            <div class="col-5 text-right">
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
                @endswitch
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                    <h6>Order Placed</h6>
                    <p class="mb-0">{{date_format(date_create($order->created_at),'d/m/Y')}} at {{date_format(date_create($order->created_at),'h:i A')}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                    <h6>Name</h6>
                    <p class="mb-0">{{$order->user->name}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                    <h6>Email ID</h6>
                    <p class="mb-0">{{$order->user->email}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                    <h6>Contact No</h6>
                    <p class="mb-0">{{$order->shipping_to_contact}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6 ">
                <div class="order-primary-detail mb-4">
                    <h6>Shipping Address</h6>
                    <p>{{$order->shipping_to}}</p>
                    <p>{{$order->shipping_address}},<br/> {{$order->shipping_city}}, {{$order->shipping_district}}.<br/>
                        {{$order->shipping_post_code}}</p>
                    <p class="mb-0">{{$order->shipping_to_contact}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 ">
                <div class="order-primary-detail mb-4 row">
                    <div class="col-lg-6 col-md-6 col-xl-6">
                        <h6>Shipping Method</h6>
                        <span class="badge badge-info-inverse">{{$order->order_tracking->shipping_method->short_code}}</span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xl-6">
                        <h6>Payment Method</h6>
                        <span class="badge badge-info-inverse">{{$order->transaction->payment_method->short_code}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
