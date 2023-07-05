<?php

$recentPosts = \App\Models\Blog::query()->limit(4)->latest("start")->get();
$trendingProducts = trendingProducts();

?>


@extends("layouts.frontend")


@section("content")
    @include('layouts.breadcrumb',[
    "name"=>$blog->title,
    "items"=>[
        [
            "name"=>"Yangiliklar",
            "url"=>"/blog"
],
        [
            "name"=>$blog->title
]
]
      ])
    <!-- Blog Details Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 col-lg-5 d-lg-block d-none">
                    <div class="left-sidebar-box">
                        {{--                        <div class="left-search-box">--}}
                        {{--                            <div class="search-box">--}}
                        {{--                                <input type="search" class="form-control" id="exampleFormControlInput4"--}}
                        {{--                                       placeholder="Search....">--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseOne">
                                        So'nggi
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body pt-0">
                                        <div class="recent-post-box">
                                            @foreach($recentPosts as $post)
                                                <div class="recent-box">
                                                    <a href="{{$post->url}}" class="recent-image">
                                                        <img src="{{$post->card_photo?->url}}"
                                                             class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="recent-detail">
                                                        <a href="{{$post->url}}">
                                                            <h5 class="recent-name">{{$post->title}}</h5>
                                                        </a>
                                                        <h6>{{$post->start}}
                                                            {{--                                                            <i data-feather="thumbs-up"></i>--}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="accordion-item">--}}
                            {{--                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">--}}
                            {{--                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"--}}
                            {{--                                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"--}}
                            {{--                                            aria-controls="panelsStayOpen-collapseTwo">--}}
                            {{--                                        Category--}}
                            {{--                                    </button>--}}
                            {{--                                </h2>--}}
                            {{--                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse collapse show"--}}
                            {{--                                     aria-labelledby="panelsStayOpen-headingTwo">--}}
                            {{--                                    <div class="accordion-body p-0">--}}
                            {{--                                        <div class="category-list-box">--}}
                            {{--                                            <ul>--}}
                            {{--                                                <li>--}}
                            {{--                                                    <a href="blog-list.html">--}}
                            {{--                                                        <div class="category-name">--}}
                            {{--                                                            <h5>Latest Recipes</h5>--}}
                            {{--                                                            <span>10</span>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="blog-list.html">--}}
                            {{--                                                        <div class="category-name">--}}
                            {{--                                                            <h5>Diet Food</h5>--}}
                            {{--                                                            <span>6</span>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="blog-list.html">--}}
                            {{--                                                        <div class="category-name">--}}
                            {{--                                                            <h5>Low calorie Items</h5>--}}
                            {{--                                                            <span>8</span>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="blog-list.html">--}}
                            {{--                                                        <div class="category-name">--}}
                            {{--                                                            <h5>Cooking Method</h5>--}}
                            {{--                                                            <span>9</span>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="blog-list.html">--}}
                            {{--                                                        <div class="category-name">--}}
                            {{--                                                            <h5>Dairy Free</h5>--}}
                            {{--                                                            <span>12</span>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="blog-list.html">--}}
                            {{--                                                        <div class="category-name">--}}
                            {{--                                                            <h5>Vegetarian Food</h5>--}}
                            {{--                                                            <span>10</span>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </a>--}}
                            {{--                                                </li>--}}
                            {{--                                            </ul>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="accordion-item">--}}
                            {{--                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">--}}
                            {{--                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"--}}
                            {{--                                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"--}}
                            {{--                                            aria-controls="panelsStayOpen-collapseThree">--}}
                            {{--                                        Product Tags--}}
                            {{--                                    </button>--}}
                            {{--                                </h2>--}}
                            {{--                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse collapse show"--}}
                            {{--                                     aria-labelledby="panelsStayOpen-headingThree">--}}
                            {{--                                    <div class="accordion-body pt-0">--}}
                            {{--                                        <div class="product-tags-box">--}}
                            {{--                                            <ul>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="javascript:void(0)">Fruit Cutting</a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="javascript:void(0)">Meat</a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="javascript:void(0)">organic</a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="javascript:void(0)">cake</a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="javascript:void(0)">pick fruit</a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="javascript:void(0)">backery</a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="javascript:void(0)">organix food</a>--}}
                            {{--                                                </li>--}}

                            {{--                                                <li>--}}
                            {{--                                                    <a href="javascript:void(0)">Most Expensive Fruit</a>--}}
                            {{--                                                </li>--}}
                            {{--                                            </ul>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseFour">
                                        Trend mahsulotlar
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body">
                                        <ul class="product-list product-list-2 border-0 p-0">

                                            @foreach($trendingProducts as $product)
                                                <li>
                                                    <div class="offer-product">
                                                        <a href="{{$product->detailUrl}}" class="offer-image">
                                                            <img src="{{$product->card_photo?->url}}"
                                                                 class="blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="offer-detail">
                                                            <div>
                                                                <a href="{{$product->detailUrl}}">
                                                                    <h6 class="name">{{$product->name}}</h6>
                                                                </a>
                                                                <span>450 G</span>
                                                                <h6 class="price theme-color">
                                                                    UZS {{$product->productPrice}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8 col-lg-7 ratio_50">
                    <div class="blog-detail-image rounded-3 mb-4">
                        <img src="{{$blog->photo?->url}}" class="bg-img blur-up lazyload" alt="">
                        <div class="blog-image-contain">
                            {{--                            <ul class="contain-list">--}}
                            {{--                                <li>backpack</li>--}}
                            {{--                                <li>life style</li>--}}
                            {{--                                <li>organic</li>--}}
                            {{--                            </ul>--}}
                            <h2>{{$blog->title}}</h2>
                            <ul class="contain-comment-list">
                                <li>
                                    <div class="user-list">
                                        <i data-feather="user"></i>
                                        <span>Admin</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="user-list">
                                        <i data-feather="calendar"></i>
                                        <span>{{$blog->start}}</span>
                                    </div>
                                </li>

                                {{--                                <li>--}}
                                {{--                                    <div class="user-list">--}}
                                {{--                                        <i data-feather="message-square"></i>--}}
                                {{--                                        <span>82 Comment</span>--}}
                                {{--                                    </div>--}}
                                {{--                                </li>--}}
                            </ul>
                        </div>
                    </div>

                    <div class="blog-detail-contain">
                        {!! $blog->description !!}
                    </div>

                    {{--                    <div class="comment-box overflow-hidden">--}}
                    {{--                        <div class="leave-title">--}}
                    {{--                            <h3>Comments</h3>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="user-comment-box">--}}
                    {{--                            <ul>--}}
                    {{--                                <li>--}}
                    {{--                                    <div class="user-box border-color">--}}
                    {{--                                        <div class="reply-button">--}}
                    {{--                                            <i class="fa-solid fa-reply"></i>--}}
                    {{--                                            <span class="theme-color">Reply</span>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="user-iamge">--}}
                    {{--                                            <img src="../assets/images/inner-page/user/1.jpg"--}}
                    {{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
                    {{--                                            <div class="user-name">--}}
                    {{--                                                <h6>30 Jan, 2022</h6>--}}
                    {{--                                                <h5 class="text-content">Glenn Greer</h5>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}

                    {{--                                        <div class="user-contain">--}}
                    {{--                                            <p>"This proposal is a win-win situation which will cause a stellar paradigm--}}
                    {{--                                                shift, and produce a multi-fold increase in deliverables a better--}}
                    {{--                                                understanding"</p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li>--}}
                    {{--                                    <div class="user-box border-color">--}}
                    {{--                                        <div class="reply-button">--}}
                    {{--                                            <i class="fa-solid fa-reply"></i>--}}
                    {{--                                            <span class="theme-color">Reply</span>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="user-iamge">--}}
                    {{--                                            <img src="../assets/images/inner-page/user/2.jpg"--}}
                    {{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
                    {{--                                            <div class="user-name">--}}
                    {{--                                                <h6>30 Jan, 2022</h6>--}}
                    {{--                                                <h5 class="text-content">Glenn Greer</h5>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}

                    {{--                                        <div class="user-contain">--}}
                    {{--                                            <p>"Yeah, I think maybe you do. Right, gimme a Pepsi free. Of course, the--}}
                    {{--                                                Enchantment Under The Sea Dance they're supposed to go to this, that's--}}
                    {{--                                                where they kiss for the first time. You'll find out. Are you sure about--}}
                    {{--                                                this storm?"</p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}

                    {{--                                <li class="li-padding">--}}
                    {{--                                    <div class="user-box">--}}
                    {{--                                        <div class="reply-button">--}}
                    {{--                                            <i class="fa-solid fa-reply"></i>--}}
                    {{--                                            <span class="theme-color">Reply</span>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="user-iamge">--}}
                    {{--                                            <img src="../assets/images/inner-page/user/3.jpg"--}}
                    {{--                                                 class="img-fluid blur-up lazyload" alt="">--}}
                    {{--                                            <div class="user-name">--}}
                    {{--                                                <h6>30 Jan, 2022</h6>--}}
                    {{--                                                <h5 class="text-content">Glenn Greer</h5>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}

                    {{--                                        <div class="user-contain">--}}
                    {{--                                            <p>"Cheese slices goat cottage cheese roquefort cream cheese pecorino cheesy--}}
                    {{--                                                feet when the cheese comes out everybody's happy"</p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="leave-box">--}}
                    {{--                        <div class="leave-title mt-0">--}}
                    {{--                            <h3>Leave Comment</h3>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="leave-comment">--}}
                    {{--                            <div class="comment-notes">--}}
                    {{--                                <p class="text-content mb-4">Your email address will not be published. Required fields--}}
                    {{--                                    are marked</p>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="row g-3">--}}
                    {{--                                <div class="col-xxl-4 col-lg-12 col-sm-6">--}}
                    {{--                                    <div class="blog-input">--}}
                    {{--                                        <input type="text" class="form-control" id="exampleFormControlInput1"--}}
                    {{--                                               placeholder="Full Name">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}

                    {{--                                <div class="col-xxl-4 col-lg-12 col-sm-6">--}}
                    {{--                                    <div class="blog-input">--}}
                    {{--                                        <input type="email" class="form-control" id="exampleFormControlInput2"--}}
                    {{--                                               placeholder="Enter Email Address">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}

                    {{--                                <div class="col-xxl-4 col-lg-12 col-sm-6">--}}
                    {{--                                    <div class="blog-input">--}}
                    {{--                                        <input type="url" class="form-control" id="exampleFormControlInput3"--}}
                    {{--                                               placeholder="Enter URL">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}

                    {{--                                <div class="col-12">--}}
                    {{--                                    <div class="blog-input">--}}
                    {{--                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"--}}
                    {{--                                                  placeholder="Comments"></textarea>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <div class="form-check d-flex mt-4 p-0">--}}
                    {{--                                <input class="checkbox_animated" type="checkbox" value="" id="flexCheckDefault">--}}
                    {{--                                <label class="form-check-label text-content" for="flexCheckDefault">--}}
                    {{--                                    <span class="color color-1"> Save my name, email, and website in this--}}
                    {{--                                        browser for the next time I comment.</span>--}}
                    {{--                                </label>--}}
                    {{--                            </div>--}}

                    {{--                            <button class="btn btn-animation ms-xxl-auto mt-xxl-0 mt-3 btn-md fw-bold">Post--}}
                    {{--                                Comment</button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection



