<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- api_token -->
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{asset('landing_page/images/favicon.ico')}}">

    <!-- app name -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('/css/cart.css')}}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Switchery css -->
    <link href="{{(asset('plugins/switchery/switchery.min.css'))}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css" rel="stylesheet')}}" type="text/css">
    <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/vendor/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
{{--    extra css--}}
    @yield('css')
</head>
<body class="vertical-layout">
    <div id="app">
        @include('partials.partials-settings-sidebar')
        <div id="containerbar">
            <!-- Start Leftbar -->
            @include('partials.partials-leftside-bar')
            <!-- End Leftbar -->
            <!-- Start Rightbar -->
            <div class="rightbar m-b-40">
                <!-- Start Topbar Mobile -->
            @include('partials.partials-topbar')
            <!-- End Topbar -->
            <!-- Start Breadcrumbbar -->
{{--            @include('partials.partials-breadcrumb')--}}
            <!-- End Breadcrumbbar -->
                <!-- Start Contentbar -->
                <div class="contentbar my-lg-2 my-md-2 my-xl-2 my-sm-2">
                    <!-- Start row -->
                    <div class="row my-5">
                        <!-- Start col -->
                        <div class="col-md-12 col-lg-12 col-xl-12">
                           <div class="mt-4">
                               @yield('content')
                           </div>

                        </div>
                        <!-- End col -->
                    </div>
                    <!-- End row -->
                </div>
                <!-- End Contentbar -->
                <!-- Start Footerbar -->
            @include('partials.partials-footer-bar')
            <!-- End Footerbar -->
            </div>
            <!-- End Rightbar -->
        </div>
    </div>
    @if(session()->has('cart'))
        @include('partials.floating-cart')
    @endif
    <!-- Start js -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/modernizr.min.js')}}"></script>
    <script src="{{asset('js/detect.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/vertical-menu.js')}}"></script>

    {{--    Extra js--}}
    @yield('js')
    <!-- Switchery js -->
    <script src="{{asset('plugins/switchery/switchery.min.js')}}"></script>
    <script src="{{asset('js/custom/custom-switchery.js')}}"></script>
    <!-- Core js -->
    <script src="{{asset('js/core.js')}}"></script>
    <!-- End js -->
    <script>
        $(document).ready(function(){
            $('.search').keyup(function(){
                let query = $(this).val();
                if(query != '')
                {
                    $.ajax({
                        url:"{{ route('search.fetch') }}",
                        method:"get",
                        data:{query:query},
                        success:function(data){
                            //console.log(data);
                            let searchBox = $('.search-list');
                            searchBox.fadeIn();
                            let list = $('<ul></ul>');
                            list.addClass('list-group')
                                .addClass('mt-7')
                                .attr('style', 'display: block; position: absolute; z-index: 1; background-color:white;')
                            for(let i=0; i<data.length;i++){
                                let item = $('<li></li>');
                                item.addClass('list-group-item')
                                    .addClass('search-item')
                                    .css('cursor','pointer')
                                item.text(data[i])
                                item.appendTo(list)
                            }
                            searchBox.html(list);
                        }
                    });
                }
            });
            $('.search').focusout(function(){
               $('.search-list').fadeOut();
            });

            $(document).on('click', '.search-item', function(){
                //console.log($(this).text());
                $('#search').val($(this).text());
                $('.search-list').html("")
                                .fadeOut();
            });

        });
    </script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f9f53eee6f364b0"></script>
</body>
</html>
