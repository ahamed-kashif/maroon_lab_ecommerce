<header id="header">
    <!-- Navbar -->
    <nav data-aos="zoom-out" data-aos-delay="800" class="navbar navbar-expand">
        <div class="container header">
            <!-- Navbar Brand-->
            <a class="navbar-brand" href="/">
                <!--
                    Custom Logo-->
                    <img src="{{asset('images/logo.png')}}" alt="Leverage">

            </a>
            <!-- Nav holder -->
            <div class="ml-auto"></div>
            <!-- Navbar Items -->
            <ul class="navbar-nav items">
                <li class="nav-item dropdown">
                    <a href="#header" class="nav-link smooth-anchor">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#booking" class="nav-link smooth-anchor">Studios</a>
                </li>
                <li class="nav-item">
                    <a href="#services" class="nav-link smooth-anchor">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link smooth-anchor">About</a>
                </li>
            </ul>

            <!-- Navbar Icons -->
            <ul class="navbar-nav icons">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#search">
                        <i class="icon-magnifier"></i>
                    </a>
                </li>
                <li class="nav-item social">
                    <a href="https://www.facebook.com/blues.den.music" class="nav-link"><i class="icon-social-facebook"></i></a>
                </li>
                <li class="nav-item social">
                    <a href="https://www.instagram.com/bluesden.official?fbclid=IwAR3CJfFDitJYUnFsmHAZjOpiw3SdeVm9elx4nUVVEGa8N5GRigrF__e0yTo" class="nav-link"><i class="icon-social-instagram"></i></a>
                </li>
            </ul>

            <!-- Navbar Toggle -->
            <ul class="navbar-nav toggle">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                        <i class="icon-menu m-0"></i>
                    </a>
                </li>
            </ul>

            <!-- Navbar Action -->
            <ul class="navbar-nav action">
                <li class="nav-item ml-3">
                    <a href="{{route('store.index')}}" class="btn ml-lg-auto dark-button smooth-anchor"><i class="icon-basket"></i>SHOP NOW</a>
                </li>
            </ul>
        </div>
    </nav>

</header>
