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
                            <a class="facebook" href="http://www.facebook.com/" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                            <a class="twitter" href="http://www.twitter.com/" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
                            <a class="instagram" href="http://www.instagram.com/" data-tooltip="Instagram"><i class="fa fa-instagram"></i></a>
                            <a class="linkedin" href="http://www.linkedin.com/" data-tooltip="Linkedin"><i class="fa fa-linkedin"></i></a>
                            <a class="rss" href="http://www.rss.com/" data-tooltip="RSS"><i class="fa fa-rss"></i></a>
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
                                    <p>Address: <span>123 New Design Str, Melbourne, Australia</span></p>
                                </div>
                            </div>

                            <!--=======  End of single contact  =======-->
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_mobile"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Phone: <span>1-888-123-456-89</span></p>
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

<div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-xs-12">
                        <!-- product quickview image gallery -->
                        <div class="product-image-slider">
                            <!--Modal Tab Content Start-->
                            <div class="tab-content product-large-image-list" id="myTabContent">
                                <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img src="assets/images/products/product01.jpg" class="img-fluid" alt="">
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                                <div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img src="assets/images/products/product02.jpg" class="img-fluid" alt="">
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                                <div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img src="assets/images/products/product03.jpg" class="img-fluid" alt="">
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                                <div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img src="assets/images/products/product04.jpg" class="img-fluid" alt="">
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                            </div>
                            <!--Modal Content End-->
                            <!--Modal Tab Menu Start-->
                            <div class="product-small-image-list">
                                <div class="nav small-image-slider" role="tablist">
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="assets/images/products/product01.jpg"
                                                                                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2"><img src="assets/images/products/product02.jpg"
                                                                                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3"><img src="assets/images/products/product03.jpg"
                                                                                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4"><img src="assets/images/products/product04.jpg"
                                                                                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!--Modal Tab Menu End-->
                        </div>
                        <!-- end of product quickview image gallery -->
                    </div>
                    <div class="col-lg-7 col-md-6 col-xs-12">
                        <!-- product quick view description -->
                        <div class="product-feature-details">
                            <h2 class="product-title mb-15">Kaoreet lobortis sagittis laoreet</h2>

                            <h2 class="product-price mb-15">
                                <span class="main-price">$12.90</span>
                                <span class="discounted-price"> $10.00</span>
                            </h2>

                            <p class="product-description mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p>


                            <div class="cart-buttons mb-20">
                                <div class="pro-qty mr-10">
                                    <input type="text" value="1">
                                </div>
                                <div class="add-to-cart-btn">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>


                            <div class="social-share-buttons">
                                <h3>share this product</h3>
                                <ul>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of product quick view description -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--=====  End of Quick view modal  ======-->

<!-- scroll to top  -->
<a href="#" class="scroll-top"></a>
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
