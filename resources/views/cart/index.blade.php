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
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-header text-center">
                        <h3>CART</h3>
                    </div>
                    @include('partials.alert')
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-xl-10">
                                <div class="cart-container">
                                    <div class="cart-head">
                                        <div class="table-responsive">
                                            @if(count($cart->items()) > 0)
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Action</th>
                                                            <th scope="col">Photo</th>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Qty</th>
                                                            <th scope="col">Price(৳)</th>
                                                            <th scope="col" class="text-right">Total(৳)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cart->items() as $item)
                                                            <tr>
                                                                <th scope="row">{{$loop->index+1}}</th>
                                                                <td>
                                                                    <form action="{{route('cart.product.remove', $item->product()->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to Delete?')">
                                                                            <i class="feather icon-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('store.product.show', $item->product()->id)}}">
                                                                        @if($item->product()->images()->count() != 0)
                                                                            <img src="{{asset($item->product()->images()->first()->url) }}" class="img-fluid" width="35" alt="product" alt="product">
                                                                        @else
                                                                            <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" width="35" alt="product" alt="product">
                                                                        @endif
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    {{$item->product()->title}}
                                                                    @if(count($item->variants())>0)
                                                                        @foreach($item->variants() as $v)
                                                                            <span class="badge-pill badge-info-inverse">{{$v->value.' '.$v->unit}}</span>
                                                                        @endforeach
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="form-group mb-0">
                                                                        <input type="number" class="form-control cart-qty qty" name="cartQty1" id="cartQty1" value="{{$item->getQty()}}" data-id="{{$item->product()->id}}">
                                                                    </div>
                                                                </td>
                                                                <td>{{$item->product()->price}}</td>
                                                                <td class="text-right amount" id="{{$item->product()->id}}">{{$item->amount()}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="align-content-center">
                                                    <h5>No Products in your cart!</h5>
                                                    <blockquote>Go to <a href="{{route('store.index')}}">shop</a></blockquote>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <form action="{{route('cart.update')}}" method="post">
                                        @csrf
                                        <div class="cart-body">
                                            <div class="row">
                                                <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                                    <div class="order-note">
    {{--                                                        <div class="form-group">--}}
    {{--                                                            <div class="input-group">--}}
    {{--                                                                <input type="search" class="form-control" placeholder="Coupon Code" aria-label="Search" aria-describedby="button-addonTags">--}}
    {{--                                                                <div class="input-group-append">--}}
    {{--                                                                    <button class="input-group-text" type="submit" id="button-addonTags">Apply</button>--}}
    {{--                                                                </div>--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
                                                            <div class="form-group">
                                                                <label for="specialNotes">Special Note for this order:</label>
                                                                <textarea class="form-control" name="specialNotes" id="specialNotes" rows="3" placeholder="Message here">{{$cart->order_note != "" ? $cart->order_note : ''}}</textarea>
                                                            </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                                    <div class="order-total table-responsive ">
                                                        <table class="table table-borderless text-right">
                                                            <tbody>
                                                            <tr>
                                                                <td>Sub Total :</td>
                                                                <td>৳{{$cart->total()}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Discount :</td>
                                                                <td>৳{{$cart->discount()}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="f-w-7 font-18"><h4>Amount :</h4></td>
                                                                <td class="f-w-7 font-18"><h4>৳{{$cart->bill()}}</h4></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-footer text-right">
                                            <button type="submit" class="btn btn-primary-rgba my-1"><i class="feather icon-save mr-2"></i>Update Cart</button>
                                            <a href="page-checkout.html" class="btn btn-success-rgba my-1">Proceed to Checkout<i class="feather icon-arrow-right ml-2"></i></a>
                                        </div>
                                    </form>
                                </div>
                                <span class="align-content-start">
                                    <small><span class="timing">Go to <a href="{{route('store.index')}}">Shop</a> for more products to add.</span></small>
                                </span>
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
    @include('extras.sweetalert2-js')
    <script src="{{asset('js/restapi.js')}}"></script>
    <script>
        $(document).ready(function () {
            let $qty = $('.qty');
            $qty.on('change', function(){
                let url = '{{route('cart.product.update', 'product')}}';
                url = url.replace('product', $(this).attr('data-id'));
                let updateItem =$.ajax({
                    dataType: 'json',
                    type : 'post',
                    data: {qty: $(this).val()},
                    url : url,
                });
                updateItem.done(function(data){
                    if(data.message == 'updated'){
                        swal(
                            {
                                title: 'Nice Work!',
                                text: data.message,
                                type: 'success',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1500
                            }
                        )
                        location.reload();
                    }else{
                        swal(
                            {
                                title: 'oh snap!',
                                text: data.message,
                                type: 'warning',
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1500
                            }
                        )
                    }
                });
                updateItem.fail(function(){
                    swal(
                        {
                            title: 'oh snap!',
                            text: 'something went wrong!',
                            type: 'danger',
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1500
                        }
                    )
                    location.reload();
                });
            });
        });
    </script>
@endsection
