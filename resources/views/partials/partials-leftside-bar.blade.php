<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="/" class="logo logo-large"><img src="{{asset('images/logo.svg')}}" class="img-fluid" alt="logo"></a>
            <a href="/" class="logo logo-small"><img src="{{asset('images/small_logo.svg')}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="javaScript:void(0);">
                        <img src="{{asset('images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>Dashboard</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="#">Store</a></li>
                        <li>
                            <a href="#">eCommerce</a>
                            <ul class="vertical-submenu">
                                <li><a href="{{route('product.create')}}">Add Product</a></li>
                                <li><a href="{{route('product.index')}}">Products</a></li>
                                <li><a href="{{route('category.index')}}">Categories</a></li>
                                <li><a href="{{route('subcategory.index')}}">Sub-Categories</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Orders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0);">
                        <i class="fa fa-shopping-bag"></i><span>Shop</span><i class="feather icon-chevron-right pull-right"></i>
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
                        <li><a href="#">eCommerce</a></li>
                        <li><a href="#">Hospital</a></li>
                        <li><a href="#">Crypto</a></li>
                        <li><a href="#">School</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0);">
                        <img src="{{asset('images/svg-icon/basic.svg')}}" class="img-fluid" alt="basic"><span>Basic UI</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="#">Alerts</a></li>
                        <li><a href="#">Badges</a></li>
                        <li><a href="#">Buttons</a></li>
                        <li><a href="#">Cards</a></li>
                        <li><a href="#">Carousel</a></li>
                        <li><a href="#">Collapse</a></li>
                        <li><a href="#">Dropdowns</a></li>
                        <li><a href="#">Embeds</a></li>
                        <li><a href="#">Grids</a></li>
                        <li><a href="#">Images</a></li>
                        <li><a href="#">Media</a></li>
                        <li><a href="#">Modals</a></li>
                        <li><a href="#">Paginations</a></li>
                        <li><a href="#">Popovers</a></li>
                        <li><a href="#">Progress Bars</a></li>
                        <li><a href="#">Spinners</a></li>
                        <li><a href="#">Tabs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0);">
                        <img src="{{asset('images/svg-icon/advanced.svg')}}" class="img-fluid" alt="advanced"><span>Advanced UI</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="#">Image Crop</a></li>
                        <li><a href="#">jQuery Confirm</a></li>
                        <li><a href="#">Nestable</a></li>
                        <li><a href="#">Pnotify</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0);">
                        <img src="{{asset('images/svg-icon/apps.svg')}}" class="img-fluid" alt="apps"><span>Apps</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="apps-calender.html">Calender</a></li>
                        <li><a href="apps-chat.html">Chat</a></li>
                        <li>
                            <a href="javaScript:void(0);">Email<i class="feather icon-chevron-right pull-right"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="#">Inbox</a></li>
                                <li><a href="#">Open</a></li>
                                <li><a href="#">Compose</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Kanban Board</a></li>
                        <li><a href="#">Onboarding Screens</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0);">
                        <img src="{{asset('images/svg-icon/form_elements.svg')}}" class="img-fluid" alt="form_elements"><span>Forms</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="#">Basic Elements</a></li>
                        <li><a href="#">Groups</a></li>

                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->
