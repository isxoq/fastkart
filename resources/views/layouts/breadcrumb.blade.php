<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>{{$name}}</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            @foreach($items as $item)
                                @if($loop->last)
                                    <li class="breadcrumb-item active" aria-current="page">{{$item['name']}}</li>
                                @else
                                    <li class="breadcrumb-item" aria-current="page">{{$item['name']}}</li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
