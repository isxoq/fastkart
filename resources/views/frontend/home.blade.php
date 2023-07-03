<?php


$categoriesWithoutChildren = \App\Models\Category::with('childrenRecursive')
    ->whereDoesntHave('childrenRecursive')
    ->get();

?>


@extends('layouts.frontend')

@section('content')

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Home Section Start -->
    <section class="home-section pt-2">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xl-8 ratio_65">
                    <div class="home-contain h-100">
                        <div class="h-100">
                            <img src="{{$bigBanner->photo->url??""}}" class="bg-img blur-up lazyload" alt="">
                        </div>
                        <div class="home-detail p-center-left w-75">
                            <div>
                                <h6>{{$bigBanner->title_1}} <span>{{$bigBanner->title_2}}</span></h6>
                                <h1 class="text-uppercase">{{$bigBanner->title_3}} <span
                                        class="daily">{{$bigBanner->title_4}}</span></h1>
                                <p class="w-75 d-none d-sm-block">{{$bigBanner->title_5}}</p>
                                <button onclick="location.href = '{{$bigBanner->url}}';"
                                        class="btn btn-animation mt-xxl-4 mt-2 home-button mend-auto">Ko'rish <i
                                        class="fa-solid fa-right-long icon"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 ratio_65">
                    <div class="row g-4">

                        <?php   $i = 1; ?>

                        @foreach($smallBanners as $smallBanner)

                            <div class="col-xl-12 col-md-6">
                                <div class="home-contain">
                                    <img src="{{$smallBanner->photo->url}}" class="bg-img blur-up lazyload"
                                         alt="">
                                    <div class="home-detail p-center-left home-p-sm w-75">
                                        @if($i==1)
                                            <div>
                                                <h2 class="mt-0 text-danger">45% <span
                                                        class="discount text-title">OFF</span>
                                                </h2>
                                                <h3 class="theme-color">Nut Collection</h3>
                                                <p class="w-75">We deliver organic vegetables &amp; fruits</p>
                                                <a href="shop-left-sidebar.html" class="shop-button">Shop Now <i
                                                        class="fa-solid fa-right-long"></i></a>
                                            </div>
                                        @else
                                            <div>
                                                <h3 class="mt-0 theme-color fw-bold">Healthy Food</h3>
                                                <h4 class="text-danger">Organic Market</h4>
                                                <p class="organic">Start your daily shopping with some Organic food</p>
                                                <a href="shop-left-sidebar.html" class="shop-button">Shop Now <i
                                                        class="fa-solid fa-right-long"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <?php $i++?>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- Banner Section Start -->
    <section class="banner-section ratio_60 wow fadeInUp">
        <div class="container-fluid-lg">
            <div class="banner-slider">
                @foreach($bannerSlider as $slider)

                    <div>
                        <div class="banner-contain hover-effect">
                            <img src="{{$slider->photo->url}}" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details">
                                <div class="banner-box">
                                    <h6 class="text-danger">{{$slider->title_1}}</h6>
                                    <h5>{{$slider->title_2}}</h5>
                                    <h6 class="text-content">{{$slider->title_3}}</h6>
                                </div>
                                <a href="{{$slider->url}}" class="banner-button text-white" tabindex="0">Shop Now <i
                                        class="fa-solid fa-right-long ms-2"></i></a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                    <div class="p-sticky">
                        <div class="category-menu">
                            <h3>Kategoriyalar</h3>
                            <ul>
                                @foreach($categoriesWithoutChildren as $category)
                                    <li class="{{$loop->last?"pb-30":""}}">
                                        <div class="category-list">
                                            <img src="{{$category->icon?->url??"../assets/svg/1/vegetable.svg"}}"
                                                 class="blur-up lazyload"
                                                 alt="">
                                            <h5>
                                                <a href="{{$category->url()}}">{{$category->name}}</a>
                                            </h5>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            {{--                            <ul class="value-list">--}}
                            {{--                                <li>--}}
                            {{--                                    <div class="category-list">--}}
                            {{--                                        <h5 class="ms-0 text-title">--}}
                            {{--                                            <a href="shop-left-sidebar.html">Value of the Day</a>--}}
                            {{--                                        </h5>--}}
                            {{--                                    </div>--}}
                            {{--                                </li>--}}
                            {{--                                <li>--}}
                            {{--                                    <div class="category-list">--}}
                            {{--                                        <h5 class="ms-0 text-title">--}}
                            {{--                                            <a href="shop-left-sidebar.html">Top 50 Offers</a>--}}
                            {{--                                        </h5>--}}
                            {{--                                    </div>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="mb-0">--}}
                            {{--                                    <div class="category-list">--}}
                            {{--                                        <h5 class="ms-0 text-title">--}}
                            {{--                                            <a href="shop-left-sidebar.html">New Arrivals</a>--}}
                            {{--                                        </h5>--}}
                            {{--                                    </div>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                        </div>

                        {{--                        <div class="ratio_156 section-t-space">--}}
                        {{--                            <div class="home-contain hover-effect">--}}
                        {{--                                <img src="../assets/images/vegetable/banner/8.jpg" class="bg-img blur-up lazyload"--}}
                        {{--                                     alt="">--}}
                        {{--                                <div class="home-detail p-top-left home-p-medium">--}}
                        {{--                                    <div>--}}
                        {{--                                        <h6 class="text-yellow home-banner">Seafood</h6>--}}
                        {{--                                        <h3 class="text-uppercase fw-normal"><span--}}
                        {{--                                                class="theme-color fw-bold">Freshes</span> Products</h3>--}}
                        {{--                                        <h3 class="fw-light">every hour</h3>--}}
                        {{--                                        <button onclick="location.href = 'shop-left-sidebar.html';"--}}
                        {{--                                                class="btn btn-animation btn-md mend-auto">Shop Now <i--}}
                        {{--                                                class="fa-solid fa-arrow-right icon"></i></button>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="ratio_medium section-t-space">--}}
                        {{--                            <div class="home-contain hover-effect">--}}
                        {{--                                <img src="../assets/images/vegetable/banner/11.jpg" class="img-fluid blur-up lazyload"--}}
                        {{--                                     alt="">--}}
                        {{--                                <div class="home-detail p-top-left home-p-medium">--}}
                        {{--                                    <div>--}}
                        {{--                                        <h4 class="text-yellow text-exo home-banner">Organic</h4>--}}
                        {{--                                        <h2 class="text-uppercase fw-normal mb-0 text-russo theme-color">fresh</h2>--}}
                        {{--                                        <h2 class="text-uppercase fw-normal text-title">Vegetables</h2>--}}
                        {{--                                        <p class="mb-3">Super Offer to 50% Off</p>--}}
                        {{--                                        <button onclick="location.href = 'shop-left-sidebar.html';"--}}
                        {{--                                                class="btn btn-animation btn-md mend-auto">Shop Now <i--}}
                        {{--                                                class="fa-solid fa-arrow-right icon"></i></button>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="section-t-space">--}}
                        {{--                            <div class="category-menu">--}}
                        {{--                                <h3>Trending Products</h3>--}}

                        {{--                                <ul class="product-list border-0 p-0 d-block">--}}
                        {{--                                    <li>--}}
                        {{--                                        <div class="offer-product">--}}
                        {{--                                            <a href="product-left-thumbnail.html" class="offer-image">--}}
                        {{--                                                <img src="../assets/images/vegetable/product/23.png"--}}
                        {{--                                                     class="blur-up lazyload" alt="">--}}
                        {{--                                            </a>--}}

                        {{--                                            <div class="offer-detail">--}}
                        {{--                                                <div>--}}
                        {{--                                                    <a href="product-left-thumbnail.html" class="text-title">--}}
                        {{--                                                        <h6 class="name">Meatigo Premium Goat Curry</h6>--}}
                        {{--                                                    </a>--}}
                        {{--                                                    <span>450 G</span>--}}
                        {{--                                                    <h6 class="price theme-color">$ 70.00</h6>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}

                        {{--                                    <li>--}}
                        {{--                                        <div class="offer-product">--}}
                        {{--                                            <a href="product-left-thumbnail.html" class="offer-image">--}}
                        {{--                                                <img src="../assets/images/vegetable/product/24.png"--}}
                        {{--                                                     class="blur-up lazyload" alt="">--}}
                        {{--                                            </a>--}}

                        {{--                                            <div class="offer-detail">--}}
                        {{--                                                <div>--}}
                        {{--                                                    <a href="product-left-thumbnail.html" class="text-title">--}}
                        {{--                                                        <h6 class="name">Dates Medjoul Premium Imported</h6>--}}
                        {{--                                                    </a>--}}
                        {{--                                                    <span>450 G</span>--}}
                        {{--                                                    <h6 class="price theme-color">$ 40.00</h6>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}

                        {{--                                    <li>--}}
                        {{--                                        <div class="offer-product">--}}
                        {{--                                            <a href="product-left-thumbnail.html" class="offer-image">--}}
                        {{--                                                <img src="../assets/images/vegetable/product/25.png"--}}
                        {{--                                                     class="blur-up lazyload" alt="">--}}
                        {{--                                            </a>--}}

                        {{--                                            <div class="offer-detail">--}}
                        {{--                                                <div>--}}
                        {{--                                                    <a href="product-left-thumbnail.html" class="text-title">--}}
                        {{--                                                        <h6 class="name">Good Life Walnut Kernels</h6>--}}
                        {{--                                                    </a>--}}
                        {{--                                                    <span>200 G</span>--}}
                        {{--                                                    <h6 class="price theme-color">$ 52.00</h6>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}

                        {{--                                    <li class="mb-0">--}}
                        {{--                                        <div class="offer-product">--}}
                        {{--                                            <a href="product-left-thumbnail.html" class="offer-image">--}}
                        {{--                                                <img src="../assets/images/vegetable/product/26.png"--}}
                        {{--                                                     class="blur-up lazyload" alt="">--}}
                        {{--                                            </a>--}}

                        {{--                                            <div class="offer-detail">--}}
                        {{--                                                <div>--}}
                        {{--                                                    <a href="product-left-thumbnail.html" class="text-title">--}}
                        {{--                                                        <h6 class="name">Apple Red Premium Imported</h6>--}}
                        {{--                                                    </a>--}}
                        {{--                                                    <span>1 KG</span>--}}
                        {{--                                                    <h6 class="price theme-color">$ 80.00</h6>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="section-t-space">--}}
                        {{--                            <div class="category-menu">--}}
                        {{--                                <h3>Customer Comment</h3>--}}

                        {{--                                <div class="review-box">--}}
                        {{--                                    <div class="review-contain">--}}
                        {{--                                        <h5 class="w-75">We Care About Our Customer Experience</h5>--}}
                        {{--                                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly--}}
                        {{--                                            used to demonstrate the visual form of a document or a typeface without--}}
                        {{--                                            relying on meaningful content.</p>--}}
                        {{--                                    </div>--}}

                        {{--                                    <div class="review-profile">--}}
                        {{--                                        <div class="review-image">--}}
                        {{--                                            <img src="../assets/images/vegetable/review/1.jpg"--}}
                        {{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="review-detail">--}}
                        {{--                                            <h5>Tina Mcdonnale</h5>--}}
                        {{--                                            <h6>Sale Manager</h6>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8">
                    <div class="title title-flex">
                        <div>
                            <h2>Mahsulotni tanlang</h2>
                            <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                            <p>Tanlangan mahsulot kategoriyasiga o'tiladi</p>
                        </div>
                        {{--                        <div class="timing-box">--}}
                        {{--                            <div class="timing">--}}
                        {{--                                <i data-feather="clock"></i>--}}
                        {{--                                <h6 class="name">Expires in :</h6>--}}
                        {{--                                <div class="time" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">--}}
                        {{--                                    <ul>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="counter">--}}
                        {{--                                                <div class="days">--}}
                        {{--                                                    <h6></h6>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="counter">--}}
                        {{--                                                <div class="hours">--}}
                        {{--                                                    <h6></h6>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="counter">--}}
                        {{--                                                <div class="minutes">--}}
                        {{--                                                    <h6></h6>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="counter">--}}
                        {{--                                                <div class="seconds">--}}
                        {{--                                                    <h6></h6>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                    </ul>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>

                    <div class="section-b-space">
                        <div class="product-border border-row overflow-hidden">
                            <div class="product-box-slider no-arrow">


                                {{--                                @foreach($products as $productArray)--}}

                                {{--                                    <div>--}}
                                {{--                                        <div class="row m-0">--}}
                                {{--                                            @foreach($productArray as $product)--}}
                                {{--                                                <div class="col-12 px-0">--}}
                                {{--                                                    @include("frontend.partials.home-product-box",['product'=>$product])--}}
                                {{--                                                </div>--}}
                                {{--                                            @endforeach--}}

                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                @endforeach--}}


                            </div>
                        </div>
                    </div>

                    {{--                    <div class="title">--}}
                    {{--                        <h2>Bowse by Categories</h2>--}}
                    {{--                        <span class="title-leaf">--}}
                    {{--                            <svg class="icon-width">--}}
                    {{--                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>--}}
                    {{--                            </svg>--}}
                    {{--                        </span>--}}
                    {{--                        <p>Top Categories Of The Week</p>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="category-slider-2 product-wrapper no-arrow">--}}
                    {{--                        <div>--}}
                    {{--                            <a href="shop-left-sidebar.html" class="category-box category-dark">--}}
                    {{--                                <div>--}}
                    {{--                                    <img src="../assets/svg/1/vegetable.svg" class="blur-up lazyload" alt="">--}}
                    {{--                                    <h5>Vegetables & Fruit</h5>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div>--}}
                    {{--                            <a href="shop-left-sidebar.html" class="category-box category-dark">--}}
                    {{--                                <div>--}}
                    {{--                                    <img src="../assets/svg/1/cup.svg" class="blur-up lazyload" alt="">--}}
                    {{--                                    <h5>Beverages</h5>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div>--}}
                    {{--                            <a href="shop-left-sidebar.html" class="category-box category-dark">--}}
                    {{--                                <div>--}}
                    {{--                                    <img src="../assets/svg/1/meats.svg" class="blur-up lazyload" alt="">--}}
                    {{--                                    <h5>Meats & Seafood</h5>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div>--}}
                    {{--                            <a href="shop-left-sidebar.html" class="category-box category-dark">--}}
                    {{--                                <div>--}}
                    {{--                                    <img src="../assets/svg/1/breakfast.svg" class="blur-up lazyload" alt="">--}}
                    {{--                                    <h5>Breakfast</h5>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div>--}}
                    {{--                            <a href="shop-left-sidebar.html" class="category-box category-dark">--}}
                    {{--                                <div>--}}
                    {{--                                    <img src="../assets/svg/1/frozen.svg" class="blur-up lazyload" alt="">--}}
                    {{--                                    <h5>Frozen Foods</h5>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div>--}}
                    {{--                            <a href="shop-left-sidebar.html" class="category-box category-dark">--}}
                    {{--                                <div>--}}
                    {{--                                    <img src="../assets/svg/1/milk.svg" class="blur-up lazyload" alt="">--}}
                    {{--                                    <h5>Milk & Dairies</h5>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}

                    {{--                        <div>--}}
                    {{--                            <a href="shop-left-sidebar.html" class="category-box category-dark">--}}
                    {{--                                <div>--}}
                    {{--                                    <img src="../assets/svg/1/pet.svg" class="blur-up lazyload" alt="">--}}
                    {{--                                    <h5>Pet Food</h5>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="section-t-space section-b-space">
                        <div class="row g-md-4 g-3">
                            <div class="col-md-6">
                                <div class="banner-contain hover-effect">
                                    <img src="../assets/images/vegetable/banner/9.jpg" class="bg-img blur-up lazyload"
                                         alt="">
                                    <div class="banner-details p-center-left p-4">
                                        <div>
                                            <h3 class="text-exo">50% offer</h3>
                                            <h4 class="text-russo fw-normal theme-color mb-2">Testy Mushrooms</h4>
                                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                                    class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                                    class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner-contain hover-effect">
                                    <img src="../assets/images/vegetable/banner/10.jpg" class="bg-img blur-up lazyload"
                                         alt="">
                                    <div class="banner-details p-center-left p-4">
                                        <div>
                                            <h3 class="text-exo">50% offer</h3>
                                            <h4 class="text-russo fw-normal theme-color mb-2">Fresh MEAT</h4>
                                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                                    class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                                    class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="title d-block">
                        <h2>Food Cupboard</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        <p>A virtual assistant collects the products from your list</p>
                    </div>

                    <div class="product-border overflow-hidden wow fadeInUp">
                        {{--                        <div class="product-box-slider no-arrow">--}}
                        {{--                            <div>--}}
                        {{--                                <div class="row m-0">--}}
                        {{--                                    <div class="col-12 px-0">--}}
                        {{--                                        @include("frontend.partials.home-product-box")--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div>--}}
                        {{--                                <div class="row m-0">--}}
                        {{--                                    <div class="col-12 px-0">--}}
                        {{--                                        @include("frontend.partials.home-product-box")--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div>--}}
                        {{--                                <div class="row m-0">--}}
                        {{--                                    <div class="col-12 px-0">--}}
                        {{--                                        @include("frontend.partials.home-product-box")--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div>--}}
                        {{--                                <div class="row m-0">--}}
                        {{--                                    <div class="col-12 px-0">--}}
                        {{--                                        @include("frontend.partials.home-product-box")--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div>--}}
                        {{--                                <div class="row m-0">--}}
                        {{--                                    <div class="col-12 px-0">--}}
                        {{--                                        @include("frontend.partials.home-product-box")--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div>--}}
                        {{--                                <div class="row m-0">--}}
                        {{--                                    <div class="col-12 px-0">--}}
                        {{--                                        @include("frontend.partials.home-product-box")--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>

                    {{--                    <div class="section-t-space">--}}
                    {{--                        <div class="banner-contain">--}}
                    {{--                            <img src="../assets/images/vegetable/banner/15.jpg" class="bg-img blur-up lazyload" alt="">--}}
                    {{--                            <div class="banner-details p-center p-4 text-white text-center">--}}
                    {{--                                <div>--}}
                    {{--                                    <h3 class="lh-base fw-bold offer-text">Get $3 Cashback! Min Order of $30</h3>--}}
                    {{--                                    <h6 class="coupon-code">Use Code : GROCERY1920</h6>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="section-t-space section-b-space">--}}
                    {{--                        <div class="row g-md-4 g-3">--}}
                    {{--                            <div class="col-xxl-8 col-xl-12 col-md-7">--}}
                    {{--                                <div class="banner-contain hover-effect">--}}
                    {{--                                    <img src="../assets/images/vegetable/banner/12.jpg" class="bg-img blur-up lazyload"--}}
                    {{--                                         alt="">--}}
                    {{--                                    <div class="banner-details p-center-left p-4">--}}
                    {{--                                        <div>--}}
                    {{--                                            <h2 class="text-kaushan fw-normal theme-color">Get Ready To</h2>--}}
                    {{--                                            <h3 class="mt-2 mb-3">TAKE ON THE DAY!</h3>--}}
                    {{--                                            <p class="text-content banner-text">In publishing and graphic design, Lorem--}}
                    {{--                                                ipsum is a placeholder text commonly used to demonstrate.</p>--}}
                    {{--                                            <button onclick="location.href = 'shop-left-sidebar.html';"--}}
                    {{--                                                    class="btn btn-animation btn-sm mend-auto">Shop Now <i--}}
                    {{--                                                    class="fa-solid fa-arrow-right icon"></i></button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <div class="col-xxl-4 col-xl-12 col-md-5">--}}
                    {{--                                <a href="shop-left-sidebar.html" class="banner-contain hover-effect h-100">--}}
                    {{--                                    <img src="../assets/images/vegetable/banner/13.jpg" class="bg-img blur-up lazyload"--}}
                    {{--                                         alt="">--}}
                    {{--                                    <div class="banner-details p-center-left p-4 h-100">--}}
                    {{--                                        <div>--}}
                    {{--                                            <h2 class="text-kaushan fw-normal text-danger">20% Off</h2>--}}
                    {{--                                            <h3 class="mt-2 mb-2 theme-color">SUMMRY</h3>--}}
                    {{--                                            <h3 class="fw-normal product-name text-title">Product</h3>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}


                    {{--                    <div class="title d-block">--}}
                    {{--                        <div>--}}
                    {{--                            <h2>Our best Seller</h2>--}}
                    {{--                            <span class="title-leaf">--}}
                    {{--                                <svg class="icon-width">--}}
                    {{--                                    <use xlink:href="../assets/svg/leaf.svg#leaf"></use>--}}
                    {{--                                </svg>--}}
                    {{--                            </span>--}}
                    {{--                            <p>A virtual assistant collects the products from your list</p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="best-selling-slider product-wrapper wow fadeInUp">--}}
                    {{--                        <div>--}}
                    {{--                            <ul class="product-list">--}}
                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/11.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Tuffets Whole Wheat Bread</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>500 G</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/12.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Potato</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>500 G</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/13.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Green Chilli</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>200 G</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/14.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Muffets Burger Bun</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>150 G</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}

                    {{--                        <div>--}}
                    {{--                            <ul class="product-list">--}}
                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/15.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Tuffets Britannia Cheezza</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>500 G</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/16.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Long Life Toned Milk</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>1 L</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/17.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Organic Tomato</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>1 KG</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/18.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Organic Jam</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>150 G</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}

                    {{--                        <div>--}}
                    {{--                            <ul class="product-list">--}}
                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/19.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Good Life Refined Sunflower Oil</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>1 L</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/20.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Good Life Raw Peanuts</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>500 G</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/21.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">TufBest Farms Moong Dal</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>1 KG</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="offer-product">--}}
                    {{--                                        <a href="product-left-thumbnail.html" class="offer-image">--}}
                    {{--                                            <img src="../assets/images/vegetable/product/22.png"--}}
                    {{--                                                 class="blur-up lazyload" alt="">--}}
                    {{--                                        </a>--}}

                    {{--                                        <div class="offer-detail">--}}
                    {{--                                            <div>--}}
                    {{--                                                <a href="product-left-thumbnail.html" class="text-title">--}}
                    {{--                                                    <h6 class="name">Frooti Mango Drink</h6>--}}
                    {{--                                                </a>--}}
                    {{--                                                <span>160 ML</span>--}}
                    {{--                                                <h6 class="price theme-color">$ 10.00</h6>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="section-t-space">--}}
                    {{--                        <div class="banner-contain hover-effect">--}}
                    {{--                            <img src="../assets/images/vegetable/banner/14.jpg" class="bg-img blur-up lazyload" alt="">--}}
                    {{--                            <div class="banner-details p-center banner-b-space w-100 text-center">--}}
                    {{--                                <div>--}}
                    {{--                                    <h6 class="ls-expanded theme-color mb-sm-3 mb-1">SUMMER</h6>--}}
                    {{--                                    <h2 class="banner-title">VEGETABLE</h2>--}}
                    {{--                                    <h5 class="lh-sm mx-auto mt-1 text-content">Save up to 5% OFF</h5>--}}
                    {{--                                    <button onclick="location.href = 'shop-left-sidebar.html';"--}}
                    {{--                                            class="btn btn-animation btn-sm mx-auto mt-sm-3 mt-2">Shop Now <i--}}
                    {{--                                            class="fa-solid fa-arrow-right icon"></i></button>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="title section-t-space">
                        <h2>Yangilik va aksiyalar</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        <p>Bu yerda aksiyalarimizdan bohabar bo'lasiz</p>
                    </div>

                    <div class="slider-3-blog ratio_65 no-arrow product-wrapper">
                        @foreach($posts as $post)

                            <div>
                                <div class="blog-box">
                                    <div class="blog-box-image">
                                        <a href="{{url("blog/".$post->id)}}" class="blog-image">
                                            <img src="{{$post->card_photo->url??""}}" class="bg-img blur-up lazyload"
                                                 alt="">
                                        </a>
                                    </div>

                                    <a href="blog-detail.html" class="blog-detail">
                                        <h6>{{$product->created_at->format("d.m.Y")}}</h6>
                                        <h5>Fresh Vegetable Online</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Newsletter Section Start -->
    {{--
    <section class="newsletter-section section-b-space">
        <div class="container-fluid-lg">
            <div class="newsletter-box newsletter-box-2">
                <div class="newsletter-contain py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                                <div class="newsletter-detail">
                                    <h2>Join our newsletter and get...</h2>
                                    <h5>$20 discount for your first order</h5>
                                    <div class="input-box">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                               placeholder="Enter Your Email">
                                        <i class="fa-solid fa-envelope arrow"></i>
                                        <button class="sub-btn  btn-animation">
                                            <span class="d-sm-block d-none">Subscribe</span>
                                            <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    --}}
    <!-- Newsletter Section End -->
@endsection
