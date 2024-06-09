<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8"/>
    <title>@stack('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/off-canvas.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/flaticon.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/magnific-popup.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/rsmenu-main.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/swiper.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/rsmenu-transitions.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/rsanimations.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/rs-spaceing.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/front/css/responsive.css')}}">

        @stack('styles')
    </head>
<body>

@include('front.includes.navbar')
    <!--Preloader area start here-->
    <div id="loading" class="loading">
        <div class="rs-loader">
            <div class="rs-shadow"></div>
            <div class="rs-gravity">
                <div class="rs-ball"></div>
            </div>
        </div>
    </div>
    <!--Preloader area End here-->
@yield('content')

@include('front.includes.footer')

<script src="{{asset(config('constants.asset_path').'assets/front/js/modernizr-2.8.3.min.js')}}"></script>
<!-- jquery latest version -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/jquery.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- bootstrap js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/bootstrap.min.js')}}"></script>

<!-- owl.carousel js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/owl.carousel.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/slick.min.js')}}"></script>
<!-- isotope.pkgd.min js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/isotope.pkgd.min.js')}}"></script>
<!-- imagesloaded.pkgd.min js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- wow js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/wow.min.js')}}"></script>
<!-- counter top js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/front/js/waypoints.min.js')}}"></script>
<!-- magnific popup -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/jquery.magnific-popup.min.js')}}"></script>
<!-- rsmenu js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/rsmenu-main.js')}}"></script>
<!-- plugins js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/plugins.js')}}"></script>
<!-- Time Circle js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/time-circle.js')}}"></script>
<!-- Theia Sticky Sidebar js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/theia-sticky-sidebar.js')}}"></script>
<!-- swiper slider js -->
<script src="{{asset(config('constants.asset_path').'assets/front/js/swiper.min.js')}}"></script>
<!-- main js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{asset(config('constants.asset_path').'assets/front/js/main.js')}}"></script>

@stack('scripts')
</body>
</html>
