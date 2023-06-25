<?php
$categories = \Illuminate\Support\Facades\Cache::remember('categories', \App\Classes\Helper::cacheTime(), function () {
    return \App\Models\Category::query()
        ->where('status', 1)
        ->get();
});
?>
    <!-- Header Start -->
<header class="pb-md-4 pb-0">
    <div class="header-top">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 d-xxl-block d-none">
                    <div class="top-left-header">
                        <i class="iconly-Location icli text-white"></i>
                        <span class="text-white">1418 Riverwood Drive, CA 96052, US</span>
                    </div>
                </div>

                <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6><strong class="me-1">Welcome to Fastkart!</strong>Wrap new offers/gift
                                        every signle day on Weekends.<strong class="ms-1">New Coupon Code: Fast024
                                        </strong>

                                    </h6>
                                </div>
                            </div>

                            <div>
                                <div class="timer-notification">
                                    <h6>Something you love is now on sale!
                                        <a href="shop-left-sidebar.html" class="text-white">Buy Now
                                            !</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--                <div class="col-lg-3">--}}
                {{--                    <ul class="about-list right-nav-about">--}}
                {{--                        <li class="right-nav-list">--}}
                {{--                            <div class="dropdown theme-form-select">--}}
                {{--                                <button class="btn dropdown-toggle" type="button" id="select-language"--}}
                {{--                                        data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                                    <img src="../assets/images/country/united-states.png"--}}
                {{--                                         class="img-fluid blur-up lazyload" alt="">--}}
                {{--                                    <span>English</span>--}}
                {{--                                </button>--}}
                {{--                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">--}}
                {{--                                    <li>--}}
                {{--                                        <a class="dropdown-item" href="javascript:void(0)" id="english">--}}
                {{--                                            <img src="../assets/images/country/united-kingdom.png"--}}
                {{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
                {{--                                            <span>English</span>--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                    <li>--}}
                {{--                                        <a class="dropdown-item" href="javascript:void(0)" id="france">--}}
                {{--                                            <img src="../assets/images/country/germany.png"--}}
                {{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
                {{--                                            <span>Germany</span>--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                    <li>--}}
                {{--                                        <a class="dropdown-item" href="javascript:void(0)" id="chinese">--}}
                {{--                                            <img src="../assets/images/country/turkish.png"--}}
                {{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
                {{--                                            <span>Turki</span>--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                </ul>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                        <li class="right-nav-list">--}}
                {{--                            <div class="dropdown theme-form-select">--}}
                {{--                                <button class="btn dropdown-toggle" type="button" id="select-dollar"--}}
                {{--                                        data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                                    <span>USD</span>--}}
                {{--                                </button>--}}
                {{--                                <ul class="dropdown-menu dropdown-menu-end sm-dropdown-menu"--}}
                {{--                                    aria-labelledby="select-dollar">--}}
                {{--                                    <li>--}}
                {{--                                        <a class="dropdown-item" id="aud" href="javascript:void(0)">AUD</a>--}}
                {{--                                    </li>--}}
                {{--                                    <li>--}}
                {{--                                        <a class="dropdown-item" id="eur" href="javascript:void(0)">EUR</a>--}}
                {{--                                    </li>--}}
                {{--                                    <li>--}}
                {{--                                        <a class="dropdown-item" id="cny" href="javascript:void(0)">CNY</a>--}}
                {{--                                    </li>--}}
                {{--                                </ul>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                        </button>
                        <a href="index.html" class="web-logo nav-logo">
                            <img src="../assets/images/logo/1.png" class="img-fluid blur-up lazyload" alt="">
                        </a>

                        <div class="middle-box">
                            {{--                            <div class="location-box">--}}
                            {{--                                <button class="btn location-button" data-bs-toggle="modal"--}}
                            {{--                                        data-bs-target="#locationModal">--}}
                            {{--                                        <span class="location-arrow">--}}
                            {{--                                            <i data-feather="map-pin"></i>--}}
                            {{--                                        </span>--}}
                            {{--                                    <span class="locat-name">Your Location</span>--}}
                            {{--                                    <i class="fa-solid fa-angle-down"></i>--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}

                            <div class="search-box">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="I'm searching for..."
                                           aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn" type="button" id="button-addon2">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                </div>
                            </div>
                                                        <ul class="right-side-menu">
                                                            <li class="right-side">
                                                                <div class="delivery-login-box">
                                                                    <div class="delivery-icon">
                                                                        <div class="search-box">
                                                                            <i data-feather="search"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="right-side">
                                                                <a href="contact-us.html" class="delivery-login-box">
                                                                    <div class="delivery-icon">
                                                                        <i data-feather="phone-call"></i>
                                                                    </div>
                                                                    <div class="delivery-detail">
                                                                        <h6>24/7 Delivery</h6>
                                                                        <h5>+91 888 104 2340</h5>
                                                                    </div>
                                                                </a>
                                                            </li>
{{--                                                            <li class="right-side">--}}
{{--                                                                <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">--}}
{{--                                                                    <i data-feather="heart"></i>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="right-side">--}}
{{--                                                                <div class="onhover-dropdown header-badge">--}}
{{--                                                                    <button type="button" class="btn p-0 position-relative header-wishlist">--}}
{{--                                                                        <i data-feather="shopping-cart"></i>--}}
{{--                                                                        <span class="position-absolute top-0 start-100 translate-middle badge">2--}}
{{--                                                                                <span class="visually-hidden">unread messages</span>--}}
{{--                                                                            </span>--}}
{{--                                                                    </button>--}}

{{--                                                                    <div class="onhover-div">--}}
{{--                                                                        <ul class="cart-list">--}}
{{--                                                                            <li class="product-box-contain">--}}
{{--                                                                                <div class="drop-cart">--}}
{{--                                                                                    <a href="product-left-thumbnail.html" class="drop-image">--}}
{{--                                                                                        <img src="../assets/images/vegetable/product/1.png"--}}
{{--                                                                                             class="blur-up lazyload" alt="">--}}
{{--                                                                                    </a>--}}

{{--                                                                                    <div class="drop-contain">--}}
{{--                                                                                        <a href="product-left-thumbnail.html">--}}
{{--                                                                                            <h5>Fantasy Crunchy Choco Chip Cookies</h5>--}}
{{--                                                                                        </a>--}}
{{--                                                                                        <h6><span>1 x</span> $80.58</h6>--}}
{{--                                                                                        <button class="close-button close_button">--}}
{{--                                                                                            <i class="fa-solid fa-xmark"></i>--}}
{{--                                                                                        </button>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}

{{--                                                                            <li class="product-box-contain">--}}
{{--                                                                                <div class="drop-cart">--}}
{{--                                                                                    <a href="product-left-thumbnail.html" class="drop-image">--}}
{{--                                                                                        <img src="../assets/images/vegetable/product/2.png"--}}
{{--                                                                                             class="blur-up lazyload" alt="">--}}
{{--                                                                                    </a>--}}

{{--                                                                                    <div class="drop-contain">--}}
{{--                                                                                        <a href="product-left-thumbnail.html">--}}
{{--                                                                                            <h5>Peanut Butter Bite Premium Butter Cookies 600 g--}}
{{--                                                                                            </h5>--}}
{{--                                                                                        </a>--}}
{{--                                                                                        <h6><span>1 x</span> $25.68</h6>--}}
{{--                                                                                        <button class="close-button close_button">--}}
{{--                                                                                            <i class="fa-solid fa-xmark"></i>--}}
{{--                                                                                        </button>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </li>--}}
{{--                                                                        </ul>--}}

{{--                                                                        <div class="price-box">--}}
{{--                                                                            <h5>Total :</h5>--}}
{{--                                                                            <h4 class="theme-color fw-bold">$106.58</h4>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="button-group">--}}
{{--                                                                            <a href="cart.html" class="btn btn-sm cart-button">View Cart</a>--}}
{{--                                                                            <a href="checkout.html" class="btn btn-sm cart-button theme-bg-color--}}
{{--                                                                                text-white">Checkout</a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="right-side onhover-dropdown">--}}
{{--                                                                <div class="delivery-login-box">--}}
{{--                                                                    <div class="delivery-icon">--}}
{{--                                                                        <i data-feather="user"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="delivery-detail">--}}
{{--                                                                        <h6>Hello,</h6>--}}
{{--                                                                        <h5>My Account</h5>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="onhover-div onhover-div-login">--}}
{{--                                                                    <ul class="user-box-name">--}}
{{--                                                                        <li class="product-box-contain">--}}
{{--                                                                            <i></i>--}}
{{--                                                                            <a href="login.html">Log In</a>--}}
{{--                                                                        </li>--}}

{{--                                                                        <li class="product-box-contain">--}}
{{--                                                                            <a href="sign-up.html">Register</a>--}}
{{--                                                                        </li>--}}

{{--                                                                        <li class="product-box-contain">--}}
{{--                                                                            <a href="forgot.html">Forgot Password</a>--}}
{{--                                                                        </li>--}}
{{--                                                                    </ul>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}
                                                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-left">
                        <button class="dropdown-category">
                            <i data-feather="align-left"></i>
                            <span>All Categories</span>
                        </button>

                        <div class="category-dropdown">
                            <div class="category-title">
                                <h5>Categories</h5>
                                <button type="button" class="btn p-0 close-button text-content">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <ul class="category-list">

                                @foreach($categories as $category)
                                    <li class="onhover-category-list">
                                        <a href="/" class="category-name">
                                            <img src="{{$category->icon?->thumbnail}}" alt="">
                                            <h6>{{$category->name}}</h6>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="header-nav-middle">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a href="/" class="nav-link nav-hand">Bosh sahifa</a>


                                            {{--                                            <ul class="dropdown-menu">--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index.html">Kartshop</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index-2.html">Sweetshop</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index-3.html">Organic</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index-4.html">Supershop</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index-5.html">Classic shop</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index-6.html">Furniture</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index-7.html">Search Oriented</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index-8.html">Category Focus</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                                <li>--}}
                                            {{--                                                    <a class="dropdown-item" href="index-9.html">Fashion</a>--}}
                                            {{--                                                </li>--}}
                                            {{--                                            </ul>--}}
                                        </li>
                                        <li class="nav-item">
                                            <a href="/" class="nav-link nav-hand">Blog</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/" class="nav-link nav-hand">Biz haqimizda</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-nav-right">
                        <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                            <i data-feather="zap"></i>
                            <span>Deal Today</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
