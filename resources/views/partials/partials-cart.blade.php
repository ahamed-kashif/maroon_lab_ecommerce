<li class="list-inline-item">
    <div class="notifybar">
        <div class="dropdown">
            <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('/images/svg-icon/ecommerce.svg')}}" class="img-fluid icon-svg" alt="cart" title="cart">
                @if(session()->has('cart'))
                    <span class="live-icon">
                        <span class="badge badge-pill badge-warning">{{count(session()->get('cart')->items())}}</span>
                    </span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                <div class="notification-dropdown-title">
                    <a href="{{route('cart.index')}}">
                        <h4>Cart Items</h4>
                    </a>
                </div>
                <ul class="list-unstyled">
                    @if(session()->has('cart'))
                        @foreach(session()->get('cart')->items() as $item)
                            <li class="media dropdown-item">
                                <span class="action-icon">
                                    @if($item->product()->images()->count() != 0)
                                        <img src="{{asset($item->product()->images()->first()->url) }}" class="img-fluid" alt="product">
                                    @else
                                        <img src="{{asset('images/ecommerce/no_image.png') }}" class="img-fluid" alt="product">
                                    @endif
                                </span>
                                <div class="media-body">
                                    <h5 class="action-title">{{$item->product()->title}} X {{$item->getQty()}}</h5>
                                    <p>
                                        <span class="timing">Amount: ৳{{$item->amount()}}</span>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                        <hr>
                        <li class="media dropdown-item">
                            <span class="action-icon badge badge-success-inverse">Bill</span>
                            <div class="media-body">
                                <h5 class="action-title">Total bill of this cart: ৳{{session()->get('cart')->bill()}}</h5>
                                <p><span class="timing">Go to <a href="{{route('cart.index')}}">Checkout</a> or <a href="{{route('store.index')}}">Shop</a> more.</span></p>
                            </div>
                        </li>
                    @else
                        <li class="media dropdown-item">
                            <span class="action-icon badge badge-success-inverse"><i class="feather icon-shopping-bag"></i></span>
                            <div class="media-body">
                                <h5 class="action-title">No items is in your card</h5>
                                <p><span class="timing">Go to <a href="{{route('store.index')}}">Shop</a></span></p>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</li>
