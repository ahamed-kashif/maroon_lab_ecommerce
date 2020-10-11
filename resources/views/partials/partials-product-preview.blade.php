<div class="product-slider-box product-box-for">
    @if($product->images()->count() != 0)
        @foreach($product->images()->get() as $img)
            <div class="product-preview">
                <img src="{{asset($img->url) }}" class="img-fluid" alt="Product">
                <p><span class="badge badge-success font-14">25% off</span></p>
            </div>
        @endforeach
    @else
        <div class="product-preview">
            <img src="{{asset('images/ecommerce/no_image.png')}}" class="img-fluid" alt="Product">
            <p><span class="badge badge-primary font-14">New</span></p>
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
