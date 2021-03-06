@extends('layouts.app')
@section('content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- End row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-md-12 col-lg-10 col-xl-10">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="invoice">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="col-12 col-md-7 col-lg-7">
                                    <div class="invoice-logo">
                                        <img src="{{bigLogoUrl()}}" class="img-fluid" alt="invoice-logo">
                                    </div>
                                    <h4>{{config('app.name')}}</h4>
                                    <p>In music the passions follow themselves</p>
                                    <p class="mb-0">29/13 Taj Mahal Road, Block #C, Mohammadpur, Dhaka - 1207</p>
                                </div>
                                <div class="col-12 col-md-5 col-lg-5">
                                    <div class="invoice-name">
                                        <h5 class="text-uppercase mb-3">Order</h5>
                                        <p class="mb-1">No : #{{strtoupper($order->code)}}</p>
                                        <p class="mb-0">{{date_format(date_create($order->created_at),'d,M Y')}}</p>
                                        <h4 class="text-success mb-0 mt-3"><small>৳</small>{{$order->transaction->total_payable_amount}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-billing">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-address">
                                        <h6 class="mb-3">Shipping to</h6>
                                        <h6 class="text-muted">{{$order->shipping_to}}</h6>
                                        <ul class="list-unstyled">
                                            <li>{{$order->shipping_address}}, {{$order->shipping_city}}, {{$order->shipping_district}},
                                                {{$order->shipping_post_code}}</li>
                                            <li>{{$order->shipping_to_contact}}</li>
                                            <li>{{$order->user->email}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-address">
                                        <h6 class="mb-3">Shipping</h6>
                                        <ul class="list-unstyled">
                                            <li>{{$order->order_tracking->shipping_method->title}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="invoice-address">
                                        <div class="card">
                                            <div class="card-body bg-info-rgba text-center">
                                                <h6>Payment</h6>
                                                <ul class="list-unstyled">
                                                    <li>{{$order->transaction->payment_method->title}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-summary">
                            <div class="table-responsive ">
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Variants</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Price(৳)</th>
                                        <th scope="col">Discount(<small>৳</small>)</th>
                                        <th scope="col" class="text-right">Total(৳)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->products as $product)
                                        <tr>
                                            <th scope="row">{{$loop->index+1}}</th>
                                            <td>
                                                @if($product->images->count() > 0)
                                                    <img src="{{asset($product->images->first()->url) }}" class="img-fluid" width="35" alt="product">
                                                @else
                                                    <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" width="35" alt="product">
                                                @endif
                                            </td>
                                            <td>{{$product->title}}</td>
                                            <td>
                                                @if($product->pivot->variants != null)
                                                    {{--                                    {{dd(json_decode($product->pivot->variants))}}--}}
                                                    <small>{{json_decode($product->pivot->variants)->value}} {{json_decode($product->pivot->variants)->unit}}</small>
                                                @else
                                                    NILL
                                                @endif
                                            </td>
                                            <td>{{$product->pivot->quantity}}</td>
                                            <td>{{$product->pivot->price}}</td>
                                            <td>{{$product->pivot->discounted_price}}</td>
                                            <td class="text-right">{{$product->pivot->price*$product->pivot->quantity}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-summary-total">
                            <div class="row">
                                <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                    @if($order->note != null)
                                        <div class="order-note">
                                            <h6>Special Note for this order:</h6>
                                            <p>{{$order->note}}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                    <div class="order-total table-responsive ">
                                        <table class="table table-borderless text-right">
                                            <tbody>
                                            <tr>
                                                <td>Total :</td>
                                                <td>৳{{$order->total}}</td>
                                            </tr>
                                            <tr>
                                                <td>Discount :</td>
                                                <td>৳{{$order->discount}}</td>
                                            </tr>
                                            <tr>
                                                <td class="f-w-7 font-18"><h5>Amount Payable :</h5></td>
                                                <td class="f-w-7 font-18"><h5>৳{{$order->transaction->total_payable_amount}}</h5></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-meta">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-meta-box">
                                        <h6 class="mb-3">Terms & Conditions</h6>
                                        <ul class="pl-3">
                                            <li>We are responsible for Courier Damage.</li>
                                            <li>Subjects to Jurisdiction.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-meta-box">
                                        <h6 class="mb-3">Contact Us</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="/"><i class="feather icon-aperture mr-2"></i>{{env('app_url')}}</a></li>
                                            <li><a href="href = mailto:{{env('app_mail')}}"><i class="feather icon-mail mr-2"></i>{{env('app_mail')}}</a></li>
                                            <li><a href="tel:{{env('app_phone')}}"><i class="feather icon-phone mr-2"></i>{{env('app_phone')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="invoice-meta-box text-right">
                                        <h6 class="mb-0">Authorized Signatory</h6>
                                        <h6>{{env('app_signature')}}</h6>
{{--                                        <img src="{{asset('images/general/signature.svg')}}" class="img-fluid my-3" alt="signature">--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-footer">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <p class="mb-0">Thank you for being with us.</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-footer-btn">
                                        <a href="javascript:window.print()" class="btn btn-primary-rgba py-1 font-16"><i class="feather icon-printer mr-2"></i>Print</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->


@endsection
