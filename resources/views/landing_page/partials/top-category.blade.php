<div class="category-slider-container">
    @foreach(categories() as $item)
        @if($item->images()->count() > 0)
            <!--=======  single category  =======-->
            <div class="single-category">
                <div class="category-image">
                    <a href="{{route('store.category',$item->id)}}" title="Vegetables">
                        <img src="{{asset($item->images->first()->url)}}" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="category-title">
                    <h3>
                        <a href="{{route('store.category',$item->id)}}"> {{$item->title}}</a>
                    </h3>
                </div>
            </div>
            <!--=======  End of single category  =======-->
        @endif
    @endforeach

</div>
