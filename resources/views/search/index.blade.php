@extends('layouts.app')
@section('content')
<div class="card" height="60px">
    <div class="card-header mb-2">
        <h5 class="card-title">Search Result</h5>
    </div>
    <div class="card-body">
        <small><blockquote>Showing {{$products->count()}} results</blockquote></small>
        @if($products->count() > 0)
            <ul class="list-unstyled">
                @foreach($products as $product)
                    <li class="media mb-3">
                        <span class="mr-3">
                             @if($product->images()->count() != 0)
                                <img src="{{asset($product->images()->first()->url) }}" class="img-fluid" alt="product" style="height: 100px;width: 100px;">
                            @else
                                <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product" style="height: 100px;width: 100px;">
                            @endif
                        </span>
                        <div class="media-body">
                            <a href="{{route('store.product.show',$product->id)}}">
                                <h5 class="action-title">{{$product->title}}</h5>
                            </a>
                            <p>{!! $product->short_description !!}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <h4>No result found!</h4>
        @endif
    </div>
</div>
@endsection
