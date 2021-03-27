<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{env('app_name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Default Description">
    <meta name="keywords" content="fashion, store, E-commerce">
    <meta name="robots" content="*">
    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('landing_page/images/favicon.ico')}}">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/font-awesome.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/revslider.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/owl.theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/jquery.bxslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/jquery.mobile-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/style.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('landing_page/stylesheet/responsive.css')}}" media="all">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600,800,400' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i,900" rel="stylesheet">
</head>
<body>
<div id="page">
    @include('landing_page.partials.header')
    <!--container-->
    <div class="content">
        @include('landing_page.partials.hero')
        <!--Category slider Start-->
        <div class="top-cate">
            <div class="featured-pro container">
                <div class="row">
                    <div class="slider-items-products">
                        <div id="top-categories" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col4 products-grid">
                                <div class="item">
                                        <div class="pro-img"><img src="{{asset('landing_page/products-images/p1.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                            <div class="pro-info">Coconut Oil</div>
                                        </div>
                                   </div>
                                <!-- Item -->
                                <div class="item">
                                        <div class="pro-img"><img src="{{asset('landing_page/products-images/p2.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                            <div class="pro-info">Ghee</div>
                                        </div>
                                   </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                        <div class="pro-img"><img src="{{asset('landing_page/products-images/p3.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                            <div class="pro-info">Kali Jeera Oil </div>
                                        </div>
                                   </div>
                                <!-- End Item -->
                                <div class="item">
                                        <div class="pro-img"><img src="{{asset('landing_page/products-images/p5.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                            <div class="pro-info">Honey</div>
                                        </div>
                                    </div>
                                <!-- Item -->
                                <div class="item">
                                        <div class="pro-img"><img src="{{asset('landing_page/products-images/p12.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                            <div class="pro-info">Mustard Oil</div>
                                        </div>
                               </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                        <div class="pro-img"><img src="{{asset('landing_page/products-images/p27.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                            <div class="pro-info">Jaggery/Gur</div>
                                        </div>
                                    </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                        <div class="pro-img"><img src="{{asset('landing_page/products-images/p8.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                            <div class="pro-info">Jafran</div>
                                        </div>
                                  </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                        <div class="pro-img"><img src="{{asset('landing_page/products-images/p11.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                            <div class="pro-info">Elachi</div>
                                        </div>
                                   </div>
                                <!-- End Item -->
                                <!-- Item -->

                                <!-- End Item -->
                                <!-- Item -->

                                <!-- End Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Category silder End-->
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  <img src="{{asset('landing_page/images/banner-img1.jpg')}}" alt="promotion-banner1">  </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  <img src="{{asset('landing_page/images/banner-img2.jpg')}}" alt="promotion-banner2">  </div>
                </div>
            </div>
        </div>
        <!-- best Pro Slider -->
        <section class=" wow bounceInUp animated">
            <div class="best-pro slider-items-products container">
                <div class="new_title">
                    <h2>Best Seller</h2>
                    <h4>So you get to know me better</h4>
                </div>
                <div id="best-seller" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a href="#" title="Fresh Organic Mustard Leaves " class="product-image">
                                            <img src="{{asset('landing_page/products-images/p27.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                        </a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title">
                                            <a href="#" title="Fresh Organic Mustard Leaves ">Fresh Organic Mustard Leaves </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:80%"></div>
                                                    </div>
                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a href="#" title="Fresh Organic Mustard Leaves " class="product-image">
                                            <img src="{{asset('landing_page/products-images/p17.jpg')}}" alt="Fresh Organic Mustard Leaves ">
                                        </a>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title">
                                            <a href="#" title="Fresh Organic Mustard Leaves ">Fresh Organic Mustard Leaves </a>
                                        </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:80%"></div>
                                                    </div>
                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html" title="Fresh Organic Mustard Leaves " class="product-image"><img src="products-images/p7.jpg" alt="Fresh Organic Mustard Leaves "></a>
                                        <div class="item-box-hover">
                                            <div class="box-inner">
                                                <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                                <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html" title="Fresh Organic Mustard Leaves ">Fresh Organic Mustard Leaves </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:80%"></div>
                                                    </div>
                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html" title="Fresh Organic Mustard Leaves " class="product-image"><img src="products-images/p26.jpg" alt="Fresh Organic Mustard Leaves "></a>
                                        <div class="sale-label sale-top-left">Sale</div>
                                        <div class="item-box-hover">
                                            <div class="box-inner">
                                                <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                                <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html" title="Fresh Organic Mustard Leaves ">Fresh Organic Mustard Leaves </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:80%"></div>
                                                    </div>
                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html" title="Fresh Organic Mustard Leaves " class="product-image"><img src="products-images/p5.jpg" alt="Fresh Organic Mustard Leaves "></a>
                                        <div class="new-label new-top-left">New</div>
                                        <div class="item-box-hover">
                                            <div class="box-inner">
                                                <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                                <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html" title="Fresh Organic Mustard Leaves ">Fresh Organic Mustard Leaves </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:80%"></div>
                                                    </div>
                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html" title="Fresh Organic Mustard Leaves " class="product-image"><img src="products-images/p6.jpg" alt="Fresh Organic Mustard Leaves "></a>
                                        <div class="new-label new-top-left">New</div>
                                        <div class="item-box-hover">
                                            <div class="box-inner">
                                                <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                                <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html" title="Fresh Organic Mustard Leaves ">Fresh Organic Mustard Leaves </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:80%"></div>
                                                    </div>
                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->
                    </div>
                </div>
            </div>
        </section>
        <div class="hot-section">
            <div class="container">
                <div class="row">
                    <div class="ad-info">
                        <h2>Get</h2>
                        <h3>Real Benefits</h3>
                        <h4>For Your Health.</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="testimonials-section slider-items-products">
                        <div  id="testimonials" class="offer-slider parallax parallax-2">
                            <div class="slider-items slider-width-col6">
                                <div class="item">

                                    <div class="testimonials">I can ensure that you will be satisfied by our products.</div>
                                    <div class="clients_author">Owner <span></span> </div>
                                </div>
                                <div class="item">

                                    <div class="testimonials">I got my products on given time and the products were very fresh. </div>
                                    <div class="clients_author"> Sani Ahamed <span>Happy Customer</span> </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Home Lastest Blog Block -->
        <!-- Logo Brand Block -->
    </div>



    <div class="container">
        <div class="row our-features-box">
            <ul>
                <li>
                    <div class="feature-box">
                        <div class="icon-truck"></div>
                        <div class="content">FAST SHIPPING</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-support"></div>
                        <div class="content">Have a question?<br>
                            +1 800 789 0000</div>
                    </div>
                <li>
                    <div class="feature-box">
                        <div class="icon-money"></div>
                        <div class="content">Cash On Delivery</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-return"></div>
                        <div class="content">100% Authentic</div>
                    </div>
                </li>
                <li class="last">
                 <br>
                    <br>
                    <br>
                    <div class="feature-box">
                      AG PLUS AGRO LIMITED
                    </div>
                    <br>
                    <br>
                    <br>



                </li>

             </ul>
        </div>
    </div>
    <!-- For version 1,2,3,4,6 -->

    <footer>
        <!-- BEGIN INFORMATIVE FOOTER -->
        <div class="footer-inner">
            <div class="newsletter-row">
                <div class="container">
                    <div class="row">

                        <!-- Footer Newsletter -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col1">
                            <div class="newsletter-wrap">
                                <h5>Newsletter</h5>
                                <h4>Get Upadtes!</h4>
                                <form action="#" method="post" id="newsletter-validate-detail1">
                                    <div id="container_form_news">
                                        <div id="container_form_news2">
                                            <input type="text" name="email" id="newsletter1" title="Sign up for our newsletter" class="input-text required-entry validate-email" placeholder="Enter your email address">
                                            <button type="submit" title="Subscribe" class="button subscribe"><span>Subscribe</span></button>
                                        </div>
                                        <!--container_form_news2-->
                                    </div>
                                    <!--container_form_news-->
                                </form>
                            </div>
                            <!--newsletter-wrap-->
                        </div>
                    </div>
                </div>
                <!--footer-column-last-->
            </div>
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-column">
                                <h4>Shopping Guide</h4>
                                <ul class="links">

                                    <li><a href="faq.html" title="FAQs">FAQs</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-column">
                                <h4>Terms</h4>
                                <ul class="links">
                                    <li><a href="login.html" title="t&r">Terms and conditions</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-column">
                                <h4>Information</h4>
                                <ul class="links">
                                    <li><a href="about_us.html" title="About Us">About Us</a></li>
                                    <li><a href="contact_us.html" title="Contact Us">Contact Us</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-column">
                                <h4>Contact Us</h4>
                                <div class="contacts-info">
                                    <address>
                                        <i class="add-icon"></i>ThemesGround, 789 Main rd,<br>
                                        Anytown, CA 12345 USA<br>
                                    </address>
                                    <div class="phone-footer"><i class="phone-icon"></i>+ 888 456-7890</div>
                                    <div class="email-footer"><i class="email-icon"></i><a href="mailto:abc@example.com">Qualis@themesground.com</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--container-->
        </div>
        <!--footer-inner-->

        <!--footer-middle-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="social">
                            <ul>
                                <li class="fb"><a href="#"></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12 coppyright"> © 2021 Ag PLus Agro Ltd. All Rights Reserved. </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="payment-accept"> <img src="images/payment-1.png" alt=""> <img src="images/payment-2.png" alt=""> <img src="images/payment-3.png" alt=""> <img src="images/payment-4.png" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-bottom-->
        <!-- BEGIN SIMPLE FOOTER -->
    </footer>
    <!-- End For version 1,2,3,4,6 -->

