<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <!-- CSS
    ============================================ -->
    <!-- Bootstrap CSS -->
    <link href="{{asset('landing_page/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/cart.css')}}" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link href="{{asset('landing_page/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Elegent CSS -->
    <link href="{{asset('landing_page/css/elegent.min.css')}}" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{asset('landing_page/css/plugins.css')}}" rel="stylesheet">

    <!-- Helper CSS -->
    <link href="{{asset('landing_page/css/helper.css')}}" rel="stylesheet">

    <!-- Nav CSS -->
    <link href="{{asset('landing_page/css/style.css')}}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{asset('landing_page/css/main.css')}}" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="{{asset('landing_page/js/vendor/modernizr-2.8.3.min.js')}}"></script>

</head>

<body>
<!--=============================================
=            Header         =
=============================================-->
<!-- START NAVBAR -->
@include('landing_page.partials.navbar')
<!-- END NAVBAR -->
<!--=====  End of Header  ======-->

<!--=============================================
=            Hero slider with category         =
=============================================-->
<div class="hero-slider-with-category-container mt-35 mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--=======  slider left category  =======-->
                @include('landing_page.partials.slider-left-category')
                <!--=======  End of slider left category  =======-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--=======  slider container  =======-->
                @include('landing_page.partials.slider-container')
                <!--=======  End of slider container  =======-->
            </div>
        </div>
    </div>
</div>
<!--=====  End of Hero slider with category   ======-->
<!--=============================================
=            category slider         =
=============================================-->

<div class="slider category-slider mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  category slider section title  =======-->
                <div class="section-title">
                    <h3>top categories</h3>
                </div>
                <!--=======  End of category slider section title  =======-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--=======  category container  =======-->
                @include('landing_page.partials.top-category')
                <!--=======  End of category container  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of category slider  ======-->

<!--=============================================
=            Double banner          =
=============================================-->
@include('landing_page.partials.double-banner')
<!--=====  End of Double banner   ======-->

<!--=============================================
=            Tab slider         =
=============================================-->
@include('landing_page.partials.product-tab-slider')
<!--=====  End of Tab slider  ======-->
<!--=============================================
=            Footer         =
=============================================-->

<footer>

    <!--=======  social contact section  =======-->

    <div class="social-contact-section pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 order-2 order-md-2 order-sm-2 order-lg-1">
                    <!--=======  social media links  =======-->

                    <div class="social-media-section">
                        <h2>Follow us</h2>
                        <div class="social-links">
                            <a class="facebook" href="https://www.facebook.com/tidyfishbangladesh" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>

                    <!--=======  End of social media links  =======-->

                </div>
                <div class="col-lg-8 col-md-12 order-1 order-md-1 order-sm-1 order-lg-2  mb-sm-50 mb-xs-50">
                    <!--=======  contact summery  =======-->

                    <div class="contact-summery">
                        <h2>Contact us</h2>

                        <!--=======  contact segments  =======-->

                        <div class="contact-segments d-flex justify-content-between flex-wrap flex-lg-nowrap">
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_pin_alt"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Address: <span>25/5C aziz moholla Mohammadpur dhaka 1207 1207 Dhaka, Dhaka Division, Bangladesh</span></p>
                                </div>
                            </div>

                            <!--=======  End of single contact  =======-->
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_mobile"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Phone: <span>01408-494549</span></p>
                                </div>
                            </div>

                            <!--=======  End of single contact  =======-->
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex">
                                <div class="icon">
                                    <span class="icon_mail_alt"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Email: <span>service@tidyfish.co</span></p>
                                </div>
                            </div>
                            <!--=======  End of single contact  =======-->
                        </div>
                        <!--=======  End of contact segments  =======-->
                    </div>
                    <!--=======  End of contact summery  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of social contact section  =======-->


    <!--=======  copyright section  =======-->

    <div class="copyright-section pt-35 pb-35">
        <div class="container">
            <div class="row align-items-md-center align-items-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center text-md-left">
                    <!--=======  copyright text	  =======-->

                    <div class="copyright-segment">
                        <p>
                            <a href="{{route('page.show','privacy')}}">Privacy Policy</a>
                            <span class="separator">|</span>
                            <a href="{{route('page.show','t&r')}}">Term and conditions</a>
                        </p>
                        <p class="copyright-text">&copy; 2020 <a href="/">Tidy Fish</a>. All Rights Reserved</p>
                    </div>
                    <!--=======  End of copyright text	  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of copyright section  =======-->
</footer>

<!--=====  End of Footer  ======-->


<!--=============================================
=            Quick view modal         =
=============================================-->

<!--=====  End of Quick view modal  ======-->

<!-- scroll to top  -->
@include('partials.floating-cart')
<!-- end of scroll to top -->
<!-- JS
============================================ -->
<!-- jQuery JS -->
<script src="{{asset('landing_page/js/vendor/jquery.min.js')}}"></script>

<!-- Popper JS -->
<script src="{{asset('landing_page/js/popper.min.js')}}"></script>

<!-- Bootstrap JS -->
<script src="{{asset('landing_page/js/bootstrap.min.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('landing_page/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('landing_page/js/main.js')}}"></script>

</body>

</html>
