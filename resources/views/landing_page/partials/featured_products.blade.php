<section class=" wow bounceInUp animated">
    <div class="best-pro slider-items-products container">
        <div class="new_title">
            <h2>Best Seller</h2>
            <h4>So you get to know me better</h4>
        </div>
        <div id="best-seller" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                @if(count(featured_products()) > 0)
                    @foreach(featured_products() as $p)
                        <div class="item">
                    <div class="item-inner">
                        <div class="item-img">
                            <div class="item-img-info">
                                <a href="{{route('store.product.show',$p->id)}}" title="{{$p->title}}" class="product-image">
                                    @if($p->images->count() != 0)
                                        <img src="{{asset($product->images->first()->url) }}" alt="product">
                                    @else
                                        <img src="{{asset('images/ecommerce/no_image.png') }}" alt="product">
                                    @endif
                                </a>
                                <div class="new-label new-top-left">Hot</div>
                                @if($p->is_sale())
                                    <div class="sale-label sale-top-left">-{{round(100 / ($p->price - $p->discounted_price), 1)}}%</div>
                                @endif
                            </div>
{{--                            <div class="add_cart">--}}
{{--                                <button class="button btn-cart" type="button"><span>Add to Cart</span></button>--}}
{{--                            </div>--}}
                        </div>
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="item-title">
                                    <a href="{{route('store.product.show',$p->id)}}" title="{{$p->title}}">{{$p->title}}</a> </div>
                                <div class="item-content">
{{--                                    <div class="rating">--}}
{{--                                        <div class="ratings">--}}
{{--                                            <div class="rating-box">--}}
{{--                                                <div class="rating" style="width:80%"></div>--}}
{{--                                            </div>--}}
{{--                                            <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="item-price">
                                        <div class="price-box"><span class="regular-price" ><span class="price">{{$p->price}} Tk</span> </span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
