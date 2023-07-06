<?php


$categoriesWithoutChildren = \App\Models\Category::with('childrenRecursive')
    ->whereDoesntHave('childrenRecursive')
    ->get();

$productGroups = \App\Models\Offer::query()->orderBy("sort_order")->get();

?>


@extends('layouts.frontend')

@section('content')

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
                                                <h2 class="mt-0 text-danger">{{$smallBanner->title_1}}<span
                                                        class="discount text-title">{{$smallBanner->title_2}}</span>
                                                </h2>
                                                <h3 class="theme-color">{{$smallBanner->title_3}}</h3>
                                                <p class="w-75">{{$smallBanner->title_4}}</p>
                                                <a href="{{$smallBanner->url}}" class="shop-button">Ko'rish <i
                                                        class="fa-solid fa-right-long"></i></a>
                                            </div>
                                        @else
                                            <div>
                                                <h3 class="mt-0 theme-color fw-bold">{{$smallBanner->title_1}}</h3>
                                                <h4 class="text-danger">{{$smallBanner->title_2}}</h4>
                                                <p class="organic">{{$smallBanner->title_3}}</p>
                                                <a href="{{$smallBanner->url}}" class="shop-button">Ko'rish <i
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
                                <a href="{{$slider->url}}" class="banner-button text-white" tabindex="0">Hozir o'tish<i
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
                                            <img src="{{$category->iconUrl()??"../assets/svg/1/vegetable.svg"}}"
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

                    @foreach($productGroups as $group)

                        <div class="title title-flex">
                            <div>
                                <h2>{{$group->title}}</h2>
                                <span class="title-leaf">
                                <svg class="icon-width" id="Layer_1" data-name="Layer 1"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136.17 136.2"><path
                                        d="M119.6,106a9.86,9.86,0,0,1-1.46-15.14c-1.69-1.06-3.42-2.08-5.07-3.21a53.55,53.55,0,0,1-17-19.48A72.64,72.64,0,0,1,89.31,49a101.3,101.3,0,0,1-2.15-18.86c0-.31,0-.62,0-1H63c-.08,1.53-.15,3-.24,4.54a93.39,93.39,0,0,1-3.61,21.57C56,66,50.74,75.52,42.47,83.23a50,50,0,0,1-10.19,7.31c-.11.06-.22.12-.37.22A9.9,9.9,0,0,1,30.4,106a33.55,33.55,0,0,1,5.27,9,55.17,55.17,0,0,1,3.54,14.06c.39,3.28.65,6.59.79,9.89a6.07,6.07,0,0,1-6.21,6.53c-5.84.06-11.68.08-17.52,0A9.74,9.74,0,0,1,7,135.6q0-23.35,0-46.69Q7,64.81,7,40.7,7,29.95,7,19.2a9.72,9.72,0,0,1,9.78-9.8c13.29,0,26.58,0,39.87,0H93.57q19.83,0,39.68,0a9.77,9.77,0,0,1,9.86,9.93V64.86q0,21.31,0,42.62v28.13a9.76,9.76,0,0,1-9.7,9.91c-5.68.07-11.36,0-17.05,0a6.19,6.19,0,0,1-6.2-5.06,10,10,0,0,1-.1-2.45c.34-7.87,1.37-15.63,4.35-23a38.62,38.62,0,0,1,2.26-4.67C117.54,108.85,118.59,107.46,119.6,106Zm18-18.14V29.15H112c0,.4,0,.74,0,1.08a119.89,119.89,0,0,0,3.23,26.21,65.29,65.29,0,0,0,8.24,19.88,36.77,36.77,0,0,0,10,10.57A5.23,5.23,0,0,0,137.63,87.82Zm-125.18,0a5.15,5.15,0,0,0,4.1-.88,35.76,35.76,0,0,0,9.92-10.4C32.16,67.79,35,58,36.54,47.82,37.26,43,37.56,38,38,33.15c.12-1.33,0-2.68,0-4H12.45ZM137.7,23.59c0-1.31,0-2.51,0-3.7,0-3.31-1.65-5.05-5-5.07-8.49,0-17,0-25.48,0H30.53c-4.51,0-9,0-13.54,0-2.17,0-4.08,1.26-4.37,3.2a39.72,39.72,0,0,0,0,5.57ZM24.44,87.94c.32-.1.66-.17,1-.29a36.74,36.74,0,0,0,10.24-5.78c11-8.66,16.68-20.4,19.68-33.72a94.42,94.42,0,0,0,2-14.78c.09-1.4,0-2.81,0-4.24H43.57c0,.39,0,.73,0,1.07-.13,2.77-.18,5.55-.41,8.32a122.62,122.62,0,0,1-2.39,16.72A76.09,76.09,0,0,1,33,76.51,53.93,53.93,0,0,1,24.44,87.94ZM125.66,88l.09-.23c-1-1-1.93-2-2.84-3a56.57,56.57,0,0,1-10.52-18.85,82.89,82.89,0,0,1-4.2-17.49c-.54-4.38-.94-8.77-1.33-13.15-.18-2-.21-4.08-.3-6.1H92.64c0,.44,0,.78,0,1.13A95.93,95.93,0,0,0,94.34,46a67,67,0,0,0,8,21.85A47,47,0,0,0,122,86.49C123.21,87.07,124.45,87.51,125.66,88Zm-99,52.08h6.49c1.3,0,1.51-.19,1.46-1.46a70.73,70.73,0,0,0-2.74-18.17A32.57,32.57,0,0,0,26,109.2c-1.53-1.87-3.34-1.69-5.39-1.55a49.79,49.79,0,0,1,4.43,15.84C25.73,129,26.11,134.46,26.62,140.09Zm97.06,0c.47-11.15,1.08-22.15,5.75-32.49a20.41,20.41,0,0,1-2.36,0,2.61,2.61,0,0,0-2.25.94,22,22,0,0,0-4.47,6.51c-3.57,7.64-4.51,15.81-4.86,24.09a.87.87,0,0,0,.94,1Zm-102.82,0V139a99.28,99.28,0,0,0-1.94-19.15A34.92,34.92,0,0,0,15,108.77c-.81-1.36-.89-1.39-2.57-1v1q0,9.89,0,19.78c0,2.36,0,4.73,0,7.09A4.23,4.23,0,0,0,16.35,140C17.81,140.18,19.3,140.06,20.86,140.06ZM137.7,107.74c-1.54-.56-2.2.23-2.79,1.28a37.78,37.78,0,0,0-4.13,13c-.67,4.61-1,9.26-1.46,13.89-.13,1.37,0,2.75,0,4.17,1.49,0,2.94.08,4.37,0a4,4,0,0,0,3.75-3,7.89,7.89,0,0,0,.26-2.43q0-12.21,0-24.41ZM12.45,102.08c4.49,0,8.91.06,13.32-.06a4.33,4.33,0,0,0,3.21-6,4.15,4.15,0,0,0-4-2.66c-3.79-.05-7.57,0-11.36,0H12.45Zm125.2-8.7h-12.1A4.4,4.4,0,0,0,121,97.76a4.31,4.31,0,0,0,4.57,4.35c3.72,0,7.44,0,11.15,0,.31,0,.61,0,1,0Z"
                                        transform="translate(-6.96 -9.37)"/></svg>
                            </span>
                                <p>{{$group->short_description}}</p>
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

                                    @foreach($group->products->chunk(2) as $productArray)

                                        <div>
                                            <div class="row m-0">
                                                @foreach($productArray as $product)
                                                    <div class="col-12 px-0">
                                                        @include("frontend.partials.home-product-box",['product'=>$product])
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>

                        @if($group->offers)
                            <div class="section-t-space section-b-space">
                                <div class="row g-md-4 g-3">

                                    @foreach($group->offers as $offer)
                                        <div class="col-md-6">
                                            <div class="banner-contain hover-effect">
                                                <img src="{{$offer->photo?->url}}"
                                                     class="bg-img blur-up lazyload"
                                                     alt="">
                                                <div class="banner-details p-center-left p-4">
                                                    <div>
                                                        <h3 class="text-exo">{{$offer->title_1}}</h3>
                                                        <h4 class="text-russo fw-normal theme-color mb-2">{{$offer->title_2}}</h4>
                                                        <button onclick="location.href = '{{$offer->url}}';"
                                                                class="btn btn-animation btn-sm mend-auto">Ko'rish <i
                                                                class="fa-solid fa-arrow-right icon"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        @endif

                    @endforeach




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



                    {{--                    <div class="title d-block">--}}
                    {{--                        <h2>Food Cupboard</h2>--}}
                    {{--                        <span class="title-leaf">--}}
                    {{--                            <svg class="icon-width">--}}
                    {{--                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>--}}
                    {{--                            </svg>--}}
                    {{--                        </span>--}}
                    {{--                        <p>A virtual assistant collects the products from your list</p>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="product-border overflow-hidden wow fadeInUp">--}}
                    {{--                        --}}{{--                        <div class="product-box-slider no-arrow">--}}
                    {{--                        --}}{{--                            <div>--}}
                    {{--                        --}}{{--                                <div class="row m-0">--}}
                    {{--                        --}}{{--                                    <div class="col-12 px-0">--}}
                    {{--                        --}}{{--                                        @include("frontend.partials.home-product-box")--}}
                    {{--                        --}}{{--                                    </div>--}}
                    {{--                        --}}{{--                                </div>--}}
                    {{--                        --}}{{--                            </div>--}}

                    {{--                        --}}{{--                            <div>--}}
                    {{--                        --}}{{--                                <div class="row m-0">--}}
                    {{--                        --}}{{--                                    <div class="col-12 px-0">--}}
                    {{--                        --}}{{--                                        @include("frontend.partials.home-product-box")--}}
                    {{--                        --}}{{--                                    </div>--}}
                    {{--                        --}}{{--                                </div>--}}
                    {{--                        --}}{{--                            </div>--}}

                    {{--                        --}}{{--                            <div>--}}
                    {{--                        --}}{{--                                <div class="row m-0">--}}
                    {{--                        --}}{{--                                    <div class="col-12 px-0">--}}
                    {{--                        --}}{{--                                        @include("frontend.partials.home-product-box")--}}
                    {{--                        --}}{{--                                    </div>--}}
                    {{--                        --}}{{--                                </div>--}}
                    {{--                        --}}{{--                            </div>--}}

                    {{--                        --}}{{--                            <div>--}}
                    {{--                        --}}{{--                                <div class="row m-0">--}}
                    {{--                        --}}{{--                                    <div class="col-12 px-0">--}}
                    {{--                        --}}{{--                                        @include("frontend.partials.home-product-box")--}}
                    {{--                        --}}{{--                                    </div>--}}
                    {{--                        --}}{{--                                </div>--}}
                    {{--                        --}}{{--                            </div>--}}

                    {{--                        --}}{{--                            <div>--}}
                    {{--                        --}}{{--                                <div class="row m-0">--}}
                    {{--                        --}}{{--                                    <div class="col-12 px-0">--}}
                    {{--                        --}}{{--                                        @include("frontend.partials.home-product-box")--}}
                    {{--                        --}}{{--                                    </div>--}}
                    {{--                        --}}{{--                                </div>--}}
                    {{--                        --}}{{--                            </div>--}}

                    {{--                        --}}{{--                            <div>--}}
                    {{--                        --}}{{--                                <div class="row m-0">--}}
                    {{--                        --}}{{--                                    <div class="col-12 px-0">--}}
                    {{--                        --}}{{--                                        @include("frontend.partials.home-product-box")--}}
                    {{--                        --}}{{--                                    </div>--}}
                    {{--                        --}}{{--                                </div>--}}
                    {{--                        --}}{{--                            </div>--}}
                    {{--                        --}}{{--                        </div>--}}
                    {{--                    </div>--}}

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
                        <h2>Yangiliklar va Blog</h2>
                        <span class="title-leaf">
                                 <svg class="icon-width" id="Layer_1" data-name="Layer 1"
                                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136.17 136.2"><path
                                         d="M119.6,106a9.86,9.86,0,0,1-1.46-15.14c-1.69-1.06-3.42-2.08-5.07-3.21a53.55,53.55,0,0,1-17-19.48A72.64,72.64,0,0,1,89.31,49a101.3,101.3,0,0,1-2.15-18.86c0-.31,0-.62,0-1H63c-.08,1.53-.15,3-.24,4.54a93.39,93.39,0,0,1-3.61,21.57C56,66,50.74,75.52,42.47,83.23a50,50,0,0,1-10.19,7.31c-.11.06-.22.12-.37.22A9.9,9.9,0,0,1,30.4,106a33.55,33.55,0,0,1,5.27,9,55.17,55.17,0,0,1,3.54,14.06c.39,3.28.65,6.59.79,9.89a6.07,6.07,0,0,1-6.21,6.53c-5.84.06-11.68.08-17.52,0A9.74,9.74,0,0,1,7,135.6q0-23.35,0-46.69Q7,64.81,7,40.7,7,29.95,7,19.2a9.72,9.72,0,0,1,9.78-9.8c13.29,0,26.58,0,39.87,0H93.57q19.83,0,39.68,0a9.77,9.77,0,0,1,9.86,9.93V64.86q0,21.31,0,42.62v28.13a9.76,9.76,0,0,1-9.7,9.91c-5.68.07-11.36,0-17.05,0a6.19,6.19,0,0,1-6.2-5.06,10,10,0,0,1-.1-2.45c.34-7.87,1.37-15.63,4.35-23a38.62,38.62,0,0,1,2.26-4.67C117.54,108.85,118.59,107.46,119.6,106Zm18-18.14V29.15H112c0,.4,0,.74,0,1.08a119.89,119.89,0,0,0,3.23,26.21,65.29,65.29,0,0,0,8.24,19.88,36.77,36.77,0,0,0,10,10.57A5.23,5.23,0,0,0,137.63,87.82Zm-125.18,0a5.15,5.15,0,0,0,4.1-.88,35.76,35.76,0,0,0,9.92-10.4C32.16,67.79,35,58,36.54,47.82,37.26,43,37.56,38,38,33.15c.12-1.33,0-2.68,0-4H12.45ZM137.7,23.59c0-1.31,0-2.51,0-3.7,0-3.31-1.65-5.05-5-5.07-8.49,0-17,0-25.48,0H30.53c-4.51,0-9,0-13.54,0-2.17,0-4.08,1.26-4.37,3.2a39.72,39.72,0,0,0,0,5.57ZM24.44,87.94c.32-.1.66-.17,1-.29a36.74,36.74,0,0,0,10.24-5.78c11-8.66,16.68-20.4,19.68-33.72a94.42,94.42,0,0,0,2-14.78c.09-1.4,0-2.81,0-4.24H43.57c0,.39,0,.73,0,1.07-.13,2.77-.18,5.55-.41,8.32a122.62,122.62,0,0,1-2.39,16.72A76.09,76.09,0,0,1,33,76.51,53.93,53.93,0,0,1,24.44,87.94ZM125.66,88l.09-.23c-1-1-1.93-2-2.84-3a56.57,56.57,0,0,1-10.52-18.85,82.89,82.89,0,0,1-4.2-17.49c-.54-4.38-.94-8.77-1.33-13.15-.18-2-.21-4.08-.3-6.1H92.64c0,.44,0,.78,0,1.13A95.93,95.93,0,0,0,94.34,46a67,67,0,0,0,8,21.85A47,47,0,0,0,122,86.49C123.21,87.07,124.45,87.51,125.66,88Zm-99,52.08h6.49c1.3,0,1.51-.19,1.46-1.46a70.73,70.73,0,0,0-2.74-18.17A32.57,32.57,0,0,0,26,109.2c-1.53-1.87-3.34-1.69-5.39-1.55a49.79,49.79,0,0,1,4.43,15.84C25.73,129,26.11,134.46,26.62,140.09Zm97.06,0c.47-11.15,1.08-22.15,5.75-32.49a20.41,20.41,0,0,1-2.36,0,2.61,2.61,0,0,0-2.25.94,22,22,0,0,0-4.47,6.51c-3.57,7.64-4.51,15.81-4.86,24.09a.87.87,0,0,0,.94,1Zm-102.82,0V139a99.28,99.28,0,0,0-1.94-19.15A34.92,34.92,0,0,0,15,108.77c-.81-1.36-.89-1.39-2.57-1v1q0,9.89,0,19.78c0,2.36,0,4.73,0,7.09A4.23,4.23,0,0,0,16.35,140C17.81,140.18,19.3,140.06,20.86,140.06ZM137.7,107.74c-1.54-.56-2.2.23-2.79,1.28a37.78,37.78,0,0,0-4.13,13c-.67,4.61-1,9.26-1.46,13.89-.13,1.37,0,2.75,0,4.17,1.49,0,2.94.08,4.37,0a4,4,0,0,0,3.75-3,7.89,7.89,0,0,0,.26-2.43q0-12.21,0-24.41ZM12.45,102.08c4.49,0,8.91.06,13.32-.06a4.33,4.33,0,0,0,3.21-6,4.15,4.15,0,0,0-4-2.66c-3.79-.05-7.57,0-11.36,0H12.45Zm125.2-8.7h-12.1A4.4,4.4,0,0,0,121,97.76a4.31,4.31,0,0,0,4.57,4.35c3.72,0,7.44,0,11.15,0,.31,0,.61,0,1,0Z"
                                         transform="translate(-6.96 -9.37)"/></svg>
                        </span>
                        <p>Bu yerda yangiliklarimizdan boxabar bo'lasiz</p>
                    </div>

                    <div class="slider-3-blog ratio_65 no-arrow product-wrapper">
                        @foreach($posts as $post)

                            <div>
                                <div class="blog-box">
                                    <div class="blog-box-image">
                                        <a href="{{$post->url}}" class="blog-image">
                                            <img src="{{$post->card_photo->url??""}}" class="bg-img blur-up lazyload"
                                                 alt="">
                                        </a>
                                    </div>

                                    <a href="{{$post->url}}" class="blog-detail">
                                        <h6>{{$post->created_at->format("d.m.Y")}}</h6>
                                        <h5>{{$post->title}}</h5>
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
