@extends('layouts.frontend')


@section("content")

    @include('layouts.breadcrumb',[
    "name"=>"Yangiliklar",
    "items"=>[
        [
            "name"=>"Yangiliklar"
]
]
      ])

    <!-- Blog Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                    <div class="row g-4 ratio_65">
                        <?php
                        $time = 0;
                        ?>
                        @foreach($blogs as $blog)

                            <div class="col-xxl-4 col-sm-6">
                                <div class="blog-box wow fadeInUp" data-wow-delay="{{$time}}s">
                                    <div class="blog-image">
                                        <a href="{{$blog->url}}">
                                            <img src="{{$blog->card_photo?->url}}" class="bg-img" alt="">
                                        </a>
                                    </div>

                                    <div class="blog-contain">
                                        <div class="blog-label">
                                            <span class="time"><i
                                                    data-feather="clock"></i> <span>{{$blog->start}}</span></span>
                                            <span class="super"><i data-feather="user"></i> <span>Admin</span></span>
                                        </div>
                                        <a href="blog-detail.html">
                                            <h3>{{$blog->title}}</h3>
                                        </a>
                                        <button onclick="location.href = '{{$blog->url}}';" class="blog-button">Ko'proq
                                            o'qish
                                            <i class="fa-solid fa-right-long"></i></button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $time += 0.05;
                            ?>
                        @endforeach


                    </div>

                    {{ $blogs->links('frontend.paginator') }}

                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 order-lg-1">
                    <div class="left-sidebar-box wow fadeInUp">
                        {{--                        <div class="left-search-box">--}}
                        {{--                            <div class="search-box">--}}
                        {{--                                <input type="search" class="form-control" id="exampleFormControlInput1"--}}
                        {{--                                       placeholder="Search....">--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseOne">
                                        So'ngi
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body pt-0">
                                        <div class="recent-post-box">
                                            @foreach($recentPosts as $post)
                                                <div class="recent-box">
                                                    <a href="{{$post->url}}" class="recent-image">
                                                        <img src="{{$post->card_photo?->thumbnail}}"
                                                             class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="recent-detail">
                                                        <a href="{{$post->url}}">
                                                            <h5 class="recent-name">{{$post->title}}</h5>
                                                        </a>
                                                        <h6>{{$post->start}} </h6>
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

                            {{--                            <div class="accordion-item">--}}
                            {{--                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">--}}
                            {{--                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"--}}
                            {{--                                            data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"--}}
                            {{--                                            aria-controls="panelsStayOpen-collapseFour">--}}
                            {{--                                        Trending Products--}}
                            {{--                                    </button>--}}
                            {{--                                </h2>--}}
                            {{--                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse collapse show"--}}
                            {{--                                     aria-labelledby="panelsStayOpen-headingFour">--}}
                            {{--                                    <div class="accordion-body">--}}
                            {{--                                        <ul class="product-list product-list-2 border-0 p-0">--}}
                            {{--                                            <li>--}}
                            {{--                                                <div class="offer-product">--}}
                            {{--                                                    <a href="shop-left-sidebar.html" class="offer-image">--}}
                            {{--                                                        <img src="../assets/images/vegetable/product/23.png"--}}
                            {{--                                                             class="blur-up lazyload" alt="">--}}
                            {{--                                                    </a>--}}

                            {{--                                                    <div class="offer-detail">--}}
                            {{--                                                        <div>--}}
                            {{--                                                            <a href="shop-left-sidebar.html">--}}
                            {{--                                                                <h6 class="name">Meatigo Premium Goat Curry</h6>--}}
                            {{--                                                            </a>--}}
                            {{--                                                            <span>450 G</span>--}}
                            {{--                                                            <h6 class="price theme-color">$ 70.00</h6>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </li>--}}

                            {{--                                            <li>--}}
                            {{--                                                <div class="offer-product">--}}
                            {{--                                                    <a href="shop-left-sidebar.html" class="offer-image">--}}
                            {{--                                                        <img src="../assets/images/vegetable/product/24.png"--}}
                            {{--                                                             class="blur-up lazyload" alt="">--}}
                            {{--                                                    </a>--}}

                            {{--                                                    <div class="offer-detail">--}}
                            {{--                                                        <div>--}}
                            {{--                                                            <a href="shop-left-sidebar.html">--}}
                            {{--                                                                <h6 class="name">Dates Medjoul Premium Imported</h6>--}}
                            {{--                                                            </a>--}}
                            {{--                                                            <span>450 G</span>--}}
                            {{--                                                            <h6 class="price theme-color">$ 40.00</h6>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </li>--}}

                            {{--                                            <li class="mb-0">--}}
                            {{--                                                <div class="offer-product">--}}
                            {{--                                                    <a href="shop-left-sidebar.html" class="offer-image">--}}
                            {{--                                                        <img src="../assets/images/vegetable/product/26.png"--}}
                            {{--                                                             class="blur-up lazyload" alt="">--}}
                            {{--                                                    </a>--}}

                            {{--                                                    <div class="offer-detail">--}}
                            {{--                                                        <div>--}}
                            {{--                                                            <a href="shop-left-sidebar.html">--}}
                            {{--                                                                <h6 class="name">Apple Red Premium Imported</h6>--}}
                            {{--                                                            </a>--}}
                            {{--                                                            <span>1 KG</span>--}}
                            {{--                                                            <h6 class="price theme-color">$ 80.00</h6>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </li>--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
