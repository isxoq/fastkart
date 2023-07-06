<div class="modal-header p-0">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
<div class="modal-body">
    <div class="row g-sm-4 g-2">
        <div class="col-lg-6">
            <div class="slider-image">
                <img src="{{$product->photos[0]?->url}}" class="img-fluid blur-up lazyload"
                     alt="">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="right-sidebar-modal">
                <h4 class="title-name">{{$product->name}}</h4>
                <h4 class="name">Mahsulot kodi: {{$product->code}}</h4>
                <br>
                <h4 class="price">${{$product->productPrice}}</h4>
                @if($product->salePercentage)
                    <del class="text-content">${{$product->price}}</del>
                    <span
                        class="offer theme-color">({{$product->salePercentage}}% off)</span>
                @endif
{{--                <div class="product-rating">--}}
{{--                    <ul class="rating">--}}
{{--                        <li>--}}
{{--                            <i data-feather="star" class="fill"></i>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i data-feather="star" class="fill"></i>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i data-feather="star" class="fill"></i>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i data-feather="star" class="fill"></i>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i data-feather="star"></i>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <span class="ms-2">8 Reviews</span>--}}
{{--                    <span class="ms-2 text-danger">6 sold in last 16 hours</span>--}}
{{--                </div>--}}

                <div class="product-detail">
                    <h4>Mahsulot haqida:</h4>
                    <p>{{$product->short_description}}</p>
                </div>

{{--                <ul class="brand-list">--}}
{{--                    <li>--}}
{{--                        <div class="brand-box">--}}
{{--                            <h5>Brand Name:</h5>--}}
{{--                            <h6>Black Forest</h6>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <div class="brand-box">--}}
{{--                            <h5>Product Code:</h5>--}}
{{--                            <h6>W0690034</h6>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <div class="brand-box">--}}
{{--                            <h5>Product Type:</h5>--}}
{{--                            <h6>White Cream Cake</h6>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--                <div class="select-size">--}}
{{--                    <h4>Cake Size :</h4>--}}
{{--                    <select class="form-select select-form-size">--}}
{{--                        <option selected>Select Size</option>--}}
{{--                        <option value="1.2">1/2 KG</option>--}}
{{--                        <option value="0">1 KG</option>--}}
{{--                        <option value="1.5">1/5 KG</option>--}}
{{--                        <option value="red">Red Roses</option>--}}
{{--                        <option value="pink">With Pink Roses</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="modal-button">--}}
{{--                    <button onclick="location.href = 'cart.html';"--}}
{{--                            class="btn btn-md add-cart-button icon">Add--}}
{{--                        To Cart--}}
{{--                    </button>--}}
{{--                    <button onclick="location.href = 'product-left.html';"--}}
{{--                            class="btn theme-bg-color view-button icon text-white fw-bold btn-md">--}}
{{--                        View More Details--}}
{{--                    </button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
