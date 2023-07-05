@extends('layouts.frontend')


<?php


$members = \App\Models\Contact::all();

?>
@section("content")

    <!-- Fresh Vegetable Section Start -->
    <section class="fresh-vegetable-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
                <div class="col-xl-6 col-12">
                    <div class="row g-sm-4 g-2">
                        <div class="col-6">
                            <div class="fresh-image-2">
                                <div>
                                    <img src="{{asset("images/about1.jpg")}}"
                                         class="bg-img blur-up lazyload" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="fresh-image">
                                <div>
                                    <img src="{{asset("images/about2.jpg")}}"
                                         class="bg-img blur-up lazyload" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-12">
                    <div class="fresh-contain p-center-left">
                        <div>
                            <div class="review-title">
                                <h4>Biz haqimizda</h4>
                                <h2>Harir - parda va aksessuarlar</h2>
                            </div>

                            <div class="delivery-list">
                                <p class="text-content">Harir - sifatli parda matolari va aksessuarlarini o‘zida
                                    jamlagan do‘kon. Uy yoki ofisingizga parda qildirmoqchimisiz? Bu borada Harir
                                    pardalar saloni sizga yordam beradi. Siz buyurtma bering, biz esa siz tanlagan
                                    pardani tikib uy yoki ofisingizga ilib beramiz.</p>

                                <ul class="delivery-box">
                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="{{asset("images/moshina.svg")}}" class="blur-up lazyload"
                                                     alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Yetkazish va o‘rnatish xizmati</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="{{asset("images/idividuvaldizayn.svg")}}"
                                                     class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Individual dizayner xizmati</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="{{asset("images/dardaaksessuarlar.svg")}}"
                                                     class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Pardalar va aksessuarlar </h5>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fresh Vegetable Section End -->

    <!-- Team Section Start -->
    <section class="team-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="about-us-title text-center">
                <h4 class="text-content">Bizning kreativ jamoamiz</h4>
                <h2 class="center">Harir jamoasi a'zolari</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-user product-wrapper">
                        @foreach($members as $member)

                            <div>
                                <div class="team-box">
                                    <div class="team-iamge">
                                        <img src="{{$member->photo?->url}}"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </div>

                                    <div class="team-name">
                                        <h3>{{$member->full_name}}</h3>
                                        <h5>{{$member->profession}}</h5>
                                        <p>{{$member->short_description}}</p>
                                        <ul class="team-media">
                                            <li>
                                                <a href="{{$member->facebook}}" class="fb-bg">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{$member->telegram}}" class="telegram-bg">
                                                    <i class="fa-brands fa-telegram"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{$member->whatsapp}}" class="whatsapp-bg">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{$member->instagram}}" class="insta-bg">
                                                    <i class="fa-brands fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

@endsection
