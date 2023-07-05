<div class="product-box">
    <div class="product-image">

        <a href="product-left-thumbnail.html">
            <img src="{{$product->card_photo->url}}"
                 class="img-fluid blur-up lazyload" alt="">
        </a>
        <ul class="product-option justify-content-center">
            <li data-bs-toggle="tooltip" data-bs-placement="top"
                title="Ko'rish">
                <a href="{{url("product/".$product->id)}}" data-bs-toggle="modal"
                   data-bs-target="#view">
                    <i data-feather="eye"></i>
                </a>
            </li>

            {{--            <li data-bs-toggle="tooltip" data-bs-placement="top"--}}
            {{--                title="Compare">--}}
            {{--                <a href="compare.html">--}}
            {{--                    <i data-feather="refresh-cw"></i>--}}
            {{--                </a>--}}
            {{--            </li>--}}

            {{--            <li data-bs-toggle="tooltip" data-bs-placement="top"--}}
            {{--                title="Wishlist">--}}
            {{--                <a href="wishlist.html" class="notifi-wishlist">--}}
            {{--                    <i data-feather="heart"></i>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </div>
    <div class="product-detail">
        <a href="product-left-thumbnail.html">
            <h6 class="name">{{$product->name}}</h6>
        </a>

        <h5 class="sold text-content">
            <span class="theme-color price">UZS {{$product->sale_price??$product->price}}</span>
            <del>$ {{$product->price}}</del>
        </h5>

        {{--        <div class="product-rating mt-sm-2 mt-1">--}}
        {{--            <ul class="rating">--}}
        {{--                <li>--}}
        {{--                    <i data-feather="star" class="fill"></i>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <i data-feather="star" class="fill"></i>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <i data-feather="star" class="fill"></i>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <i data-feather="star" class="fill"></i>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <i data-feather="star"></i>--}}
        {{--                </li>--}}
        {{--            </ul>--}}

        {{--            <h6 class="theme-color">In Stock</h6>--}}
        {{--        </div>--}}

        {{--        <div class="add-to-cart-box">--}}
        {{--            <button class="btn btn-add-cart addcart-button">Add--}}
        {{--                <span class="add-icon">--}}
        {{--                                                                <i class="fa-solid fa-plus"></i>--}}
        {{--                                                            </span>--}}
        {{--            </button>--}}
        {{--            <div class="cart_qty qty-box">--}}
        {{--                <div class="input-group">--}}
        {{--                    <button type="button" class="qty-left-minus"--}}
        {{--                            data-type="minus" data-field="">--}}
        {{--                        <i class="fa fa-minus" aria-hidden="true"></i>--}}
        {{--                    </button>--}}
        {{--                    <input class="form-control input-number qty-input"--}}
        {{--                           type="text" name="quantity" value="0">--}}
        {{--                    <button type="button" class="qty-right-plus"--}}
        {{--                            data-type="plus" data-field="">--}}
        {{--                        <i class="fa fa-plus" aria-hidden="true"></i>--}}
        {{--                    </button>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
</div>
