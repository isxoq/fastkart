@extends("layouts.frontend")


@section("content")
    @include('layouts.breadcrumb',[
    "name"=>"Qidiruv: ".request()->get("q"),
    "items"=>[
        [
            "name"=>"Qidiruv",
            "url"=>"/search"
],
        [
            "name"=>request()->get("q")
]
]
      ])
    <section class="search-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 mx-auto">
                    <div class="title d-block text-center">
                        <h2>Mahsulotlarni qidirish</h2>
                        <span class="title-leaf">
                              <svg class="icon-width" id="Layer_1" data-name="Layer 1"
                                   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136.17 136.2"><path
                                      d="M119.6,106a9.86,9.86,0,0,1-1.46-15.14c-1.69-1.06-3.42-2.08-5.07-3.21a53.55,53.55,0,0,1-17-19.48A72.64,72.64,0,0,1,89.31,49a101.3,101.3,0,0,1-2.15-18.86c0-.31,0-.62,0-1H63c-.08,1.53-.15,3-.24,4.54a93.39,93.39,0,0,1-3.61,21.57C56,66,50.74,75.52,42.47,83.23a50,50,0,0,1-10.19,7.31c-.11.06-.22.12-.37.22A9.9,9.9,0,0,1,30.4,106a33.55,33.55,0,0,1,5.27,9,55.17,55.17,0,0,1,3.54,14.06c.39,3.28.65,6.59.79,9.89a6.07,6.07,0,0,1-6.21,6.53c-5.84.06-11.68.08-17.52,0A9.74,9.74,0,0,1,7,135.6q0-23.35,0-46.69Q7,64.81,7,40.7,7,29.95,7,19.2a9.72,9.72,0,0,1,9.78-9.8c13.29,0,26.58,0,39.87,0H93.57q19.83,0,39.68,0a9.77,9.77,0,0,1,9.86,9.93V64.86q0,21.31,0,42.62v28.13a9.76,9.76,0,0,1-9.7,9.91c-5.68.07-11.36,0-17.05,0a6.19,6.19,0,0,1-6.2-5.06,10,10,0,0,1-.1-2.45c.34-7.87,1.37-15.63,4.35-23a38.62,38.62,0,0,1,2.26-4.67C117.54,108.85,118.59,107.46,119.6,106Zm18-18.14V29.15H112c0,.4,0,.74,0,1.08a119.89,119.89,0,0,0,3.23,26.21,65.29,65.29,0,0,0,8.24,19.88,36.77,36.77,0,0,0,10,10.57A5.23,5.23,0,0,0,137.63,87.82Zm-125.18,0a5.15,5.15,0,0,0,4.1-.88,35.76,35.76,0,0,0,9.92-10.4C32.16,67.79,35,58,36.54,47.82,37.26,43,37.56,38,38,33.15c.12-1.33,0-2.68,0-4H12.45ZM137.7,23.59c0-1.31,0-2.51,0-3.7,0-3.31-1.65-5.05-5-5.07-8.49,0-17,0-25.48,0H30.53c-4.51,0-9,0-13.54,0-2.17,0-4.08,1.26-4.37,3.2a39.72,39.72,0,0,0,0,5.57ZM24.44,87.94c.32-.1.66-.17,1-.29a36.74,36.74,0,0,0,10.24-5.78c11-8.66,16.68-20.4,19.68-33.72a94.42,94.42,0,0,0,2-14.78c.09-1.4,0-2.81,0-4.24H43.57c0,.39,0,.73,0,1.07-.13,2.77-.18,5.55-.41,8.32a122.62,122.62,0,0,1-2.39,16.72A76.09,76.09,0,0,1,33,76.51,53.93,53.93,0,0,1,24.44,87.94ZM125.66,88l.09-.23c-1-1-1.93-2-2.84-3a56.57,56.57,0,0,1-10.52-18.85,82.89,82.89,0,0,1-4.2-17.49c-.54-4.38-.94-8.77-1.33-13.15-.18-2-.21-4.08-.3-6.1H92.64c0,.44,0,.78,0,1.13A95.93,95.93,0,0,0,94.34,46a67,67,0,0,0,8,21.85A47,47,0,0,0,122,86.49C123.21,87.07,124.45,87.51,125.66,88Zm-99,52.08h6.49c1.3,0,1.51-.19,1.46-1.46a70.73,70.73,0,0,0-2.74-18.17A32.57,32.57,0,0,0,26,109.2c-1.53-1.87-3.34-1.69-5.39-1.55a49.79,49.79,0,0,1,4.43,15.84C25.73,129,26.11,134.46,26.62,140.09Zm97.06,0c.47-11.15,1.08-22.15,5.75-32.49a20.41,20.41,0,0,1-2.36,0,2.61,2.61,0,0,0-2.25.94,22,22,0,0,0-4.47,6.51c-3.57,7.64-4.51,15.81-4.86,24.09a.87.87,0,0,0,.94,1Zm-102.82,0V139a99.28,99.28,0,0,0-1.94-19.15A34.92,34.92,0,0,0,15,108.77c-.81-1.36-.89-1.39-2.57-1v1q0,9.89,0,19.78c0,2.36,0,4.73,0,7.09A4.23,4.23,0,0,0,16.35,140C17.81,140.18,19.3,140.06,20.86,140.06ZM137.7,107.74c-1.54-.56-2.2.23-2.79,1.28a37.78,37.78,0,0,0-4.13,13c-.67,4.61-1,9.26-1.46,13.89-.13,1.37,0,2.75,0,4.17,1.49,0,2.94.08,4.37,0a4,4,0,0,0,3.75-3,7.89,7.89,0,0,0,.26-2.43q0-12.21,0-24.41ZM12.45,102.08c4.49,0,8.91.06,13.32-.06a4.33,4.33,0,0,0,3.21-6,4.15,4.15,0,0,0-4-2.66c-3.79-.05-7.57,0-11.36,0H12.45Zm125.2-8.7h-12.1A4.4,4.4,0,0,0,121,97.76a4.31,4.31,0,0,0,4.57,4.35c3.72,0,7.44,0,11.15,0,.31,0,.61,0,1,0Z"
                                      transform="translate(-6.96 -9.37)"/></svg>
                        </span>
                    </div>

                    <form action="" method="GET">
                        <div class="search-box">
                            <div class="input-group">
                                <input value="{{request()->get("q")}}" type="text" name="q" class="form-control"
                                       placeholder=""
                                       aria-label="Example text with button addon" control-id="ControlID-14">
                                <button class="btn theme-bg-color text-white m-0" type="submit" id="button-addon1"
                                        control-id="ControlID-15">Qidirish
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Section Start -->
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-custome-3">
                    <div class="left-box wow fadeInUp">
                        <div class="shop-left-sidebar">
                            <div class="back-button">
                                <h3><i class="fa-solid fa-arrow-left"></i> Orqaga</h3>
                            </div>
                            <div class="accordion custome-accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                            <span>Narx</span>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse show"
                                         aria-labelledby="headingThree">
                                        <div class="accordion-body">
                                            <div class="range-slider">
                                                <input hidden type="text" id="rangeSlider" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-custome-9">
                    <div class="show-button">
                        <div class="filter-button-group mt-0">
                            <div class="filter-button d-inline-block d-lg-none">
                                <a><i class="fa-solid fa-filter"></i> Filterlar</a>
                            </div>
                        </div>

                        <div class="top-filter-menu">
                            {{--                            <div class="category-dropdown">--}}
                            {{--                                <h5 class="text-content">Sort By :</h5>--}}
                            {{--                                <div class="dropdown">--}}
                            {{--                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"--}}
                            {{--                                            data-bs-toggle="dropdown">--}}
                            {{--                                        <span>Most Popular</span> <i class="fa-solid fa-angle-down"></i>--}}
                            {{--                                    </button>--}}
                            {{--                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
                            {{--                                        <li>--}}
                            {{--                                            <a class="dropdown-item" id="pop" href="javascript:void(0)">Popularity</a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a class="dropdown-item" id="low" href="javascript:void(0)">Low - High--}}
                            {{--                                                Price</a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a class="dropdown-item" id="high" href="javascript:void(0)">High - Low--}}
                            {{--                                                Price</a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a class="dropdown-item" id="rating" href="javascript:void(0)">Average--}}
                            {{--                                                Rating</a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a class="dropdown-item" id="aToz" href="javascript:void(0)">A - Z Order</a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a class="dropdown-item" id="zToa" href="javascript:void(0)">Z - A Order</a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a class="dropdown-item" id="off" href="javascript:void(0)">% Off - Hight To--}}
                            {{--                                                Low</a>--}}
                            {{--                                        </li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="grid-option d-none d-md-block">
                                <ul>
                                    <li class="three-grid">
                                        <a href="javascript:void(0)">
                                            <img src="../assets/svg/grid-3.svg" class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li class="grid-btn d-xxl-inline-block d-none active">
                                        <a href="javascript:void(0)">
                                            <img src="../assets/svg/grid-4.svg"
                                                 class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                            <img src="../assets/svg/grid.svg"
                                                 class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
                                        </a>
                                    </li>
                                    <li class="list-btn">
                                        <a href="javascript:void(0)">
                                            <img src="../assets/svg/list.svg" class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div
                        class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">

                        <?php
                        $time = 0;
                        ?>
                        @foreach($products as $product)
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp" data-wow-delay="{{$time}}s">
                                    @include("frontend.partials.product-box",[
                            "product"=>$product
])
                                </div>
                            </div>
                            <?php
                            $time += 0.05;
                            ?>
                        @endforeach

                    </div>

                    {{ $products->links('frontend.paginator') }}
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
@section("scripts")
    <!-- Price Range Js -->
    <script src="{{asset("assets/js/ion.rangeSlider.min")}}.js"></script>

    <!-- Quantity js -->
    <script src="{{asset("assets/js/quantity-2.js")}}"></script>

    <!-- sidebar open js -->
    <script src="{{asset("assets/js/filter-sidebar.js")}}"></script>

    <script>
        $("#rangeSlider").ionRangeSlider(
            {
                type: "double",
                min: 0,
                max: {{\App\Models\Product::query()->sum("price")}},
                from: {{request()->get("from")??0}},
                to: {{request()->get("to")??\App\Models\Product::query()->sum("price")}},
                grid: true,
                onFinish: function (data) {
                    // Called then action is done and mouse is released


                    // Get the current URL
                    var url = new URL(window.location.href);

                    var params = new URLSearchParams(url.search);

                    params.append('from', data.from);
                    params.append('to', data.to);

                    url.search = params.toString();

                    // console.log(url.search)

                    let currentUrl = window.location.href.split('?')[0];
                    //
                    // let newParams = 'from=' + data.from + '&to=' + data.to;
                    //
                    let newUrl = currentUrl + url.search;
                    //
                    window.location.href = newUrl;

                },

            }
        );
    </script>
@endsection