@extends('layouts.frontend')


@section("content")

    <!-- Contact Box Section Start -->
    <section class="contact-box-section">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3">
                <div class="col-lg-6">
                    <div class="left-sidebar-box">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-image">
                                    <img src="../assets/images/inner-page/contact-us.png"
                                         class="img-fluid blur-up lazyloaded" alt="">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact-title">
                                    <h3>Bizga bog'laning</h3>
                                </div>

                                <div class="contact-detail">
                                    <div class="row g-4">
                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Telefon</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>{{\App\Classes\Helper::info("phone1")}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Email</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>{{\App\Classes\Helper::info("email")}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Do'konimiz</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>{{\App\Classes\Helper::info("address2")}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-building"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Ofis</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>{{\App\Classes\Helper::info("address1")}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="title d-xxl-none d-block">
                        <h2>Xabar yuboring</h2>
                    </div>
                    <div class="right-sidebar-box">
                        <div class="row">
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput" class="form-label">Ismingiz</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="exampleFormControlInput"
                                               placeholder="Ismingizni kiriting">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput1" class="form-label">Familiyangiz</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                               placeholder="Familiyangizni kiriting">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput2" class="form-label">Email</label>
                                    <div class="custom-input">
                                        <input type="email" class="form-control" id="exampleFormControlInput2"
                                               placeholder="Emailingizni kiriting">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput3" class="form-label">Telegon raqamingiz</label>
                                    <div class="custom-input">
                                        <input type="tel" class="form-control" id="exampleFormControlInput3"
                                               placeholder="Telefon raqamingiz" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlTextarea" class="form-label">Xabar</label>
                                    <div class="custom-textarea">
                                        <textarea class="form-control" id="exampleFormControlTextarea"
                                                  placeholder="Xabaringizni yozing" rows="6"></textarea>
                                        <i class="fa-solid fa-message"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-animation btn-md fw-bold ms-auto">Yuborish</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Box Section End -->

    <!-- Map Section Start -->
    <section class="map-section">
        <div class="container-fluid p-0">
            <div class="map-box">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Adbe4f4b5e869e2ab5d51430f2095b1a7baf63340bee282bec405905e8e28506c&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </section>
    <!-- Map Section End -->

@endsection