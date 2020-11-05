<div class="slider tab-slider mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-slider-wrapper">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="featured-tab" data-toggle="tab" href="#featured" role="tab"
                               aria-selected="true">Featured</a>
                            <a class="nav-item nav-link" id="nav-onsale-tab" data-toggle="tab" href="#on-sale" role="tab"
                               aria-selected="false">On Sale</a>
                            <a class="nav-item nav-link" id="nav-all-products-tab" data-toggle="tab" href="#all-products" role="tab"
                               aria-selected="false">All Products</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <!--=======  tab slider container  =======-->
                            <div class="tab-slider-container">
                                <!--=======  single tab slider item  =======-->
                                @for($i = 0 ; $i < featured_products()->count() && $i != featured_products()->count(); $i=$i+2)
                                    <div class="single-tab-slider-item">
                                        @if($i < featured_products()->count())
                                            @for($j = $i; $j<=$i+1; $j++)
                                                @if($j < featured_products()->count())
                                                <!--=======  tab slider sub product  =======-->
                                                <div class="gf-product tab-slider-sub-product">
                                                    <div class="image">
                                                        <a href="{{route('store.product.show',featured_products()[$i]->id)}}">
                                                            @if(featured_products()[$i]->discounted_price != null)
                                                                <span class="onsale">Sale!</span>
                                                            @endif
                                                            @if(featured_products()[$j]->images()->count() != 0)
                                                                <img src="{{asset(featured_products()[$j]->images()->first()->url) }}" class="img-fluid" alt="product">
                                                            @else
                                                                <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product">
                                                            @endif
                                                        </a>
                                                        <div class="product-hover-icons">
                                                            <a href="{{route('store.product.show',featured_products()[$i]->id)}}" data-tooltip="View"> <span class="icon_search"></span> </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="product-categories">
                                                            @foreach(featured_products()[$j]->categories as $k)
                                                                <a href="{{route('store.category',$k->id)}}">{{$k->title}}</a>,
                                                            @endforeach
                                                        </div>
                                                        <h3 class="product-title"><a href="{{route('store.product.show', featured_products()[$j]->id)}}">{{featured_products()[$j]->title}}</a></h3>
                                                        <div class="price-box">
                                                            @if(featured_products()[$j]->discounted_price != null)
                                                                <span class="main-price">৳{{featured_products()[$j]->price}}</span>
                                                                <span class="discounted-price">৳{{featured_products()[$j]->discounted_price}}</span>
                                                            @else
                                                                <span class="discounted-price">৳{{featured_products()[$j]->price}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--=======  End of tab slider sub product  =======-->
                                                @endif
                                            @endfor
                                        @endif
                                    </div>
                                @endfor
                            </div>
                            <!--=======  End of tab slider container  =======-->
                        </div>
                        <div class="tab-pane fade" id="on-sale" role="tabpanel" aria-labelledby="nav-onsale-tab">
                            <!--=======  tab slider container  =======-->
                                <div class="tab-slider-container">
                                    @for($i = 0 ; $i < sale_products()->count() && $i != sale_products()->count(); $i=$i+2)
                                        <!--=======  single tab slider item  =======-->
                                        <div class="single-tab-slider-item">
                                            @if($i < sale_products()->count())
                                                @for($j = $i; $j<=$i+1; $j++)
                                                    @if($j < sale_products()->count())
                                                        <!--=======  tab slider sub product  =======-->
                                                        <div class="gf-product tab-slider-sub-product">
                                                            <div class="image">
                                                                <a href="{{route('store.product.show',sale_products()[$j]->id)}}">
                                                                    <span class="onsale">Sale!</span>
                                                                    @if(sale_products()[$j]->images()->count() != 0)
                                                                        <img src="{{asset(sale_products()[$j]->images()->first()->url) }}" class="img-fluid" alt="product">
                                                                    @else
                                                                        <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="product-content">
                                                                <div class="product-categories">
                                                                    @foreach(sale_products()[$j]->categories as $k)
                                                                        <a href="{{route('store.category',$k->id)}}">{{$k->title}}</a>,
                                                                    @endforeach
                                                                </div>
                                                                <h3 class="product-title"><a href="{{route('store.product.show',sale_products()[$j]->id)}}">{{sale_products()[$j]->title}}</a></h3>
                                                                <div class="price-box">
                                                                    @if(sale_products()[$j]->discounted_price != null)
                                                                        <span class="main-price">৳{{sale_products()[$j]->price}}</span>
                                                                        <span class="discounted-price">৳{{sale_products()[$j]->discounted_price}}</span>
                                                                    @else
                                                                        <span class="discounted-price">৳{{sale_products()[$j]->price}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--=======  End of tab slider sub product  =======-->
                                                    @endif
                                                @endfor
                                            @endif
                                        </div>
                                        <!--=======  End of single tab slider product  =======-->
                                    @endfor
                                </div>
                            <!--=======  End of tab slider container  =======-->
                        </div>
                        <div class="tab-pane fade" id="all-products" role="tabpanel" aria-labelledby="nav-all-products-tab">
                            <!--=======  tab slider container  =======-->
                                <div class="tab-slider-container">
                                    @for($i = 0 ; $i < all_products()->count() && $i != all_products()->count(); $i=$i+2)
                                        <!--=======  single tab slider item  =======-->
                                        <div class="single-tab-slider-item">
                                            @if($i < all_products()->count())
                                                @for($j = $i; $j<=$i+1; $j++)
                                                    @if($j < all_products()->count())
                                                        <!--=======  tab slider sub product  =======-->
                                                        <div class="gf-product tab-slider-sub-product">
                                                            <div class="image">
                                                                <a href="{{route('store.product.show',all_products()[$j]->id)}}">
                                                                    @if(all_products()[$i]->discounted_price != null)
                                                                        <span class="onsale">Sale!</span>
                                                                    @endif
                                                                    @if(all_products()[$j]->images()->count() != 0)
                                                                        <img src="{{asset(all_products()[$j]->images()->first()->url) }}" class="img-fluid" alt="product">
                                                                    @else
                                                                        <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="product-content">
                                                                <div class="product-categories">
                                                                    @foreach(all_products()[$j]->categories as $k)
                                                                        <a href="{{route('store.category',$k->id)}}">{{$k->title}}</a>,
                                                                    @endforeach
                                                                </div>
                                                                <h3 class="product-title"><a href="{{route('store.product.show',all_products()[$j]->id)}}">{{all_products()[$j]->title}}</a></h3>
                                                                <div class="price-box">
                                                                    @if(all_products()[$j]->discounted_price != null)
                                                                        <span class="main-price">৳{{all_products()[$j]->price}}</span>
                                                                        <span class="discounted-price">৳{{all_products()[$j]->discounted_price}}</span>
                                                                    @else
                                                                        <span class="discounted-price">৳{{all_products()[$j]->price}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--=======  End of tab slider sub product  =======-->
                                                    @endif
                                                @endfor
                                            @endif
                                        </div>
                                        <!--=======  End of single tab slider product  =======-->
                                    @endfor
                                </div>
                            <!--=======  End of tab slider container  =======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
