<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ==============================================
    Basic Page Needs
    =============================================== -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <title>{{config('app.name')}}</title>
    <meta name="description" content="Creative, instrument, made in bangladesh, blues den">
    <!-- ==============================================
    Favicons
    =============================================== -->
    <link rel="shortcut icon" href="{{asset('landing_page/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('landing_page/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('landing_page/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('landing_page/images/apple-touch-icon-114x114.png')}}">
    <!-- ==============================================
    Vendor Stylesheet
    =============================================== -->
    <link rel="stylesheet" href="{{asset('landing_page/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing_page/css/vendor/slider.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing_page/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('landing_page/css/vendor/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing_page/css/vendor/animation.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing_page/css/vendor/gallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing_page/css/vendor/cookie-notice.min.css')}}">
    <!-- ==============================================
    Custom Stylesheet
    =============================================== -->
    <link rel="stylesheet" href="{{asset('landing_page/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('landing_page/css/theme-orange.css')}}">
    <!-- ==============================================
    Theme Settings
    =============================================== -->
    <style>
        :root {
            --header-bg-color: #040402;
            --nav-item-color: #f5f5f5;
            --top-nav-item-color: #f5f5f5;
            --hero-bg-color: #040402;

            --section-1-bg-color: #111111;
            --section-2-bg-color: #191919;
            --section-3-bg-color: #040402;
            --section-4-bg-color: #111111;
            --section-5-bg-color: #191919;
            --section-6-bg-color: #040402;
            --section-7-bg-color: #111111;

            --footer-bg-color: #191919;
        }
    </style>
</head>

<body class="home theme-mode-dark">
<!-- Header -->
    @include('landing_page.inc.header')


@include('landing_page.inc.sliders')
@include('landing_page.inc.about')
@include('landing_page.inc.product_panel')
@include('landing_page.inc.booking')
@include('landing_page.inc.community')
@include('landing_page.inc.custom')
@include('landing_page.inc.services')
<!-- Footer -->
<footer class="odd">
    <!-- Footer [links] -->
    @include('landing_page.inc.footer.links')

    <!-- Copyright -->
    <section id="copyright" class="p-3 copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 p-3 text-center text-lg-right">
                    <p>© 2020 Blues Den is Proudly Powered by <a href="https://maroonlabbd.com" target="_blank">maroon.lab</a>.</p>
                </div>
            </div>
        </div>
    </section>

</footer>

<!-- #region Global ============================ -->

<!-- Modal [search] -->
<div id="search" class="p-0 modal fade" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                Search <i class="icon-close"></i>
            </div>
            <div class="modal-body">
                <form class="row" action="{{route('search.index')}}" method="get">
                    <div class="col-12 p-0 align-self-center">
                        <div class="row">
                            <div class="col-12 p-0 pb-3">
                                <h2>What are you looking for?</h2>
                                <p>Search for Products.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group">
                                <input type="text" name="query" class="form-control" placeholder="Enter Keywords">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group align-self-center">
                                <button class="btn primary-button" type="submit"><i class="icon-magnifier"></i>SEARCH</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal [sign] -->
<div id="sign" class="p-0 modal fade" role="dialog" aria-labelledby="sign" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                Sign In Form <i class="icon-close"></i>
            </div>
            <div class="modal-body">
                <form action="#" class="row">
                    <div class="col-12 p-0 align-self-center">
                        <div class="row">
                            <div class="col-12 p-0 pb-3">
                                <h2>Sign In</h2>
                                <p>Don't have an account? <a href="#" class="primary-color" data-toggle="modal" data-target="#register">Register now</a>.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group">
                                <input type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12 p-0 input-group">
                                <input type="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group align-self-center">
                                <button class="btn primary-button"><i class="icon-login"></i>LOGIN</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal [register] -->
<div id="register" class="p-0 modal fade" role="dialog" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                Register Form <i class="icon-close"></i>
            </div>
            <div class="modal-body">
                <form action="#" class="row">
                    <div class="col-12 p-0 align-self-center">
                        <div class="row">
                            <div class="col-12 p-0 pb-3">
                                <h2>Register</h2>
                                <p>Have an account? <a href="#" class="primary-color" data-toggle="modal" data-target="#sign">Sign In</a>.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group">
                                <input type="text" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="col-12 p-0 input-group">
                                <input type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12 p-0 input-group">
                                <input type="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col-12 p-0 input-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group align-self-center">
                                <button class="btn primary-button"><i class="icon-rocket"></i>REGISTER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal [responsive menu] -->
<div id="menu" class="p-0 modal fade" role="dialog" aria-labelledby="menu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                Menu <i class="icon-close"></i>
            </div>
            <div class="menu modal-body">
                <div class="row w-100">
                    <div class="items p-0 col-12 text-center">
                        <!-- Append [navbar] -->
                    </div>
                    <div class="contacts p-0 col-12 text-center">
                        <!-- Append [navbar] -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll [to top] -->
<div id="scroll-to-top" class="scroll-to-top">
    <a href="#header" class="smooth-anchor">
        <i class="icon-arrow-up"></i>
    </a>
</div>

<!-- ==============================================
Vendor Scripts
=============================================== -->
<script src="{{asset('landing_page/js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/jquery.easing.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/jquery.inview.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/ponyfill.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/slider.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/animation.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/progress-radial.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/bricklayer.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/gallery.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/shuffle.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/cookie-notice.min.js')}}"></script>
<script src="{{asset('landing_page/js/vendor/particles.min.js')}}"></script>
<script src="{{asset('landing_page/js/main.js')}}"></script>

<!-- #endregion Global ========================= -->

</body>

<!-- Mirrored from leverage.codings.dev/demo-1-one-page by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Oct 2020 08:16:49 GMT -->
</html>