</div>
<!--page-->
<!-- Mobile Menu-->
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
        <li><a href="#">Pages</a>
            <ul>
                <li><a href="grid.html">Grid</a></li>
                <li> <a href="list.html">List</a></li>
                <li> <a href="product-detail.html">Product Detail</a></li>
                <li> <a href="shopping-cart.html">Shopping Cart</a></li>
                <li><a href="checkout.html">Checkout</a>
                    <ul>
                        <li><a href="checkout-method.html">Checkout Method</a></li>
                        <li><a href="checkout-billing-info.html">Checkout Billing Info</a></li>
                    </ul>
                </li>
                <li> <a href="wishlist.html">Wishlist</a></li>
                <li> <a href="dashboard.html">Dashboard</a></li>
                <li> <a href="multiple-addresses.html">Multiple Addresses</a></li>
                <li> <a href="about-us.html">About us</a></li>
                <li><a href="blog.html">Blog</a>
                    <ul>
                        <li><a href="blog-detail.html">Blog Detail</a></li>
                    </ul>
                </li>
                <li><a href="contact-us.html">Contact us</a></li>
                <li><a href="404error.html">404 Error Page</a></li>
            </ul>
        </li>
        <li><a href="grid.html">Fruits‎</a>
            <ul>
                <li><a href="grid.html">Tropical Fruits‎</a>
                    <ul>
                        <li> <a href="grid.html">Coconuts</a> </li>
                        <li> <a href="grid.html">Dragonfruits</a> </li>
                        <li> <a href="grid.html">Pomegranates</a> </li>
                        <li> <a href="grid.html">Passionfruit</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Citrus Fruits‎</a>
                    <ul>
                        <li> <a href="grid.html">Fresh Oranges</a> </li>
                        <li> <a href="grid.html">Grapefruits</a> </li>
                        <li> <a href="grid.html">Organic Limes</a> </li>
                        <li> <a href="grid.html">Yellow Lemons</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Stone Fruits</a>
                    <ul>
                        <li> <a href="grid.html">Sweet Apricots</a> </li>
                        <li> <a href="grid.html">Nectarines</a> </li>
                        <li> <a href="grid.html">Doughnut Peachs</a> </li>
                        <li> <a href="grid.html">Italian Fruits</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Large Fruits</a>
                    <ul>
                        <li> <a href="grid.html">Pineapples</a> </li>
                        <li> <a href="grid.html">Organic Papayas</a> </li>
                        <li> <a href="grid.html">Fresh Melons</a> </li>
                        <li> <a href="grid.html">Grapefruits</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Seasonal Fruits</a>
                    <ul>
                        <li> <a href="grid.html">Black Jamuns</a> </li>
                        <li> <a href="grid.html">Fresh Mangos</a> </li>
                        <li> <a href="grid.html">Organic Litchis</a> </li>
                        <li> <a href="grid.html">Longans</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Berries & Cherries</a>
                    <ul>
                        <li> <a href="grid.html">Strawberries</a> </li>
                        <li> <a href="grid.html">Raspberries</a> </li>
                        <li> <a href="grid.html">Blackberries</a> </li>
                        <li> <a href="grid.html">Cherries</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="grid.html">Salads‎</a>
            <ul>
                <li> <a href="grid.html">Veg Salads</a>
                    <ul>
                        <li> <a href="grid.html">Tomatoes</a> </li>
                        <li> <a href="grid.html">Cucumbers</a> </li>
                        <li> <a href="grid.html">Peppers & Capsicums</a> </li>
                        <li> <a href="grid.html">Avocados</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Dressings Salads</a>
                    <ul>
                        <li> <a href="grid.html">Hellmann's</a> </li>
                        <li> <a href="grid.html">Giuseppe Giusti</a> </li>
                        <li> <a href="grid.html">Unitednature</a> </li>
                        <li> <a href="grid.html">Walden Farms</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Fruits Salads</a>
                    <ul>
                        <li> <a href="grid.html">Pineapples</a> </li>
                        <li> <a href="grid.html">Red Apple</a> </li>
                        <li> <a href="grid.html">Strawberries</a> </li>
                        <li> <a href="grid.html">Row Mangos</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Bagged Salads</a>
                    <ul>
                        <li> <a href="grid.html">Italian Baby Spinach</a> </li>
                        <li> <a href="grid.html">Australia Green Kale</a> </li>
                        <li> <a href="grid.html">Sustenir Fresh Toscano</a> </li>
                        <li> <a href="grid.html">Oro Rocket Salad</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Lettuce Salads</a>
                    <ul>
                        <li> <a href="grid.html">Butterhead</a> </li>
                        <li> <a href="grid.html">Red Coral</a> </li>
                        <li> <a href="grid.html">Rolla Rosa Lettuce</a> </li>
                        <li> <a href="grid.html">Summercrisp</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Bread Salads</a>
                    <ul>
                        <li> <a href="grid.html">Green Goddess</a> </li>
                        <li> <a href="grid.html">Grilled Broccoli</a> </li>
                        <li> <a href="grid.html">Panzanella</a> </li>
                        <li> <a href="grid.html">Green Tomato</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="grid.html">Vegetables</a>
            <ul>
                <li> <a href="grid.html">Leafy Vegetables</a>
                    <ul>
                        <li> <a href="grid.html">Sprouts</a> </li>
                        <li> <a href="grid.html">Lettuce</a> </li>
                        <li> <a href="grid.html">Banana Leaves</a> </li>
                        <li> <a href="grid.html">Microgreens</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Mushrooms</a>
                    <ul>
                        <li> <a href="grid.html">Shimeji Mushroom</a> </li>
                        <li> <a href="grid.html">Portobello Mushroom</a> </li>
                        <li> <a href="grid.html">Oyster Mushroom</a> </li>
                        <li> <a href="grid.html">Shiitake Mushroom</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Baby Vegetables</a>
                    <ul>
                        <li> <a href="grid.html">Cabbage</a> </li>
                        <li> <a href="grid.html">Capsicums</a> </li>
                        <li> <a href="grid.html">Pak Choi</a> </li>
                        <li> <a href="grid.html">Spinach</a> </li>
                    </ul>
                </li>

                <li> <a href="grid.html">Salad Vegetables</a>
                    <ul>
                        <li> <a href="grid.html">Cucumbers</a> </li>
                        <li> <a href="grid.html">Avocados</a> </li>
                        <li> <a href="grid.html">Mustard Leaves</a> </li>
                        <li> <a href="grid.html">Tomatoes</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Asian Vegetables</a>
                    <ul>
                        <li> <a href="grid.html">Spring Onion</a> </li>
                        <li> <a href="grid.html">Lady Fingers</a> </li>
                        <li> <a href="grid.html">Watercress</a> </li>
                        <li> <a href="grid.html">Curry Leaves</a> </li>
                    </ul>
                </li>
                <li> <a href="grid.html">Beans Vegetables</a>
                    <ul>
                        <li> <a href="grid.html">French Beans</a> </li>
                        <li> <a href="grid.html">Sweet Corn</a> </li>
                        <li> <a href="grid.html">Fine Green Beans</a> </li>
                        <li> <a href="grid.html">Petai Beans</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="grid.html">Juices‎</a></li>
        <li><a href="grid.html">Meats‎</a></li>
        <li><a href="#">Custom‎</a></li>
        <li><a href="contact-us.html">Contact Us</a></li>
    </ul>
    <div class="top-links">
        <ul class="links">
            <li><a title="My Account" href="login.html">My Account</a> </li>
            <li><a title="Wishlist" href="wishlist.html">Wishlist</a> </li>
            <li><a title="Checkout" href="checkout.html">Checkout</a> </li>
            <li><a title="Blog" href="blog.html">Blog</a> </li>
            <li class="last"><a title="Login" href="login.html">Login</a> </li>
        </ul>
    </div>
