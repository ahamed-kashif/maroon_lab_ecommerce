<div class="topbar-mobile">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="mobile-logobar">
                <a href="/" class="mobile-logo"><img src="{{asset('images/logo.png')}}" class="img-fluid" alt="logo"></a>
            </div>

            <div class="mobile-togglebar">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <div class="topbar-toggle-icon mt-2">
                            <ul class="list-inline mb-0">
                                @guest
                                    <li class="list-inline-item">
                                        <a class="btn-primary-rgba" title="Login" href="{{ route('login') }}">
                                            <i class="mdi mdi-login-variant font-20"></i>
                                        </a>
                                    </li>
                                @else
                                    {{--                    <li class="list-inline-item">--}}
                                    {{--                        <div class="settingbar">--}}
                                    {{--                            <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">--}}
                                    {{--                                <img src="{{asset('images/svg-icon/settings.svg')}}" class="img-fluid" alt="settings">--}}
                                    {{--                            </a>--}}
                                    {{--                        </div>--}}
                                    {{--                    </li>--}}
                                    {{--                    <li class="list-inline-item">--}}
                                    {{--                        @include('partials.partials-notifications')--}}
                                    {{--                    </li>--}}
                                    {{--                    <li class="list-inline-item">--}}
                                    {{--                        @include('partials.partials-language')--}}
                                    {{--                    </li>--}}
                                    <li class="list-inline-item">
                                        @include('partials.partials-profile-bar')
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void(0);">
                                <img src="{{asset('images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                <img src="{{asset('images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="searchbar mt-1 mb-0">
                <form action="{{route('search.index')}}" method="get">
                    <div class="input-group">
                        <input type="text" id="search" name="query" class="form-control search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="search-list"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Start Topbar -->
<div class="topbar m-b-45">
    <!-- Start row -->
    <div class="row align-items-center">
        <!-- Start col -->
        <div class="col-md-12 align-self-center">
            <div class="togglebar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void(0);">
                                <img src="{{asset('images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                <img src="{{asset('images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                            </a>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="searchbar">
                            <form action="{{route('search.index')}}" method="get">
                                <div class="input-group">
                                    <input type="text" id="search" name="query" class="form-control search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2"><img src="{{asset('images/svg-icon/search.svg')}}" class="img-fluid" alt="search"></button>
                                    </div>
                                </div>
                                <div class="search-list"></div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="infobar mt-0">
                <ul class="list-inline">
                @guest
                    <li class="list-inline-item">
                        <a class="btn-sm btn-primary-rgba p-1 font-23" title="Login" href="{{ route('login') }}">
                            <i class="mdi mdi-login-variant"></i>
                        </a>
                    </li>
                @else
{{--                    <li class="list-inline-item">--}}
{{--                        <div class="settingbar">--}}
{{--                            <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">--}}
{{--                                <img src="{{asset('images/svg-icon/settings.svg')}}" class="img-fluid" alt="settings">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        @include('partials.partials-notifications')--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        @include('partials.partials-language')--}}
{{--                    </li>--}}
                    <li class="list-inline-item">
                        @include('partials.partials-profile-bar')
                    </li>
                @endguest
                </ul>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>

