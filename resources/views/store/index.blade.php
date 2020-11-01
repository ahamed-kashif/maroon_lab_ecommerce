@extends('layouts.app')
@section('content')
    <div class="contentbar mt-0">
        <!-- Start row -->
        <div class="row mt-1">
            <!-- Start col -->
            <div class="col-lg-11 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title md-2">Shop</h5><br>
                        @include('partials.alert')
                    </div>
                    <div class="card-body">
                        <!-- Start row -->
                        <div class="row align-items-center ecommerce-sortby">
                            <!-- Start col -->
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <select class="form-control" id="productSortBy" onchange="location = this.value;">
                                    <option value="{{request()->url().'?price=asc'}}" {{isset($_GET['price']) && $_GET['price'] === 'asc' ? 'selected' : ''}}>Price - Low to High</option>
                                    <option value="{{request()->url().'?price=desc'}}" {{isset($_GET['price']) && $_GET['price'] === 'desc' ? 'selected' : ''}}>Price - High to Low</option>
                                </select>
                            </div>
                            <!-- End col -->
                        </div>
                        <!-- End row -->
                        <!-- Start row -->
                        <div class="row">
                            @if($products->count() > 0)
                                @foreach($products as $product)
                                    <!-- Start col -->
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="product-bar m-b-30">
                                            <div class="product-head">
                                                <a href="{{route('store.product.show', $product->id)}}">
                                                    @if($product->images()->count() != 0)
                                                        <img src="{{asset($product->images()->first()->url) }}" class="img-fluid" alt="product">
                                                    @else
                                                        <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product">
                                                    @endif
                                                </a>
                                                @include('partials.partials-sale_tag',$product)
{{--                                                <p><span class="badge badge-success font-14">25% off</span></p>--}}
                                            </div>
                                            <div class="product-body py-3">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div class="d-inline-block">
                                                            <span class="text-uppercase font-12 f-w-6">
                                                                @if($product->categories()->count() > 0)
                                                                    @foreach($product->categories()->get() as $category)
                                                                        {{$category->title.', '}}
                                                                    @endforeach
                                                                @endif
                                                            </span>
                                                        </div>
{{--                                                        <div class="d-inline-block float-right">--}}
{{--                                                            <i class="feather icon-star text-warning"></i>--}}
{{--                                                            <i class="feather icon-star text-warning"></i>--}}
{{--                                                            <i class="feather icon-star text-warning"></i>--}}
{{--                                                            <i class="feather icon-star"></i>--}}
{{--                                                            <i class="feather icon-star"></i>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <h6 class="mt-1 mb-3">{{$product->title}}</h6>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <div class="text-left">
                                                            @if($product->is_sale())
                                                                <span>
                                                                    <p class="text-primary font-18 f-w-7 my-3">
                                                                        <sup class="font-12">৳</sup><del class="mr-2">{{round($product->price,2)}}</del><span class="text-success-gradient text-small"><sup class="font-12 text-success-gradient">৳</sup>{{round($product->discounted_price,2)}}</span>
                                                                    </p>
                                                                </span>
                                                            @else
                                                                <p class="text-primary font-18 f-w-7 my-3"><sup class="font-12">৳</sup>{{round($product->price,2)}}</p>
                                                            @endif
{{--                                                            <h5 class="f-w-7 mb-0"><sup class="font-14">৳</sup>{{$product->price}}</h5>--}}
                                                        </div>
                                                    </div>
{{--                                                    <div class="col-6">--}}
{{--                                                        <div class="text-right">--}}
{{--                                                            <button type="button" class="btn btn-primary-rgba font-18"><i class="feather icon-shopping-bag"></i></button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End col -->
                                @endforeach
                            @else
                                <h4>No Product!</h4>
                            @endif
                        </div>
                        <!-- Start row -->
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-body ecommerce-pagination">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-xl-6">
                                <p>Showing {{($products->currentpage()-1)*$products->perpage()+1}} to {{$products->currentpage()*$products->perpage()}}
                                    of  {{$products->total()}}  products</p>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
{{--            <div class="col-lg-4 col-xl-3">--}}
{{--                <div class="card m-b-30">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-9">--}}
{{--                                <h5 class="card-title mb-0">Categories</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        @if(categories()->count() != 0)--}}
{{--                            @foreach(categories() as $category)--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input category" id="{{$category->id}}" name="category_id[]" value="{{$category->id}}" >--}}
{{--                                    <label class="custom-control-label" for="{{$category->id}}">{{$category->title}}</label>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <h4>No Category is uploaded yet</h4>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card m-b-30">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-9">--}}
{{--                                <h5 class="card-title mb-0">Price</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <ul class="list-inline-group text-right mb-0 pl-0">--}}
{{--                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <input id="range-slider-prefix">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card m-b-30">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-9">--}}
{{--                                <h5 class="card-title mb-0">Colors</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <ul class="list-inline-group text-right mb-0 pl-0">--}}
{{--                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body pt-3">--}}
{{--                        <div class="custom-checkbox-button">--}}
{{--                            <div class="form-check-inline checkbox-primary">--}}
{{--                                <input type="checkbox" id="customCheckboxInline5" name="customCheckboxInline2" checked>--}}
{{--                                <label for="customCheckboxInline5"></label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check-inline checkbox-secondary">--}}
{{--                                <input type="checkbox" id="customCheckboxInline6" name="customCheckboxInline2">--}}
{{--                                <label for="customCheckboxInline6"></label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check-inline checkbox-success">--}}
{{--                                <input type="checkbox" id="customCheckboxInline7" name="customCheckboxInline2">--}}
{{--                                <label for="customCheckboxInline7"></label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check-inline checkbox-danger">--}}
{{--                                <input type="checkbox" id="customCheckboxInline8" name="customCheckboxInline2">--}}
{{--                                <label for="customCheckboxInline8"></label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check-inline checkbox-warning">--}}
{{--                                <input type="checkbox" id="customCheckboxInline9" name="customCheckboxInline2">--}}
{{--                                <label for="customCheckboxInline9"></label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check-inline checkbox-info">--}}
{{--                                <input type="checkbox" id="customCheckboxInline10" name="customCheckboxInline2">--}}
{{--                                <label for="customCheckboxInline10"></label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check-inline checkbox-light">--}}
{{--                                <input type="checkbox" id="customCheckboxInline11" name="customCheckboxInline2">--}}
{{--                                <label for="customCheckboxInline11"></label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check-inline checkbox-dark">--}}
{{--                                <input type="checkbox" id="customCheckboxInline12" name="customCheckboxInline2">--}}
{{--                                <label for="customCheckboxInline12"></label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card m-b-30">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-9">--}}
{{--                                <h5 class="card-title mb-0">Warranty Type</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <ul class="list-inline-group text-right mb-0 pl-0">--}}
{{--                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="custom-control custom-radio">--}}
{{--                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">--}}
{{--                            <label class="custom-control-label" for="customRadio1">1 Year Warranty</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio">--}}
{{--                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">--}}
{{--                            <label class="custom-control-label" for="customRadio2">Membership Warranty</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio">--}}
{{--                            <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">--}}
{{--                            <label class="custom-control-label v-a-m" for="customRadio4">On Site Warranty</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card m-b-30">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-9">--}}
{{--                                <h5 class="card-title mb-0">Tags</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <ul class="list-inline-group text-right mb-0 pl-0">--}}
{{--                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="badge-list">--}}
{{--                            <a href="#" class="badge badge-seondary-inverse">New</a>--}}
{{--                            <a href="#" class="badge badge-seondary-inverse">Latest</a>--}}
{{--                            <a href="#" class="badge badge-seondary-inverse">Featured</a>--}}
{{--                            <a href="#" class="badge badge-seondary-inverse">Popular</a>--}}
{{--                            <a href="#" class="badge badge-seondary-inverse">Trending</a>--}}
{{--                            <a href="#" class="badge badge-seondary-inverse">Sale</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- End col -->
        </div>
        <!-- End row -->

    </div>
@endsection
