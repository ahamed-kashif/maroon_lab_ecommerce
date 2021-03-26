<header>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="header-banner">
                        <div class="assetBlock">
                            <div id="slideshow">
                                <p>Farm produces at your doorstep  <span>with</span> reasonable price </p>
                                <p> <span>Fast</span> home delivery </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="header-container row">
                <div class="logo">
                    <a href="/" title="index">
                        <div><img src="{{smallLogoUrl()}}" alt="logo" width="100" height="75"></div>
                    </a>
                </div>
                <div class="fl-nav-menu">
                    <nav>
                        <div class="mm-toggle-wrap">
                            <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
                        </div>
                        <div class="nav-inner">
                            <!-- BEGIN NAV -->
                            <ul id="nav" class="hidden-xs">

                                <li> <a class="level-top" href="#"><span>Home</span></a></li>
                                @foreach(categories() as $category)
                                    <li class="level0 parent drop-menu"><a href="{{route('store.category'),$category->id}}"><span>{{ucfirst($category->title)}}</span> </a>
                                        <!--sub sub category-->
                                        @if (count($category->subcategories) > 0)
                                            <ul class="level1">
                                                @foreach($category->subcategories as $sub)
                                                <li class="level1 first"><a href="{{route('store.subcategory',$sub->id)}}"><span>{{ucfirst($sub->title)}}</span></a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <!--nav-->
                        </div>
                    </nav>
                </div>

                <!--row-->

                <div class="fl-header-right">
                    <div class="fl-links">
                        <div class="no-js">
                            <a title="Company" class="clicker"></a>
                            <div class="fl-nav-links">
                                <ul class="links">
                                    <li><a href="{{route('home')}}" title="My Account">My Account</a></li>
                                    <li><a href="{{route('checkout.create')}}" title="Checkout">Checkout</a></li>
{{--                                    <li class="last"><a href="login.html" title="Login"><span>Login</span></a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fl-cart-contain">
                        <div class="mini-cart">
                            <div class="basket">
                                <a href="{{route('cart.index')}}"><span> {{session()->has('cart') ? count(session()->get('cart')->items()) : '0'}} </span></a>
                            </div>
                            <div class="fl-mini-cart-content" style="display: none;">
                                <div class="block-subtitle">
                                    <div class="top-subtotal">{{session()->has('cart') ? count(session()->get('cart')->items()) : '0'}} items, <span class="price">{{session()->has('cart') ? session()->get('cart')->bill() : '0'}}TK</span> </div>
                                    <!--top-subtotal-->
                                    <!--pull-right-->
                                </div>
                                <!--block-subtitle-->
                                @if (session()->has('cart'))
                                    @if (count(session()->get('cart')->items()) > 0)
                                        <ul class="mini-products-list" id="cart-sidebar">
                                            @foreach(session()->get('cart')->items() as $item)
                                                <li class="item first">
                                                    <div class="item-inner">
                                                        <a class="product-image" title="{{$item->product()->title}}" href="{{route('store.product.show',$item->product()->id)}}">
                                                            @if($item->product()->images->count() > 0)
                                                                <img alt="{{$item->product()->title}}" src="{{$item->images->first()->url}}">
                                                            @else
                                                                <img alt="{{$item->product()->title}}" src="{{asset('images/ecommerce/no_image.png')}}">
                                                            @endif
                                                        </a>
                                                        <div class="product-details">
                                                            <!--access-->
                                                            <strong>{{$item->getQty()}}</strong> x <span class="price">{{$item->amount()}} TK</span>
                                                            <p class="product-name"><a href="{{route('store.product.show',$item->product()->id)}}">{{$item->product()->title}}</a></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endif
                                <div class="actions">
                                    <button class="btn-checkout" title="Checkout" type="button" onclick="window.location = {{route('checkout.create')}}"><span>Checkout</span></button>
                                </div>
                                <!--actions-->
                            </div>
                            <!--fl-mini-cart-content-->
                        </div>
                    </div>
                    <!--mini-cart-->
                    <div class="collapse navbar-collapse">
                        <form class="navbar-form" role="search" action="{{route('search.index')}}" method="get">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                  <button type="submit" class="search-btn"> <span class="glyphicon glyphicon-search"> <span class="sr-only">Search</span> </span> </button>
                  </span> </div>
                        </form>
                    </div>
                    <!--links-->
                </div>
            </div>
        </div>
    </div>
</header>
