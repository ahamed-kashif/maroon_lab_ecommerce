<div class="product-slider-box product-box-for">
    @if($product->images()->count() != 0)
        @foreach($product->images()->get() as $img)
            <div class="product-preview">
                <img src="{{asset($img->url) }}" class="img-fluid" alt="Product">
                @include('partials.partials-sale_tag',$product)
            </div>
        @endforeach
    @else
        <div class="product-preview">
            <img src="{{asset('images/ecommerce/no_image.png')}}" class="img-fluid" alt="Product">
        </div>
    @endif
</div>
<div class="product-slider-box product-box-nav">
    @if($product->images()->count() != 0)
        @foreach($product->images()->get() as $img)
            <div class="product-preview">
                <img src="{{asset($img->url)}}" class="img-fluid" alt="Product">
            </div>
        @endforeach
    @endif
</div>
