<?php


$categories = \Illuminate\Support\Facades\Cache::remember('categories', \App\Classes\Helper::cacheTime(), function () {
    return \App\Models\Category::with('childrenRecursive')->orderBy("sort_order")->whereNull('category_id')->get();
});

?>

<br>
<!-- Footer Section Start -->
<footer class="section-t-space">
    <div class="container-fluid-lg">
        {{--        <div class="service-section">--}}
        {{--            <div class="row g-3">--}}
        {{--                <div class="col-12">--}}
        {{--                    <div class="service-contain">--}}
        {{--                        <div class="service-box">--}}
        {{--                            <div class="service-image">--}}
        {{--                                <img src="../assets/svg/product.svg" class="blur-up lazyload" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="service-detail">--}}
        {{--                                <h5>Every Fresh Products</h5>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="service-box">--}}
        {{--                            <div class="service-image">--}}
        {{--                                <img src="../assets/svg/delivery.svg" class="blur-up lazyload" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="service-detail">--}}
        {{--                                <h5>Free Delivery For Order Over $50</h5>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="service-box">--}}
        {{--                            <div class="service-image">--}}
        {{--                                <img src="../assets/svg/discount.svg" class="blur-up lazyload" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="service-detail">--}}
        {{--                                <h5>Daily Mega Discounts</h5>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                        <div class="service-box">--}}
        {{--                            <div class="service-image">--}}
        {{--                                <img src="../assets/svg/market.svg" class="blur-up lazyload" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="service-detail">--}}
        {{--                                <h5>Best Price On The Market</h5>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}


        <div class="main-footer section-b-space section-t-space">
            <div class="row g-md-4 g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-logo">
                        <div class="theme-logo">
                            <a href="{{url("/")}}">
                                <img src="../assets/images/logo/logo.svg" class="blur-up lazyload" alt="">
                            </a>
                        </div>

                        <div class="footer-logo-contain">
                            <p>Harir - Turkiyadan keltirilgan nafis va sifatli matolar jamlanmasi. <br>
                                - pardalar va aksessuarlar <br>
                                - dizayner xizmati <br>
                                - yetkazish va o'rnatish xizmati</p>

                            <ul class="address">
                                <li>
                                    <i data-feather="home"></i>
                                    <a target="_blank"
                                       href="{{\App\Classes\Helper::info("yandex1")}}">{{\App\Classes\Helper::info("address1")}}</a>

                                    {{--                                    <a href="javascript:void(0)">Abu saxiy savdo markazi Q-11 L-23 do'kon</a>--}}
                                </li>
                                {{--                                <li>--}}
                                {{--                                    <i data-feather="mail"></i>--}}
                                {{--                                    <a href="javascript:void(0)">harir.brend@gmail.com</a>--}}
                                {{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Kategoriyalar</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            @foreach($categories as $category)

                                <li>
                                    <a href="{{$category->url()}}" class="text-content">{{$category->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-xl col-lg-2 col-sm-3">
                    <div class="footer-title">
                        <h4>Foydali havolalar</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            @foreach(\App\Classes\Helper::getMenu() as $menu)
                                <li>
                                    <a href="{{$menu['url']}}" class="text-content">{{$menu['title']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-3">
                    {{--                    <div class="footer-title">--}}
                    {{--                        <h4>Help Center</h4>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="footer-contain">--}}
                    {{--                        <ul>--}}
                    {{--                            <li>--}}
                    {{--                                <a href="order-success.html" class="text-content">Your Order</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a href="user-dashboard.html" class="text-content">Your Account</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a href="order-tracking.html" class="text-content">Track Order</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a href="wishlist.html" class="text-content">Your Wishlist</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a href="search.html" class="text-content">Search</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a href="faq.html" class="text-content">FAQ</a>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Bog'lanish</h4>
                    </div>

                    <div class="footer-contact">
                        <ul>
                            <li>
                                <div class="footer-number">
                                    <i data-feather="phone"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Doim 24/7 :</h6>
                                        <a href="tel:{{\App\Classes\Helper::info("phone1")}}">
                                            <h5>{{\App\Classes\Helper::info("phone1")}}</h5></a>
                                        {{--                                        <a href="tel:+998903889993"><h5>{{\App\Classes\Helper::info("phone1")}}</h5></a>--}}
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="footer-number">
                                    <i data-feather="mail"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Email Address :</h6>
                                        <h5>
                                            <a href="mailto:{{\App\Classes\Helper::info("email")}}">{{\App\Classes\Helper::info("email")}}</a>
                                            {{--                                            {{\App\Classes\Helper::info("email")}}--}}
                                        </h5>
                                    </div>
                                </div>
                            </li>

                            {{--                            <li class="social-app mb-0">--}}
                            {{--                                <h5 class="mb-2 text-content">Download App :</h5>--}}
                            {{--                                <ul>--}}
                            {{--                                    <li class="mb-0">--}}
                            {{--                                        <a href="https://play.google.com/store/apps" target="_blank">--}}
                            {{--                                            <img src="../assets/images/playstore.svg" class="blur-up lazyload"--}}
                            {{--                                                 alt="">--}}
                            {{--                                        </a>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li class="mb-0">--}}
                            {{--                                        <a href="https://www.apple.com/in/app-store/" target="_blank">--}}
                            {{--                                            <img src="../assets/images/appstore.svg" class="blur-up lazyload"--}}
                            {{--                                                 alt="">--}}
                            {{--                                        </a>--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="sub-footer section-small-space">
            <div class="reserve">
                <h6 class="text-content">©{{date("Y")}} Harir All rights reserved</h6>
            </div>

            {{--            <div class="payment">--}}
            {{--                <img src="../assets/images/payment/1.png" class="blur-up lazyload" alt="">--}}
            {{--            </div>--}}

            <div class="social-link">
                <h6 class="text-content">Bizni kuzating :</h6>
                <ul>
                    <li>
                        <a href="https://facebook.com/hariruz" target="_blank">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://youtube.com/@harir-pardalarsaloni2027" target="_blank">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/hariruz" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://t.me/hariruzb" target="_blank">
                            <i class="fa-brands fa-telegram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Quick View Modal Box Start -->
<div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row g-sm-4 g-2">
                    <div class="col-lg-6">
                        <div class="slider-image">
                            <img src="../assets/images/product/category/1.jpg" class="img-fluid blur-up lazyload"
                                 alt="">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="right-sidebar-modal">
                            <h4 class="title-name">Peanut Butter Bite Premium Butter Cookies 600 g</h4>
                            <h4 class="price">$36.99</h4>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <span class="ms-2">8 Reviews</span>
                                <span class="ms-2 text-danger">6 sold in last 16 hours</span>
                            </div>

                            <div class="product-detail">
                                <h4>Product Details :</h4>
                                <p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love.
                                    Caramels marshmallow icing dessert candy canes I love soufflé I love toffee.
                                    Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon
                                    muffin I love carrot cake sugar plum dessert bonbon.</p>
                            </div>

                            <ul class="brand-list">
                                <li>
                                    <div class="brand-box">
                                        <h5>Brand Name:</h5>
                                        <h6>Black Forest</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="brand-box">
                                        <h5>Product Code:</h5>
                                        <h6>W0690034</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="brand-box">
                                        <h5>Product Type:</h5>
                                        <h6>White Cream Cake</h6>
                                    </div>
                                </li>
                            </ul>

                            <div class="select-size">
                                <h4>Cake Size :</h4>
                                <select class="form-select select-form-size">
                                    <option selected>Select Size</option>
                                    <option value="1.2">1/2 KG</option>
                                    <option value="0">1 KG</option>
                                    <option value="1.5">1/5 KG</option>
                                    <option value="red">Red Roses</option>
                                    <option value="pink">With Pink Roses</option>
                                </select>
                            </div>

                            <div class="modal-button">
                                <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md add-cart-button icon">Add
                                    To Cart
                                </button>
                                <button onclick="location.href = 'product-left.html';"
                                        class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                    View More Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Modal Box End -->

<!-- Location Modal Start -->
<div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="location-list">
                    <div class="search-input">
                        <input type="search" class="form-control" placeholder="Search Your Area">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <div class="disabled-box">
                        <h6>Select a Location</h6>
                    </div>

                    <ul class="location-select custom-height">
                        <li>
                            <a href="javascript:void(0)">
                                <h6>Alabama</h6>
                                <span>Min: $130</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Arizona</h6>
                                <span>Min: $150</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>California</h6>
                                <span>Min: $110</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Colorado</h6>
                                <span>Min: $140</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Florida</h6>
                                <span>Min: $160</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Georgia</h6>
                                <span>Min: $120</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Kansas</h6>
                                <span>Min: $170</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Minnesota</h6>
                                <span>Min: $120</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>New York</h6>
                                <span>Min: $110</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Washington</h6>
                                <span>Min: $130</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Location Modal End -->

<!-- Deal Box Modal Start -->
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                    <p class="mt-1 text-content">Siz uchun tavsiya qilamiz.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        @foreach(dealsToday() as $deal)
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="{{$deal->product->detailUrl}}" class="deal-image">
                                        <img src="{{$deal->product->card_photo?->url}}" class="blur-up lazyload"
                                             alt="">
                                    </a>

                                    <a href="{{$deal->product->detailUrl}}" class="deal-contain">
                                        <h5>{{$deal->product->name}}</h5>
                                        <h6>$ {{$deal->product->sale_price??$deal->product->price}}
                                            @if($deal->product->sale_price)
                                                <del>{{$deal->product->price}}</del>
                                                <span>{{$deal->product->price - $deal->product->sale_price}}</span>
                                            @endif
                                        </h6>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

<!-- Tap to top start -->
<div class="theme-option">
    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->
