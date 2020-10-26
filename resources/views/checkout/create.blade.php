@extends('layouts.app')
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Checkout</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5">
                                <form id="basic-form-wizard" action="{{route('checkout.store')}}" method="post">
                                    @csrf
                                    <div>
                                        @include('partials.checkout-address-form')
                                        @include('partials.checkout-shipping-method-form')
                                        @include('partials.checkout-payment-method-form')
                                    </div>
                                </form>
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
@section('js')
    @include('extras.checkout-js')
    <script>
        $(document).ready(function () {
            $('.shipping').dblclick(function(){
                $(this).prop('readonly',false);
            });
        })
    </script>
@endsection
