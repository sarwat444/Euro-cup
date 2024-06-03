<!doctype html>
<head>
    <title>@stack('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>

        <link href="{{ asset(config('constants.asset_path') . 'assets/front/css/bootstrap.min.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/bootstrap.min.css') }}">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/font-awesome.min.css') }}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/owl.carousel.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/animate.css') }} ">
        <!-- Slick css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/slick.css') }}">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/off-canvas.css') }}">
        <!-- flaticon css  -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/fonts/flaticon.css')}}">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/magnific-popup.css')}}">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/rsmenu-main.css') }}">
        <!-- swiper slider CSS -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/swiper.min.css') }}">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="css/rsmenu-transitions.css">
        <!-- rsanimations CSS -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/rsanimations.css') }}">
        <!-- style css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/style.css') }}">
        <!-- rs-spaceing css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/rs-spaceing.css') }}">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset(config('constants.asset_path') . 'assets/front/css/responsive.css') }}">
    </head>
<body>
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
    @include('front.includes.navbar')

    @yield('content')

    @include('front.includes.footer')

    <!-- modernizr js -->
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/jquery.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/wow.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/waypoints.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/rsmenu-main.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/plugins.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/time-circle.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/swiper.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/swiper.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/front/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
