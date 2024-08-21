<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle }} | AJ Movies</title>

    {{-- @include('partials.seo') --}}

    <link type="image/png" href="{{ asset('uploads/default/favicon.png') }}" rel="icon" sizes="16x16">
    <!-- bootstrap 4  -->
    <link href="{{ asset('frontend_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/css/line-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend_assets/css/global.css') }}" rel="stylesheet" />

    <link href="{{ asset('frontend_assets/basic') }}/css/swiper.min.css" rel="stylesheet">
    <link href="{{ asset('frontend_assets/basic') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend_assets/basic') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend_assets/basic') }}/css/bootstrap-fileinput.css" rel="stylesheet">
    <link href="{{ asset('frontend_assets/basic') }}/css/custom.css" rel="stylesheet">
    <link href="{{ asset('frontend_assets/basic') }}/css/color.php?color=D50055" rel="stylesheet">

    <link href="{{ asset('frontend_assets/basic') }}/css/color.php?color=D50055&secondColor=1B1B3F" rel="stylesheet">

    @stack('style')
    @stack('style-lib')
    <style>
        .btn-download{
            font-size: 12px;
            padding: 5px 20px;
            align-items: center;
            margin: 5px;
        }

        .result-item {
            padding: 5px 15px 15px 0px;
        }

        .result-item img {
            /* max-width: 100%; */
            width: 100px;
            height: 120px;
            object-fit: cover;
        }

        .side-item {
            padding: 5px 15px 15px 0px;
        }

        .side-item img {
            width: 140px;
            height: 100px;
            object-fit: cover;
        }

        .movie-item-1{
            width: 150px;
            height: 130px;
        }

        .one-clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1; /* Limit to 1 line */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .two-clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2; /* Limit to 2 lines */
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .short-desc{
            line-height: normal;
        }

    </style>
</head>

<body>
    <!-- preloader start -->
    <div class="preloader">
        <div class="loader">
            <div class="camera__wrap">
                <div class="camera__body">
                    <div class="camera__body-k7">
                        <div class="tape">
                            <div class="roll"></div>
                            <div class="roll"></div>
                            <div class="roll"></div>
                            <div class="roll"></div>
                            <div class="center"></div>
                        </div>
                        <div class="tape">
                            <div class="roll"></div>
                            <div class="roll"></div>
                            <div class="roll"></div>
                            <div class="roll"></div>
                            <div class="center"></div>
                        </div>
                    </div>
                    <div class="camera__body__stuff">
                        <div class="camera__body__stuff-bat"></div>
                        <div class="camera__body__stuff-pointer first"></div>
                        <div class="camera__body__stuff-pointer"></div>
                    </div>
                </div>
                <div class="camera__body-optic"></div>
                <div class="camera__body-light"></div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    @include('frontend.partials.header')
    <a class="scrollToTop" href="#"><i class="las la-angle-double-up"></i></a>

    <div class="page-wrapper" id="main-scrollbar" data-scrollbar>

        @yield('body_content')

        <div class="loading"></div>
    </div>

    @include('frontend.partials.footer')

    <!-- jQuery library -->
    <script src="{{ asset('frontend_assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/global.js') }}"></script>

    <link href="http://localhost/Playlab/assets/global/css/iziToast.min.css" rel="stylesheet">
    <script src="http://localhost/Playlab/assets/global/js/iziToast.min.js"></script>

    <!-- lightcase plugin -->
    <script src="{{ asset('frontend_assets/basic') }}/js/swiper.min.js"></script>
    <script src="{{ asset('frontend_assets/basic') }}/js/wow.min.js"></script>
    <script src="{{ asset('frontend_assets/basic') }}/js/main.js"></script>
    <script src="{{ asset('frontend_assets/basic') }}/js/custom.js"></script>

    <script type='text/javascript' src='//headacheaim.com/8b/ef/0c/8bef0cc57d5db6f5fefbef5a7c31a752.js'></script>

    @stack('script-lib')


</body>

</html>
