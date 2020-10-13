@extends('layouts.app')
@section('css')
    @include('extras.slick-css')
    @include('extras.touchpin-css')
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-xl-5">
                                @include('partials.partials-product-preview',[
                                    'product' => $product
                                ])
                            </div>
                            <div class="col-lg-6 col-xl-7">
{{--                                <p><span class="badge badge-light font-16">Pupular</span></p>--}}
                                <h2 class="font-22">{{$product->title}}</h2>
{{--                                <p>--}}
{{--                                    <i class="feather icon-star text-warning"></i>--}}
{{--                                    <i class="feather icon-star text-warning"></i>--}}
{{--                                    <i class="feather icon-star text-warning"></i>--}}
{{--                                    <i class="feather icon-star"></i>--}}
{{--                                    <i class="feather icon-star"></i>--}}
{{--                                    <span class="ml-2">25 Ratings</span>--}}
{{--                                </p>--}}
                                @if($product->is_sale())
                                    <span>
                                        <p class="text-primary font-26 f-w-7 my-3">
                                            <del class="mr-2">
                                                <small>
                                                    <sup class="font-10">৳</sup>{{$product->price}}
                                                </small>
                                            </del>
                                            <span class="text-success-gradient">
                                                <sup class="font-16 text-success-gradient">৳</sup>{{$product->discounted_price}}
                                            </span>
                                        </p>
                                    </span>
                                @else
                                    <p class="text-primary font-26 f-w-7 my-3"><sup class="font-16">৳</sup>{{$product->price}}</p>
                                @endif
                                <div class="mb-4 summer_text">{!!$product->description !!}</div>
                                @foreach($product->variants->groupBy('type') as $key => $variant)
                                    <div class="mt-3">
                                        <h6>Select {{$key}}</h6>
                                        <div class="form-check form-check-inline">
                                            @foreach($variant as $item)
                                                <input class="form-check-input" type="checkbox" name="variants[]" value="{{$item->id}}">
                                                <label class="form-check-label mr-2" for="inlineCheckbox1">{{$item->id.' '.$item->unit}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-4 col-sm-3 ml-0 p-0 ">
                                    <h5 class="card-title mr-2" for="inlineCheckbox1">Quantity</h5>
                                    <input type="text" class="form-control" id="touchspin-empty-value" name="touchspin-empty-value" value="1">
                                </div>
                                <div class="button-list mt-5 mb-5">
{{--                                    <button type="button" class="btn btn-danger-rgba font-18"><i class="feather icon-heart"></i></button>--}}
                                    <button type="button" class="btn btn-primary-rgba font-18"><i class="feather icon-shopping-bag mr-2"></i>Add to Cart</button>
                                    <button type="button" class="btn btn-success font-17">Buy Now</button>
                                </div>
                                <div class="button-list">
                                    <h6 class="mb-3">Share this product</h6>
                                    <a href="#" class="btn btn-primary-rgba font-18"><i class="feather icon-facebook"></i></a>
                                    <a href="#" class="btn btn-info-rgba font-18"><i class="feather icon-twitter"></i></a>
                                    <a href="#" class="btn btn-danger-rgba font-18"><i class="feather icon-instagram"></i></a>
                                    <a href="#" class="btn btn-warning-rgba font-18"><i class="feather icon-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            @include('partials.partials-product-details',[$product])
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- Start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Related Products</h5>
                    </div>
                    <div class="card-body">
                        <!-- Start row -->
                        <div class="row">
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-3">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product.html"><img src="assets/images/ecommerce/product_img_02.jpg" class="img-fluid" alt="product"></a>
                                        <p><span class="badge badge-primary font-14">New</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">Audio</span>
                                                </div>
                                                <div class="d-inline-block float-right">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">Apple Air Pod</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>120</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-3">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product.html"><img src="assets/images/ecommerce/product_img_03.jpg" class="img-fluid" alt="product"></a>
                                        <p><span class="badge badge-danger font-14">Price Drop</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">Phone</span>
                                                </div>
                                                <div class="d-inline-block float-right">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">Apple iPhone XR</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>1110</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-3">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product.html"><img src="assets/images/ecommerce/product_img_04.jpg" class="img-fluid" alt="product"></a>
                                        <p><span class="badge badge-success font-14">Sale</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">Tablet</span>
                                                </div>
                                                <div class="d-inline-block float-right">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">Apple iPad Mini</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>430</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-3">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product.html"><img src="assets/images/ecommerce/product_img_05.jpg" class="img-fluid" alt="product"></a>
                                        <p><span class="badge badge-warning font-14">Trending</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">Laptop</span>
                                                </div>
                                                <div class="d-inline-block float-right">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">Apple Mac Book Air</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>1700</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i class="feather icon-shopping-bag"></i></button>
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
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('js')
    @include('extras.slick-js')
    @include('extras.touchpin-js')
    <script>
        $(document).ready(function(){
            let count = {{$product->variants->groupBy('type')->count()}};
            $('input[type="checkbox"]').on('change', function() {
                $(this).siblings('input[type="checkbox"]').prop('checked', false);
            });
        });
    </script>
@endsection
