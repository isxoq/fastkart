<div class="product-header">
    <div class="product-image">
        <a href="{{$product->detailUrl}}">
            <img src="{{$product->card_photo?->url}}"
                 class="img-fluid blur-up lazyload" alt="">
        </a>
    </div>
</div>

<div class="product-footer">
    <div class="product-detail">
        <span class="span-name">{{$product->category->name}}</span>
        <a href="{{$product->detailUrl}}">
            <h5 class="name">{{$product->name}}</h5>
        </a>
        {{--                                            <div class="product-rating mt-2">--}}
            {{--                                                <ul class="rating">--}}
                {{--                                                    <li>--}}
                    {{--                                                        <i data-feather="star" class="fill"></i>--}}
                    {{--                                                    </li>--}}
                {{--                                                    <li>--}}
                    {{--                                                        <i data-feather="star" class="fill"></i>--}}
                    {{--                                                    </li>--}}
                {{--                                                    <li>--}}
                    {{--                                                        <i data-feather="star" class="fill"></i>--}}
                    {{--                                                    </li>--}}
                {{--                                                    <li>--}}
                    {{--                                                        <i data-feather="star" class="fill"></i>--}}
                    {{--                                                    </li>--}}
                {{--                                                    <li>--}}
                    {{--                                                        <i data-feather="star" class="fill"></i>--}}
                    {{--                                                    </li>--}}
                {{--                                                </ul>--}}
            {{--                                                <span>(5.0)</span>--}}
            {{--                                            </div>--}}
        {{--                                            <h6 class="unit">500 G</h6>--}}
        <h5 class="price"><span
                class="theme-color">${{$product->productPrice}}</span>
            @if($product->salePercentage)
            <del>${{$product->price}}</del>
            @endif
        </h5>
        {{--                                            <div class="add-to-cart-box bg-white">--}}
            {{--                                                <button class="btn btn-add-cart addcart-button">Add--}}
                {{--                                                    <span class="add-icon bg-light-gray">--}}
                                            {{--                                                    <i class="fa-solid fa-plus"></i>--}}
                                            {{--                                                </span>--}}
                {{--                                                </button>--}}
            {{--                                                <div class="cart_qty qty-box">--}}
                {{--                                                    <div class="input-group bg-white">--}}
                    {{--                                                        <button type="button" class="qty-left-minus bg-gray"--}}
                                                                                        {{--                                                                data-type="minus" data-field="">--}}
                        {{--                                                            <i class="fa fa-minus" aria-hidden="true"></i>--}}
                        {{--                                                        </button>--}}
                    {{--                                                        <input class="form-control input-number qty-input" type="text"--}}
                                                                                       {{--                                                               name="quantity" value="0">--}}
                    {{--                                                        <button type="button" class="qty-right-plus bg-gray"--}}
                                                                                        {{--                                                                data-type="plus" data-field="">--}}
                        {{--                                                            <i class="fa fa-plus" aria-hidden="true"></i>--}}
                        {{--                                                        </button>--}}
                    {{--                                                    </div>--}}
                {{--                                                </div>--}}
            {{--                                            </div>--}}
    </div>
</div>
