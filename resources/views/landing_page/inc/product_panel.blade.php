<!-- Products -->
<section id="testimonials" class="section-4 carousel mt-0">
    <div class="overflow-holder">
        <div class="container">
            <div class="row text-center intro">
                <div class="col-12">
                    <h2 class="text-light">STORE</h2>
                    <p class="text-max-800">Authentic Products, Quality Certified. Shipped directly from renown brands & suppliers to your doorsteps. Consult our experts before purchase. Get the best of the best. Order now!
                    </p>
                </div>
            </div>
            <div class="swiper-container mid-slider items">
                <div class="swiper-wrapper">
                    @if($featuredProducts->count() >= 1)
                        @foreach($featuredProducts as $product)
                        <div class="swiper-slide slide-center text-center item">
                            <div class="row card">
                                <div class="col-12">
                                    <a href="{{route('store.product.show',$product->id)}}">
                                        @if($product->images->count() > 0)
                                            <img src="{{asset($product->images->first()->url)}}" alt="{{$product->title}}">
                                        @else
                                            <img src="{{asset('images/ecommerce/no_image.png')}}" alt="{{$product->title}}">
                                        @endif
                                    </a>
                                    <h6>{{$product->title}}</h6>
    {{--                                <p>{{$product->short_description}}</p>--}}
                                    <ul class="navbar-nav social share-list ml-auto">
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" onclick="alert('Rating system is Underdevelopment! Thank you for your interest...!')" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" onclick="alert('Rating system is Underdevelopment! Thank you for your interest...!')" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" onclick="alert('Rating system is Underdevelopment! Thank you for your interest...!')" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" onclick="alert('Rating system is Underdevelopment! Thank you for your interest...!')" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" onclick="alert('Rating system is Underdevelopment! Thank you for your interest...!')" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="swiper-slide slide-center text-center item">
                        <div class="row card">
                            <div class="col-12">
                                <img src="assets/images/team-2.jpg" alt="Mary Evans" class="person">
                                <h4>Mary Evans</h4>
                                <p>This company created an exclusive form. Fantastic.</p>
                                <ul class="navbar-nav social share-list ml-auto">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
{{--                    <div class="swiper-slide slide-center text-center item">--}}
{{--                        <div class="row card">--}}
{{--                            <div class="col-12">--}}
{{--                                <img src="assets/images/team-3.jpg" alt="Sarah Lopez" class="person">--}}
{{--                                <h4>Sarah Lopez</h4>--}}
{{--                                <p>I'm loving the partnership. The support deserves 5 stars.</p>--}}
{{--                                <ul class="navbar-nav social share-list ml-auto">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide slide-center text-center item">--}}
{{--                        <div class="row card">--}}
{{--                            <div class="col-12">--}}
{{--                                <img src="assets/images/team-4.jpg" alt="Joseph Hills" class="person">--}}
{{--                                <h4>Joseph Hills</h4>--}}
{{--                                <p>My app was perfect. I will request more services soon.</p>--}}
{{--                                <ul class="navbar-nav social share-list ml-auto">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide slide-center text-center item">--}}
{{--                        <div class="row card">--}}
{{--                            <div class="col-12">--}}
{{--                                <img src="assets/images/team-5.jpg" alt="Karen Usman" class="person">--}}
{{--                                <h4>Karen Usman</h4>--}}
{{--                                <p>I had small problems with the payment, but it was resolved.</p>--}}
{{--                                <ul class="navbar-nav social share-list ml-auto">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a href="#" class="nav-link"><i class="icon-star ml-2 mr-2"></i></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
