@extends("layouts.frontend")

@section("content")
    @include('layouts.breadcrumb',[
        "name"=>$product->name,
        "items"=>[

            [
                "name"=>$product->category->name,
                "url"=>$product->category->url()
],
[
                "name"=>$product->name
]
]
          ])

    <!-- Product Left Sidebar Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                        <div class="product-main-2 no-arrow">
                                            @foreach($product->photos as $photo)
                                                <div>
                                                    <div class="slider-image">
                                                        <img src="{{$photo->url}}"
                                                             id="img-{{$product->id."-".$photo->id}}"
                                                             data-zoom-image="{{$photo->url}}"
                                                             class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                        <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                            @foreach($product->photos as $photo)
                                                <div>
                                                    <div class="sidebar-image">
                                                        <img src="{{$photo->thumbnail}}"
                                                             class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                @if($product->salePercentage)
                                    <h6 class="offer-top">{{$product->salePercentage}}% Off</h6>
                                @endif
                                <h2 class="name">{{$product->name}}</h2>
                                <div class="price-rating">
                                    <h3 class="theme-color price">${{$product->productPrice}}
                                        @if($product->salePercentage)
                                            <del class="text-content">${{$product->price}}</del>
                                            <span
                                                class="offer theme-color">({{$product->salePercentage}}% off)</span>
                                        @endif
                                    </h3>
                                    {{--                                    <div class="product-rating custom-rate">--}}
                                    {{--                                        <ul class="rating">--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <i data-feather="star" class="fill"></i>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <i data-feather="star" class="fill"></i>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <i data-feather="star" class="fill"></i>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <i data-feather="star" class="fill"></i>--}}
                                    {{--                                            </li>--}}
                                    {{--                                            <li>--}}
                                    {{--                                                <i data-feather="star"></i>--}}
                                    {{--                                            </li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                        <span class="review">23 Customer Review</span>--}}
                                    {{--                                    </div>--}}
                                </div>

                                <div class="procuct-contain">
                                    <p>
                                        {{$product->short_description}}
                                    </p>
                                </div>

                                {{--                                <div class="product-packege">--}}
                                {{--                                    <div class="product-title">--}}
                                {{--                                        <h4>Weight</h4>--}}
                                {{--                                    </div>--}}
                                {{--                                    <ul class="select-packege">--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)" class="active">1/2 KG</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">1 KG</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">1.5 KG</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">Red Roses</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">With Pink Roses</a>--}}
                                {{--                                        </li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}


                                @if($product->salePercentage)

                                    <div class="time deal-timer product-deal-timer mx-md-0 mx-auto" id="clockdiv-1"
                                         data-hours="1" data-minutes="2" data-seconds="59"
                                         data-datetime="{{$product->endDifferentTime()['end']}}">
                                        <div class="product-title">
                                            <h4>Shoshiling! Ulgurib qoling!</h4>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="counter d-block">
                                                    <div class="days d-block">
                                                        <h5></h5>
                                                    </div>
                                                    <h6>Days</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter d-block">
                                                    <div class="hours d-block">
                                                        <h5></h5>
                                                    </div>
                                                    <h6>Hours</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter d-block">
                                                    <div class="minutes d-block">
                                                        <h5></h5>
                                                    </div>
                                                    <h6>Min</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter d-block">
                                                    <div class="seconds d-block">
                                                        <h5></h5>
                                                    </div>
                                                    <h6>Sec</h6>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endif


                                <div class="note-box product-packege">
                                    {{--                                    <div class="cart_qty qty-box product-qty">--}}
                                    {{--                                        <div class="input-group">--}}
                                    {{--                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">--}}
                                    {{--                                                <i class="fa fa-plus" aria-hidden="true"></i>--}}
                                    {{--                                            </button>--}}
                                    {{--                                            <input class="form-control input-number qty-input" type="text"--}}
                                    {{--                                                   name="quantity" value="0">--}}
                                    {{--                                            <button type="button" class="qty-left-minus" data-type="minus"--}}
                                    {{--                                                    data-field="">--}}
                                    {{--                                                <i class="fa fa-minus" aria-hidden="true"></i>--}}
                                    {{--                                            </button>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <button onclick="location.href = 'cart.html';"--}}
                                    {{--                                            class="btn btn-md bg-dark cart-button text-white w-100">Add To Cart</button>--}}
                                </div>

                                {{--                                <div class="buy-box">--}}
                                {{--                                    <a href="wishlist.html">--}}
                                {{--                                        <i data-feather="heart"></i>--}}
                                {{--                                        <span>Add To Wishlist</span>--}}
                                {{--                                    </a>--}}

                                {{--                                    <a href="compare.html">--}}
                                {{--                                        <i data-feather="shuffle"></i>--}}
                                {{--                                        <span>Add To Compare</span>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="pickup-box">--}}
                                {{--                                    <div class="product-title">--}}
                                {{--                                        <h4>Store Information</h4>--}}
                                {{--                                    </div>--}}

                                {{--                                    <div class="pickup-detail">--}}
                                {{--                                        <h4 class="text-content">Lollipop cake chocolate chocolate cake dessert jujubes.--}}
                                {{--                                            Shortbread sugar plum dessert powder cookie sweet brownie.</h4>--}}
                                {{--                                    </div>--}}

                                {{--                                    <div class="product-info">--}}
                                {{--                                        <ul class="product-info-list product-info-list-2">--}}
                                {{--                                            <li>Type : <a href="javascript:void(0)">Black Forest</a></li>--}}
                                {{--                                            <li>SKU : <a href="javascript:void(0)">SDFVW65467</a></li>--}}
                                {{--                                            <li>MFG : <a href="javascript:void(0)">Jun 4, 2022</a></li>--}}
                                {{--                                            <li>Stock : <a href="javascript:void(0)">2 Items Left</a></li>--}}
                                {{--                                            <li>Tags : <a href="javascript:void(0)">Cake,</a> <a--}}
                                {{--                                                    href="javascript:void(0)">Backery</a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="paymnet-option">--}}
                                {{--                                    <div class="product-title">--}}
                                {{--                                        <h4>Guaranteed Safe Checkout</h4>--}}
                                {{--                                    </div>--}}
                                {{--                                    <ul>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">--}}
                                {{--                                                <img src="../assets/images/product/payment/1.svg"--}}
                                {{--                                                     class="blur-up lazyload" alt="">--}}
                                {{--                                            </a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">--}}
                                {{--                                                <img src="../assets/images/product/payment/2.svg"--}}
                                {{--                                                     class="blur-up lazyload" alt="">--}}
                                {{--                                            </a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">--}}
                                {{--                                                <img src="../assets/images/product/payment/3.svg"--}}
                                {{--                                                     class="blur-up lazyload" alt="">--}}
                                {{--                                            </a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">--}}
                                {{--                                                <img src="../assets/images/product/payment/4.svg"--}}
                                {{--                                                     class="blur-up lazyload" alt="">--}}
                                {{--                                            </a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <a href="javascript:void(0)">--}}
                                {{--                                                <img src="../assets/images/product/payment/5.svg"--}}
                                {{--                                                     class="blur-up lazyload" alt="">--}}
                                {{--                                            </a>--}}
                                {{--                                        </li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                                data-bs-target="#description" type="button" role="tab"
                                                aria-controls="description" aria-selected="true">Tavsif
                                        </button>
                                    </li>

                                    {{--                                    <li class="nav-item" role="presentation">--}}
                                    {{--                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"--}}
                                    {{--                                                data-bs-target="#info" type="button" role="tab" aria-controls="info"--}}
                                    {{--                                                aria-selected="false">Additional info--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </li>--}}

                                    {{--                                    <li class="nav-item" role="presentation">--}}
                                    {{--                                        <button class="nav-link" id="care-tab" data-bs-toggle="tab"--}}
                                    {{--                                                data-bs-target="#care" type="button" role="tab" aria-controls="care"--}}
                                    {{--                                                aria-selected="false">Care Instuctions--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </li>--}}

                                    {{--                                    <li class="nav-item" role="presentation">--}}
                                    {{--                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"--}}
                                    {{--                                                data-bs-target="#review" type="button" role="tab" aria-controls="review"--}}
                                    {{--                                                aria-selected="false">Review--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </li>--}}
                                </ul>

                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                         aria-labelledby="description-tab">
                                        <div class="product-description">
                                            {!! $product->description !!}
                                        </div>
                                    </div>

                                    {{--                                    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">--}}
                                    {{--                                        <div class="table-responsive">--}}
                                    {{--                                            <table class="table info-table">--}}
                                    {{--                                                <tbody>--}}
                                    {{--                                                <tr>--}}
                                    {{--                                                    <td>Specialty</td>--}}
                                    {{--                                                    <td>Vegetarian</td>--}}
                                    {{--                                                </tr>--}}
                                    {{--                                                <tr>--}}
                                    {{--                                                    <td>Ingredient Type</td>--}}
                                    {{--                                                    <td>Vegetarian</td>--}}
                                    {{--                                                </tr>--}}
                                    {{--                                                <tr>--}}
                                    {{--                                                    <td>Brand</td>--}}
                                    {{--                                                    <td>Lavian Exotique</td>--}}
                                    {{--                                                </tr>--}}
                                    {{--                                                <tr>--}}
                                    {{--                                                    <td>Form</td>--}}
                                    {{--                                                    <td>Bar Brownie</td>--}}
                                    {{--                                                </tr>--}}
                                    {{--                                                <tr>--}}
                                    {{--                                                    <td>Package Information</td>--}}
                                    {{--                                                    <td>Box</td>--}}
                                    {{--                                                </tr>--}}
                                    {{--                                                <tr>--}}
                                    {{--                                                    <td>Manufacturer</td>--}}
                                    {{--                                                    <td>Prayagh Nutri Product Pvt Ltd</td>--}}
                                    {{--                                                </tr>--}}
                                    {{--                                                <tr>--}}
                                    {{--                                                    <td>Item part number</td>--}}
                                    {{--                                                    <td>LE 014 - 20pcs Crème Bakes (Pack of 2)</td>--}}
                                    {{--                                                </tr>--}}
                                    {{--                                                <tr>--}}
                                    {{--                                                    <td>Net Quantity</td>--}}
                                    {{--                                                    <td>40.00 count</td>--}}
                                    {{--                                                </tr>--}}
                                    {{--                                                </tbody>--}}
                                    {{--                                            </table>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">--}}
                                    {{--                                        <div class="information-box">--}}
                                    {{--                                            <ul>--}}
                                    {{--                                                <li>Store cream cakes in a refrigerator. Fondant cakes should be--}}
                                    {{--                                                    stored in an air conditioned environment.--}}
                                    {{--                                                </li>--}}

                                    {{--                                                <li>Slice and serve the cake at room temperature and make sure--}}
                                    {{--                                                    it is not exposed to heat.--}}
                                    {{--                                                </li>--}}

                                    {{--                                                <li>Use a serrated knife to cut a fondant cake.</li>--}}

                                    {{--                                                <li>Sculptural elements and figurines may contain wire supports--}}
                                    {{--                                                    or toothpicks or wooden skewers for support.--}}
                                    {{--                                                </li>--}}

                                    {{--                                                <li>Please check the placement of these items before serving to--}}
                                    {{--                                                    small children.--}}
                                    {{--                                                </li>--}}

                                    {{--                                                <li>The cake should be consumed within 24 hours.</li>--}}

                                    {{--                                                <li>Enjoy your cake!</li>--}}
                                    {{--                                            </ul>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">--}}
                                    {{--                                        <div class="review-box">--}}
                                    {{--                                            <div class="row g-4">--}}
                                    {{--                                                <div class="col-xl-6">--}}
                                    {{--                                                    <div class="review-title">--}}
                                    {{--                                                        <h4 class="fw-500">Customer reviews</h4>--}}
                                    {{--                                                    </div>--}}

                                    {{--                                                    <div class="d-flex">--}}
                                    {{--                                                        <div class="product-rating">--}}
                                    {{--                                                            <ul class="rating">--}}
                                    {{--                                                                <li>--}}
                                    {{--                                                                    <i data-feather="star" class="fill"></i>--}}
                                    {{--                                                                </li>--}}
                                    {{--                                                                <li>--}}
                                    {{--                                                                    <i data-feather="star" class="fill"></i>--}}
                                    {{--                                                                </li>--}}
                                    {{--                                                                <li>--}}
                                    {{--                                                                    <i data-feather="star" class="fill"></i>--}}
                                    {{--                                                                </li>--}}
                                    {{--                                                                <li>--}}
                                    {{--                                                                    <i data-feather="star"></i>--}}
                                    {{--                                                                </li>--}}
                                    {{--                                                                <li>--}}
                                    {{--                                                                    <i data-feather="star"></i>--}}
                                    {{--                                                                </li>--}}
                                    {{--                                                            </ul>--}}
                                    {{--                                                        </div>--}}
                                    {{--                                                        <h6 class="ms-3">4.2 Out Of 5</h6>--}}
                                    {{--                                                    </div>--}}

                                    {{--                                                    <div class="rating-box">--}}
                                    {{--                                                        <ul>--}}
                                    {{--                                                            <li>--}}
                                    {{--                                                                <div class="rating-list">--}}
                                    {{--                                                                    <h5>5 Star</h5>--}}
                                    {{--                                                                    <div class="progress">--}}
                                    {{--                                                                        <div class="progress-bar" role="progressbar"--}}
                                    {{--                                                                             style="width: 68%" aria-valuenow="100"--}}
                                    {{--                                                                             aria-valuemin="0" aria-valuemax="100">--}}
                                    {{--                                                                            68%--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </li>--}}

                                    {{--                                                            <li>--}}
                                    {{--                                                                <div class="rating-list">--}}
                                    {{--                                                                    <h5>4 Star</h5>--}}
                                    {{--                                                                    <div class="progress">--}}
                                    {{--                                                                        <div class="progress-bar" role="progressbar"--}}
                                    {{--                                                                             style="width: 67%" aria-valuenow="100"--}}
                                    {{--                                                                             aria-valuemin="0" aria-valuemax="100">--}}
                                    {{--                                                                            67%--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </li>--}}

                                    {{--                                                            <li>--}}
                                    {{--                                                                <div class="rating-list">--}}
                                    {{--                                                                    <h5>3 Star</h5>--}}
                                    {{--                                                                    <div class="progress">--}}
                                    {{--                                                                        <div class="progress-bar" role="progressbar"--}}
                                    {{--                                                                             style="width: 42%" aria-valuenow="100"--}}
                                    {{--                                                                             aria-valuemin="0" aria-valuemax="100">--}}
                                    {{--                                                                            42%--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </li>--}}

                                    {{--                                                            <li>--}}
                                    {{--                                                                <div class="rating-list">--}}
                                    {{--                                                                    <h5>2 Star</h5>--}}
                                    {{--                                                                    <div class="progress">--}}
                                    {{--                                                                        <div class="progress-bar" role="progressbar"--}}
                                    {{--                                                                             style="width: 30%" aria-valuenow="100"--}}
                                    {{--                                                                             aria-valuemin="0" aria-valuemax="100">--}}
                                    {{--                                                                            30%--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </li>--}}

                                    {{--                                                            <li>--}}
                                    {{--                                                                <div class="rating-list">--}}
                                    {{--                                                                    <h5>1 Star</h5>--}}
                                    {{--                                                                    <div class="progress">--}}
                                    {{--                                                                        <div class="progress-bar" role="progressbar"--}}
                                    {{--                                                                             style="width: 24%" aria-valuenow="100"--}}
                                    {{--                                                                             aria-valuemin="0" aria-valuemax="100">--}}
                                    {{--                                                                            24%--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </li>--}}
                                    {{--                                                        </ul>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}

                                    {{--                                                <div class="col-xl-6">--}}
                                    {{--                                                    <div class="review-title">--}}
                                    {{--                                                        <h4 class="fw-500">Add a review</h4>--}}
                                    {{--                                                    </div>--}}

                                    {{--                                                    <div class="row g-4">--}}
                                    {{--                                                        <div class="col-md-6">--}}
                                    {{--                                                            <div class="form-floating theme-form-floating">--}}
                                    {{--                                                                <input type="text" class="form-control" id="name"--}}
                                    {{--                                                                       placeholder="Name">--}}
                                    {{--                                                                <label for="name">Your Name</label>--}}
                                    {{--                                                            </div>--}}
                                    {{--                                                        </div>--}}

                                    {{--                                                        <div class="col-md-6">--}}
                                    {{--                                                            <div class="form-floating theme-form-floating">--}}
                                    {{--                                                                <input type="email" class="form-control" id="email"--}}
                                    {{--                                                                       placeholder="Email Address">--}}
                                    {{--                                                                <label for="email">Email Address</label>--}}
                                    {{--                                                            </div>--}}
                                    {{--                                                        </div>--}}

                                    {{--                                                        <div class="col-md-6">--}}
                                    {{--                                                            <div class="form-floating theme-form-floating">--}}
                                    {{--                                                                <input type="url" class="form-control" id="website"--}}
                                    {{--                                                                       placeholder="Website">--}}
                                    {{--                                                                <label for="website">Website</label>--}}
                                    {{--                                                            </div>--}}
                                    {{--                                                        </div>--}}

                                    {{--                                                        <div class="col-md-6">--}}
                                    {{--                                                            <div class="form-floating theme-form-floating">--}}
                                    {{--                                                                <input type="url" class="form-control" id="review1"--}}
                                    {{--                                                                       placeholder="Give your review a title">--}}
                                    {{--                                                                <label for="review1">Review Title</label>--}}
                                    {{--                                                            </div>--}}
                                    {{--                                                        </div>--}}

                                    {{--                                                        <div class="col-12">--}}
                                    {{--                                                            <div class="form-floating theme-form-floating">--}}
                                    {{--                                                                                        <textarea class="form-control"--}}
                                    {{--                                                                                                  placeholder="Leave a comment here"--}}
                                    {{--                                                                                                  id="floatingTextarea2"--}}
                                    {{--                                                                                                  style="height: 150px"></textarea>--}}
                                    {{--                                                                <label for="floatingTextarea2">Write Your--}}
                                    {{--                                                                    Comment</label>--}}
                                    {{--                                                            </div>--}}
                                    {{--                                                        </div>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}

                                    {{--                                                <div class="col-12">--}}
                                    {{--                                                    <div class="review-title">--}}
                                    {{--                                                        <h4 class="fw-500">Customer questions & answers</h4>--}}
                                    {{--                                                    </div>--}}

                                    {{--                                                    <div class="review-people">--}}
                                    {{--                                                        <ul class="review-list">--}}
                                    {{--                                                            <li>--}}
                                    {{--                                                                <div class="people-box">--}}
                                    {{--                                                                    <div>--}}
                                    {{--                                                                        <div class="people-image">--}}
                                    {{--                                                                            <img src="../assets/images/review/1.jpg"--}}
                                    {{--                                                                                 class="img-fluid blur-up lazyload"--}}
                                    {{--                                                                                 alt="">--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}

                                    {{--                                                                    <div class="people-comment">--}}
                                    {{--                                                                        <a class="name"--}}
                                    {{--                                                                           href="javascript:void(0)">Tracey</a>--}}
                                    {{--                                                                        <div class="date-time">--}}
                                    {{--                                                                            <h6 class="text-content">14 Jan, 2022 at--}}
                                    {{--                                                                                12.58 AM</h6>--}}

                                    {{--                                                                            <div class="product-rating">--}}
                                    {{--                                                                                <ul class="rating">--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                </ul>--}}
                                    {{--                                                                            </div>--}}
                                    {{--                                                                        </div>--}}

                                    {{--                                                                        <div class="reply">--}}
                                    {{--                                                                            <p>Icing cookie carrot cake chocolate cake--}}
                                    {{--                                                                                sugar plum jelly-o danish. Dragée dragée--}}
                                    {{--                                                                                shortbread tootsie roll croissant muffin--}}
                                    {{--                                                                                cake I love gummi bears. Candy canes ice--}}
                                    {{--                                                                                cream caramels tiramisu marshmallow cake--}}
                                    {{--                                                                                shortbread candy canes cookie.<a--}}
                                    {{--                                                                                    href="javascript:void(0)">Reply</a>--}}
                                    {{--                                                                            </p>--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </li>--}}

                                    {{--                                                            <li>--}}
                                    {{--                                                                <div class="people-box">--}}
                                    {{--                                                                    <div>--}}
                                    {{--                                                                        <div class="people-image">--}}
                                    {{--                                                                            <img src="../assets/images/review/2.jpg"--}}
                                    {{--                                                                                 class="img-fluid blur-up lazyload"--}}
                                    {{--                                                                                 alt="">--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}

                                    {{--                                                                    <div class="people-comment">--}}
                                    {{--                                                                        <a class="name"--}}
                                    {{--                                                                           href="javascript:void(0)">Olivia</a>--}}
                                    {{--                                                                        <div class="date-time">--}}
                                    {{--                                                                            <h6 class="text-content">01 May, 2022 at--}}
                                    {{--                                                                                08.31 AM</h6>--}}
                                    {{--                                                                            <div class="product-rating">--}}
                                    {{--                                                                                <ul class="rating">--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                </ul>--}}
                                    {{--                                                                            </div>--}}
                                    {{--                                                                        </div>--}}

                                    {{--                                                                        <div class="reply">--}}
                                    {{--                                                                            <p>Tootsie roll cake danish halvah powder--}}
                                    {{--                                                                                Tootsie roll candy marshmallow cookie--}}
                                    {{--                                                                                brownie apple pie pudding brownie--}}
                                    {{--                                                                                chocolate bar. Jujubes gummi bears I--}}
                                    {{--                                                                                love powder danish oat cake tart--}}
                                    {{--                                                                                croissant.<a--}}
                                    {{--                                                                                    href="javascript:void(0)">Reply</a>--}}
                                    {{--                                                                            </p>--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </li>--}}

                                    {{--                                                            <li>--}}
                                    {{--                                                                <div class="people-box">--}}
                                    {{--                                                                    <div>--}}
                                    {{--                                                                        <div class="people-image">--}}
                                    {{--                                                                            <img src="../assets/images/review/3.jpg"--}}
                                    {{--                                                                                 class="img-fluid blur-up lazyload"--}}
                                    {{--                                                                                 alt="">--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}

                                    {{--                                                                    <div class="people-comment">--}}
                                    {{--                                                                        <a class="name"--}}
                                    {{--                                                                           href="javascript:void(0)">Gabrielle</a>--}}
                                    {{--                                                                        <div class="date-time">--}}
                                    {{--                                                                            <h6 class="text-content">21 May, 2022 at--}}
                                    {{--                                                                                05.52 PM</h6>--}}

                                    {{--                                                                            <div class="product-rating">--}}
                                    {{--                                                                                <ul class="rating">--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"--}}
                                    {{--                                                                                           class="fill"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                    <li>--}}
                                    {{--                                                                                        <i data-feather="star"></i>--}}
                                    {{--                                                                                    </li>--}}
                                    {{--                                                                                </ul>--}}
                                    {{--                                                                            </div>--}}
                                    {{--                                                                        </div>--}}

                                    {{--                                                                        <div class="reply">--}}
                                    {{--                                                                            <p>Biscuit chupa chups gummies powder I love--}}
                                    {{--                                                                                sweet pudding jelly beans. Lemon drops--}}
                                    {{--                                                                                marzipan apple pie gingerbread macaroon--}}
                                    {{--                                                                                croissant cotton candy pastry wafer.--}}
                                    {{--                                                                                Carrot cake halvah I love tart caramels--}}
                                    {{--                                                                                pudding icing chocolate gummi bears.--}}
                                    {{--                                                                                Gummi bears danish cotton candy muffin--}}
                                    {{--                                                                                marzipan caramels awesome feel. <a--}}
                                    {{--                                                                                    href="javascript:void(0)">Reply</a>--}}
                                    {{--                                                                            </p>--}}
                                    {{--                                                                        </div>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </li>--}}
                                    {{--                                                        </ul>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        {{--                        <div class="vendor-box">--}}
                        {{--                            <div class="verndor-contain">--}}
                        {{--                                <div class="vendor-image">--}}
                        {{--                                    <img src="../assets/images/product/vendor.png" class="blur-up lazyload" alt="">--}}
                        {{--                                </div>--}}

                        {{--                                <div class="vendor-name">--}}
                        {{--                                    <h5 class="fw-500">Noodles Co.</h5>--}}

                        {{--                                    <div class="product-rating mt-1">--}}
                        {{--                                        <ul class="rating">--}}
                        {{--                                            <li>--}}
                        {{--                                                <i data-feather="star" class="fill"></i>--}}
                        {{--                                            </li>--}}
                        {{--                                            <li>--}}
                        {{--                                                <i data-feather="star" class="fill"></i>--}}
                        {{--                                            </li>--}}
                        {{--                                            <li>--}}
                        {{--                                                <i data-feather="star" class="fill"></i>--}}
                        {{--                                            </li>--}}
                        {{--                                            <li>--}}
                        {{--                                                <i data-feather="star" class="fill"></i>--}}
                        {{--                                            </li>--}}
                        {{--                                            <li>--}}
                        {{--                                                <i data-feather="star"></i>--}}
                        {{--                                            </li>--}}
                        {{--                                        </ul>--}}
                        {{--                                        <span>(36 Reviews)</span>--}}
                        {{--                                    </div>--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <p class="vendor-detail">Noodles & Company is an American fast-casual--}}
                        {{--                                restaurant that offers international and American noodle dishes and pasta.</p>--}}

                        {{--                            <div class="vendor-list">--}}
                        {{--                                <ul>--}}
                        {{--                                    <li>--}}
                        {{--                                        <div class="address-contact">--}}
                        {{--                                            <i data-feather="map-pin"></i>--}}
                        {{--                                            <h5>Address: <span class="text-content">1288 Franklin Avenue</span></h5>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}

                        {{--                                    <li>--}}
                        {{--                                        <div class="address-contact">--}}
                        {{--                                            <i data-feather="headphones"></i>--}}
                        {{--                                            <h5>Contact Seller: <span class="text-content">(+1)-123-456-789</span></h5>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Trend mahsulotlar</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                    @foreach(trendingProducts()  as $product)
                                        <li>
                                            <div class="offer-product">
                                                <a href="{{$product->detailUrl}}" class="offer-image">
                                                    <img src="{{$product->card_photo->thumbnail}}"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </a>

                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="{{$product->detailUrl}}">
                                                            <h6 class="name">{{$product->name}}</h6>
                                                        </a>
                                                        <span>450 G</span>
                                                        <h6 class="price theme-color">$ {{$product->productPrice}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Banner Section -->
                        {{--                        <div class="ratio_156 pt-25">--}}
                        {{--                            <div class="home-contain">--}}
                        {{--                                <img src="../assets/images/vegetable/banner/8.jpg" class="bg-img blur-up lazyload"--}}
                        {{--                                     alt="">--}}
                        {{--                                <div class="home-detail p-top-left home-p-medium">--}}
                        {{--                                    <div>--}}
                        {{--                                        <h6 class="text-yellow home-banner">Seafood</h6>--}}
                        {{--                                        <h3 class="text-uppercase fw-normal"><span--}}
                        {{--                                                class="theme-color fw-bold">Freshes</span> Products</h3>--}}
                        {{--                                        <h3 class="fw-light">every hour</h3>--}}
                        {{--                                        <button onclick="location.href = 'shop-left-sidebar.html';"--}}
                        {{--                                                class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i--}}
                        {{--                                                class="fa-solid fa-arrow-right icon"></i></button>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Releted Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>O'xshash tovarlar</h2>
                <span class="title-leaf">
                   <svg class="icon-width" id="Layer_1" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136.17 136.2"><path
                           d="M119.6,106a9.86,9.86,0,0,1-1.46-15.14c-1.69-1.06-3.42-2.08-5.07-3.21a53.55,53.55,0,0,1-17-19.48A72.64,72.64,0,0,1,89.31,49a101.3,101.3,0,0,1-2.15-18.86c0-.31,0-.62,0-1H63c-.08,1.53-.15,3-.24,4.54a93.39,93.39,0,0,1-3.61,21.57C56,66,50.74,75.52,42.47,83.23a50,50,0,0,1-10.19,7.31c-.11.06-.22.12-.37.22A9.9,9.9,0,0,1,30.4,106a33.55,33.55,0,0,1,5.27,9,55.17,55.17,0,0,1,3.54,14.06c.39,3.28.65,6.59.79,9.89a6.07,6.07,0,0,1-6.21,6.53c-5.84.06-11.68.08-17.52,0A9.74,9.74,0,0,1,7,135.6q0-23.35,0-46.69Q7,64.81,7,40.7,7,29.95,7,19.2a9.72,9.72,0,0,1,9.78-9.8c13.29,0,26.58,0,39.87,0H93.57q19.83,0,39.68,0a9.77,9.77,0,0,1,9.86,9.93V64.86q0,21.31,0,42.62v28.13a9.76,9.76,0,0,1-9.7,9.91c-5.68.07-11.36,0-17.05,0a6.19,6.19,0,0,1-6.2-5.06,10,10,0,0,1-.1-2.45c.34-7.87,1.37-15.63,4.35-23a38.62,38.62,0,0,1,2.26-4.67C117.54,108.85,118.59,107.46,119.6,106Zm18-18.14V29.15H112c0,.4,0,.74,0,1.08a119.89,119.89,0,0,0,3.23,26.21,65.29,65.29,0,0,0,8.24,19.88,36.77,36.77,0,0,0,10,10.57A5.23,5.23,0,0,0,137.63,87.82Zm-125.18,0a5.15,5.15,0,0,0,4.1-.88,35.76,35.76,0,0,0,9.92-10.4C32.16,67.79,35,58,36.54,47.82,37.26,43,37.56,38,38,33.15c.12-1.33,0-2.68,0-4H12.45ZM137.7,23.59c0-1.31,0-2.51,0-3.7,0-3.31-1.65-5.05-5-5.07-8.49,0-17,0-25.48,0H30.53c-4.51,0-9,0-13.54,0-2.17,0-4.08,1.26-4.37,3.2a39.72,39.72,0,0,0,0,5.57ZM24.44,87.94c.32-.1.66-.17,1-.29a36.74,36.74,0,0,0,10.24-5.78c11-8.66,16.68-20.4,19.68-33.72a94.42,94.42,0,0,0,2-14.78c.09-1.4,0-2.81,0-4.24H43.57c0,.39,0,.73,0,1.07-.13,2.77-.18,5.55-.41,8.32a122.62,122.62,0,0,1-2.39,16.72A76.09,76.09,0,0,1,33,76.51,53.93,53.93,0,0,1,24.44,87.94ZM125.66,88l.09-.23c-1-1-1.93-2-2.84-3a56.57,56.57,0,0,1-10.52-18.85,82.89,82.89,0,0,1-4.2-17.49c-.54-4.38-.94-8.77-1.33-13.15-.18-2-.21-4.08-.3-6.1H92.64c0,.44,0,.78,0,1.13A95.93,95.93,0,0,0,94.34,46a67,67,0,0,0,8,21.85A47,47,0,0,0,122,86.49C123.21,87.07,124.45,87.51,125.66,88Zm-99,52.08h6.49c1.3,0,1.51-.19,1.46-1.46a70.73,70.73,0,0,0-2.74-18.17A32.57,32.57,0,0,0,26,109.2c-1.53-1.87-3.34-1.69-5.39-1.55a49.79,49.79,0,0,1,4.43,15.84C25.73,129,26.11,134.46,26.62,140.09Zm97.06,0c.47-11.15,1.08-22.15,5.75-32.49a20.41,20.41,0,0,1-2.36,0,2.61,2.61,0,0,0-2.25.94,22,22,0,0,0-4.47,6.51c-3.57,7.64-4.51,15.81-4.86,24.09a.87.87,0,0,0,.94,1Zm-102.82,0V139a99.28,99.28,0,0,0-1.94-19.15A34.92,34.92,0,0,0,15,108.77c-.81-1.36-.89-1.39-2.57-1v1q0,9.89,0,19.78c0,2.36,0,4.73,0,7.09A4.23,4.23,0,0,0,16.35,140C17.81,140.18,19.3,140.06,20.86,140.06ZM137.7,107.74c-1.54-.56-2.2.23-2.79,1.28a37.78,37.78,0,0,0-4.13,13c-.67,4.61-1,9.26-1.46,13.89-.13,1.37,0,2.75,0,4.17,1.49,0,2.94.08,4.37,0a4,4,0,0,0,3.75-3,7.89,7.89,0,0,0,.26-2.43q0-12.21,0-24.41ZM12.45,102.08c4.49,0,8.91.06,13.32-.06a4.33,4.33,0,0,0,3.21-6,4.15,4.15,0,0,0-4-2.66c-3.79-.05-7.57,0-11.36,0H12.45Zm125.2-8.7h-12.1A4.4,4.4,0,0,0,121,97.76a4.31,4.31,0,0,0,4.57,4.35c3.72,0,7.44,0,11.15,0,.31,0,.61,0,1,0Z"
                           transform="translate(-6.96 -9.37)"/></svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">

                        @foreach($product->relatedProducts() as $product)
                            <div>
                                <div class="product-box-3 wow fadeInUp">
                                    @include("frontend.partials.product-box",[
                                                             "product"=>$product
                                 ])
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Releted Product Section End -->

@endsection


@section("scripts")

@endsection
