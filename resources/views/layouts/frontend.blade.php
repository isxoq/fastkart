<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset("assets/css/vendors/bootstrap.css")}}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{asset("assets/css/animate.min.css")}}"/>

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/vendors/font-awesome.css")}}">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/vendors/feather-icon.css")}}">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/vendors/slick/slick.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/vendors/slick/slick-theme.css")}}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/bulk-style.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/vendors/animate.css")}}">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset("assets/css/style.css")}}">
    @yield('styles')

    @if(config("env")=="production")
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (m, e, t, r, i, k, a) {
                m[i] = m[i] || function () {
                    (m[i].a = m[i].a || []).push(arguments)
                };
                m[i].l = 1 * new Date();
                for (var j = 0; j < document.scripts.length; j++) {
                    if (document.scripts[j].src === r) {
                        return;
                    }
                }
                k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
            })
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(94221086, "init", {
                clickmap: true,
                trackLinks: true,
                accurateTrackBounce: true,
                webvisor: true,
                trackHash: true,
                ecommerce: "dataLayer"
            });
        </script>
        <!-- /Yandex.Metrika counter -->
    @endif
</head>

<body class="bg-effect">

<!-- Loader Start -->
<div class="fullpage-loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<!-- Loader End -->

@include("layouts.header")
@yield("content")
@include("layouts.footer")


</body>


<!-- latest jquery-->
<script src="{{asset("assets/js/jquery-3.6.0.min.js")}}"></script>

<!-- jquery ui-->
<script src="{{asset("assets/js/jquery-ui.min.js")}}"></script>

<!-- Bootstrap js-->
<script src="{{asset("assets/js/bootstrap/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap/bootstrap-notify.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap/popper.min.js")}}"></script>

<!-- feather icon js-->
<script src="{{asset("assets/js/feather/feather.min.js")}}"></script>
<script src="{{asset("assets/js/feather/feather-icon.js")}}"></script>

<!-- Lazyload Js -->
<script src="{{asset("assets/js/lazysizes.min.js")}}"></script>

<!-- Slick js-->
<script src="{{asset("assets/js/slick/slick.js")}}"></script>
<script src="{{asset("assets/js/slick/slick-animation.min.js")}}"></script>
<script src="{{asset("assets/js/slick/custom_slick.js")}}"></script>

<!-- Auto Height Js -->
<script src="{{asset("assets/js/auto-height.js")}}"></script>

<!-- Timer Js -->
<script src="{{asset("assets/js/timer1.js")}}"></script>

<!-- Fly Cart Js -->
<script src="{{asset("assets/js/fly-cart.js")}}"></script>

<!-- Quantity js -->
<script src="{{asset("assets/js/quantity-2.js")}}"></script>

<!-- WOW js -->
<script src="{{asset("assets/js/wow.min.js")}}"></script>
<script src="{{asset("assets/js/custom-wow.js")}}"></script>

<!-- script js -->
<script src="{{asset("assets/js/script.js")}}"></script>

@yield('scripts')

</html>
