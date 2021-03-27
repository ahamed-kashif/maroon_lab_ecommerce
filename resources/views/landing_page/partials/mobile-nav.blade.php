<div id="mobile-menu">
    <ul>
        <li>
            <div class="mm-search">
                <form id="search1" name="search">
                    <div class="input-group">

                        <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li>
            <div class="home"><a href="#">Home</a> </div>
        </li>
        @if(count(categories()) > 0)
            @foreach( categories() as $c)
                <li><a href="#">{{$c->title}}</a>
                @if($c->subcategories->count() > 0)
                    <ul>
                        @foreach($c->subcategories as $s)
                            <li><a href="{{route('store.subcategory',$s->id)}}">$s->title</a></li>
                        @endforeach
                    </ul>
                @endif
                </li>
            @endforeach
        @endif
        <li><a href="javascript:void(0)">Contact Us</a></li>
    </ul>
    <div class="top-links">
        <ul class="links">
            @auth
                <li><a title="My Account" href="{{route('home')}}">My Account</a> </li>
                <li>
                    <form action="{{route('logout')}}" method="post" id="logout-form">
                        @csrf
                    </form>
                    <a title="logout" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                </li>
            @else
                <li class="last"><a title="Login" href="{{route('login')}}">Login</a> </li>
                <li class="last"><a title="Login" href="{{route('register')}}">Register</a> </li>
            @endauth
{{--            <li><a title="Wishlist" href="wishlist.html">Wishlist</a> </li>--}}
            <li><a title="Checkout" href="{{route('checkout.create')}}">Checkout</a> </li>
        </ul>
    </div>
</div>
