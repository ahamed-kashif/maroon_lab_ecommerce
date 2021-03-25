<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="/" class="logo logo-large">
                                <img src="{{bigLogoUrl()}}" class="img-fluid" alt="logo">
            </a>
            <a href="/" class="logo logo-small"><img src="{{smallLogoUrl()}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="javaScript:void(0);">
                        <img src="{{asset('images/svg-icon/basic.svg')}}" class="img-fluid" alt="dashboard"><span>Shop</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('store.index')}}">All Products</a></li>
                        <li>
                            @foreach(categories() as $item)
                                <li>
                                    <a href="{{route('store.category', $item->id)}}">
                                        {{$item->title}}
                                    </a>
                                </li>
                            @endforeach
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0);">
                        <img src="{{asset('images/svg-icon/ecommerce.svg')}}" class="img-fluid" alt="dashboard"><span>Cart</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('cart.index')}}">@guest my bag!@else <span class="text-primary">{{auth()->user()->name.'`s'}}</span> bag! <span class="badge badge-pill badge-primary">{{session()->has('cart') ? (count(session()->get('cart')->items())):''}}</span>@endguest </a></li>
                    </ul>
                </li>
                @foreach(categories() as $item)
                    @if($item->subcategories->count() >0)
                        <li>
                            <a href="javaScript:void(0);">
                                <img src="{{asset('images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>{{$item->title}}</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{route('store.category',$item->id)}}">{{$item->title}}</a></li>
                                @foreach($item->subcategories as $i)
                                    @if($i->is_active == 1)
                                        <li><a href="{{route('store.subcategory',$i->id)}}">{{$i->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="javaScript:void(0);">
                                <img src="{{asset('images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>{{$item->title}}</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{route('store.category',$item->id)}}">{{$item->title}}</a></li>
                            </ul>
                        </li>
                    @endif
                @endforeach
                @auth
                    @if(auth()->user()->roles()->count() > 0)
                        <li>
                            <a href="javaScript:void(0);">
                                <img src="{{asset('images/svg-icon/icons.svg')}}" class="img-fluid" alt="dashboard"><span>Admin Panel</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li>
                                    <a href="#">Shop</a>
                                    <ul class="vertical-submenu">
                                        @can('create product')
                                            <li><a href="{{route('product.create')}}">Add Product</a></li>
                                        @endcan
                                        @can('index product')
                                            <li><a href="{{route('product.index')}}">Products</a></li>
                                        @endcan
                                        @can('index category')
                                            <li><a href="{{route('category.index')}}">Categories</a></li>
                                        @endcan
                                        @can('index subcategory')
                                            <li><a href="{{route('subcategory.index')}}">Sub-Categories</a></li>
                                        @endcan
                                        @can('index variant')
                                            <li><a href="{{route('variant.index')}}">Variants</a></li>
                                        @endcan
                                    </ul>
                                </li>
                                @can('index page')
                                    <li><a href="{{route('page.index')}}">Pages</a></li>
                                @endcan
                                @can('index userslist')
                                    <li><a href="{{route('user.list')}}">Users</a></li>
                                @endcan
                                @can('index shipping_method')
                                    <li><a href="{{route('shipping_method.index')}}">Shipping-Method</a></li>
                                @endcan
                                @can('index payment_method')
                                    <li><a href="{{route('payment_method.index')}}">Payment-Method</a></li>
                                @endcan
                                @can('index order')
                                    <li><a href="{{route('admin.order.index')}}">Orders</a></li>
                                @endcan
                                @can('index transaction')
                                    <li><a href="{{route('transaction.index')}}">Transactions</a></li>
                                @endcan
                                <li>
                                    <a href="#">Landing Page</a>
                                    <ul class="vertical-submenu">
                                        @can('upload slider')
                                            <li><a href="{{route('admin.landing.slider.upload')}}">Upload Sliders</a></li>
                                        @endcan
                                        @can('upload slider')
                                            <li><a href="{{route('admin.landing.slider.index')}}">Sliders</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="javaScript:void(0);">
                            <img src="{{asset('images/svg-icon/user.svg')}}" class="img-fluid" alt="basic"><span>Dashboard</span><i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a href="{{route('customer.order.index', auth()->user()->id)}}">Orders</a></li>
                            <li><a href="javaScript:void(0);" onclick="alert('Coming Soon!\nThank you for your interest..')">Favorites</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->
