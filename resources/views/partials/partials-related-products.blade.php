<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Related Products</h5>
        </div>
        <div class="card-body">
            <!-- Start row -->
            <div class="row">
                @if($products->count() > 0)
                    @foreach($products as $p)
                        <!-- Start col -->
                        <div class="col-lg-6 col-xl-3">
                            <div class="product-bar m-b-30">
                                <div class="product-head">
                                    @if($p->has('images') && $p->images()->count() != 0)
                                        <a href="{{route('store.product.show', $p->id)}}">
                                            <img src="{{asset($p->images->first()->url)}}" class="img-fluid" alt="product">
                                        </a>
                                    @else
                                        <div class="product-preview">
                                            <a href="{{route('store.product.show', $p->id)}}">
                                                <img src="{{asset('images/ecommerce/no_image.png')}}" class="img-fluid" alt="Product">
                                            </a>
                                        </div>
                                    @endif
                                    @if($p->is_sale())
                                        <p><span class="badge badge-success font-14">Sale</span></p>
                                    @endif
                                </div>
                                <div class="product-body py-3">
                                    <div class="row align-items-center">
{{--                                        <div class="col-12">--}}
{{--                                            <div class="d-inline-block">--}}
{{--                                                <span class="text-uppercase font-12 f-w-6">{{$p->title}}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="d-inline-block float-right">--}}
{{--                                                <i class="feather icon-star text-warning"></i>--}}
{{--                                                <i class="feather icon-star text-warning"></i>--}}
{{--                                                <i class="feather icon-star text-warning"></i>--}}
{{--                                                <i class="feather icon-star"></i>--}}
{{--                                                <i class="feather icon-star"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h6 class="mt-1 mb-3">{{$p->title}}</h6>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        @if($p->is_sale())
                                            <span>
                                                <p class="text-primary font-18 f-w-7 my-3">
                                                    <del class="mr-2">
                                                        <small>
                                                            <sup class="font-10">৳</sup>{{$p->price}}
                                                        </small>
                                                    </del>
                                                    <span class="text-success-gradient">
                                                        <sup class="font-10 text-success-gradient">৳</sup>{{$p->discounted_price}}
                                                    </span>
                                                </p>
                                            </span>
                                        @else
                                            <p class="text-primary font-18 f-w-7 my-3"><sup class="font-16">৳</sup>{{$p->price}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                    @endforeach
                @else
                    @foreach($product->related_products()->get() as $p)
                        <!-- Start col -->
                        <div class="col-lg-6 col-xl-3">
                            <div class="product-bar m-b-30">
                                <div class="product-head">
                                    <a href="{{route('store.product.show', $p->id)}}">
                                        <img src="{{asset($p->images->first()->url)}}" class="img-fluid" alt="product">
                                    </a>
                                    @if($p->is_sale())
                                        <p><span class="badge badge-success font-14">Sale</span></p>
                                    @endif
                                </div>
                                <div class="product-body py-3">
                                    <div class="row align-items-center">
{{--                                        <div class="col-12">--}}
{{--                                            <div class="d-inline-block">--}}
{{--                                                <span class="text-uppercase font-12 f-w-6">{{$p->title}}</span>--}}
{{--                                            </div>--}}
{{--                                            --}}{{--                                            <div class="d-inline-block float-right">--}}
{{--                                            --}}{{--                                                <i class="feather icon-star text-warning"></i>--}}
{{--                                            --}}{{--                                                <i class="feather icon-star text-warning"></i>--}}
{{--                                            --}}{{--                                                <i class="feather icon-star text-warning"></i>--}}
{{--                                            --}}{{--                                                <i class="feather icon-star"></i>--}}
{{--                                            --}}{{--                                                <i class="feather icon-star"></i>--}}
{{--                                            --}}{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h6 class="mt-1 mb-3">{{$p->title}}</h6>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        @if($p->is_sale())
                                            <span>
                                            <p class="text-primary font-18 f-w-7 my-3">
                                                <del class="mr-2">
                                                    <small>
                                                        <sup class="font-10">৳</sup>{{$p->price}}
                                                    </small>
                                                </del>
                                                <span class="text-success-gradient">
                                                    <sup class="font-10 text-success-gradient">৳</sup>{{$p->discounted_price}}
                                                </span>
                                            </p>
                                        </span>
                                        @else
                                            <p class="text-primary font-18 f-w-7 my-3"><sup class="font-16">৳</sup>{{$p->price}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <!-- End row -->
        </div>
    </div>
</div>