</div>



<!-- JavaScript -->
<script src="{{asset('landing_page/js/jquery.min.js')}}"></script>
<script src="{{asset('landing_page/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landing_page/js/parallax.js')}}"></script>
<script src="{{asset('landing_page/js/revslider.js')}}"></script>
<script src="{{asset('landing_page/js/common.js')}}"></script>
<script src="{{asset('landing_page/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('landing_page/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('landing_page/js/jquery.mobile-menu.min.js')}}"></script>
<script src="{{asset('landing_page/js/countdown.js')}}"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('#thm-rev-slider').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 0,
            startheight:750,

            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,

            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'on',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'spinner0',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'on',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'on',
            forceFullWidth: 'off',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>
<script>
    function HideMe()
    {
        jQuery('.popup1').hide();
        jQuery('#fade').hide();
    }
</script>
<!-- Hot Deals Timer 1-->
<script>
    var dthen1 = new Date("12/25/17 11:59:00 PM");
    start = "08/04/15 03:02:11 AM";
    start_date = Date.parse(start);
    var dnow1 = new Date(start_date);
    if (CountStepper > 0)
        ddiff = new Date((dnow1) - (dthen1));
    else
        ddiff = new Date((dthen1) - (dnow1));
    gsecs1 = Math.floor(ddiff.valueOf() / 1000);

    var iid1 = "countbox_1";
    CountBack_slider(gsecs1, "countbox_1", 1);
</script>
</body>

<!-- Mirrored from themesground.com/qmart-demo/V1/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 15:33:58 GMT -->
</html>
