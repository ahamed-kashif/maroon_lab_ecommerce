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
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <!--=======  tab slider container  =======-->
                            <div class="tab-slider-container">
                                <!--=======  single tab slider item  =======-->
                                @foreach(featured_products() as $item)
                                    <div class="single-tab-slider-item">
                                        <!--=======  tab slider sub product  =======-->
                                        <div class="gf-product tab-slider-sub-product">
                                            <div class="image">
                                                <a href="{{route('store.product.show',$item->id)}}">
                                                    @if($item->images()->count() != 0)
                                                        <img src="{{asset($item->images()->first()->url) }}" class="img-fluid" alt="product">
                                                    @else
                                                        <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-categories">
                                                    @foreach($item->categories as $i)
                                                        <a href="{{route('store.category',$i->id)}}">{{$i->title}}</a>,
                                                    @endforeach
                                                </div>
                                                <h3 class="product-title"><a href="{{route('store.product.show', $item->id)}}">{{$item->title}}</a></h3>
                                                <div class="price-box">
                                                    @if($item->discounted_price != null)
                                                        <span class="main-price">৳{{$item->price}}</span>
                                                        <span class="discounted-price">৳{{$item->discounted_price}}</span>
                                                    @else
                                                        <span class="discounted-price">৳{{$item->price}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!--=======  End of tab slider sub product  =======-->
                                    </div>
                                @endforeach
                                <!--=======  End of single tab slider product  =======-->
                            </div>
                            <!--=======  End of tab slider container  =======-->
                        </div>
                        <div class="tab-pane fade" id="on-sale" role="tabpanel" aria-labelledby="nav-onsale-tab">
                            <!--=======  tab slider container  =======-->
                            <div class="tab-slider-container">
                                @foreach(sale_products() as $item)
                                    <!--=======  single tab slider item  =======-->
                                    <div class="single-tab-slider-item">
                                        <!--=======  tab slider sub product  =======-->
                                        <div class="gf-product tab-slider-sub-product">
                                            <div class="image">
                                                <a href="{{route('store.product.show',$item->id)}}">
                                                    <span class="onsale">Sale!</span>
                                                    @if($item->images()->count() != 0)
                                                        <img src="{{asset($item->images()->first()->url) }}" class="img-fluid" alt="product">
                                                    @else
                                                        <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-categories">
                                                    @foreach($item->categories as $i)
                                                        <a href="{{route('store.category',$i->id)}}">{{$i->title}}</a>,
                                                    @endforeach
                                                </div>
                                                <h3 class="product-title"><a href="{{route('store.product.show',$item->id)}}">{{$item->title}}</a></h3>
                                                <div class="price-box">
                                                    @if($item->discounted_price != null)
                                                        <span class="main-price">৳{{$item->price}}</span>
                                                        <span class="discounted-price">৳{{$item->discounted_price}}</span>
                                                    @else
                                                        <span class="discounted-price">৳{{$item->price}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!--=======  End of tab slider sub product  =======-->
                                    </div>
                                    <!--=======  End of single tab slider product  =======-->
                                @endforeach
                            </div>

                            <!--=======  End of tab slider container  =======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
