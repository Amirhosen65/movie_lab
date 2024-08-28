
<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reset Password | AJ Movies</title>

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
</head>
<body>

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

    <section class="account-section bg-overlay-black bg_img" data-background="{{ asset('uploads/default/auth-banner.jpg') }}">
        <div class="container">
            <div class="row account-area align-items-center justify-content-center">
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                    <div class="account-form-area">
                        <div class="account-logo-area text-center">
                            <div class="account-logo">
                                <a href="{{ route('root') }}"><img src="{{ asset('uploads/default/logo.png') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="title mb-3">Reset Password</h3>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="account-form verify-gcaptcha" action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="row ml-b-20">
                                <div class="form-group">
                                    <label>E-Mail Address*</label>
                                    <input class="form-control form--control checkUser @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" type="email" value="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 form-group text-center">
                                    <button class="submit-btn" id="recaptcha" type="submit">
                                        Send Password Reset Link
                                    </button>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="account-item mt-10">
                                        <label> <a class="text--base" href="{{ route('login') }}">Login Now</a></label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

    <!-- jQuery library -->
    <script src="{{ asset('frontend_assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/global.js') }}"></script>
    <!-- lightcase plugin -->
    <script src="{{ asset('frontend_assets/basic') }}/js/swiper.min.js"></script>
    <script src="{{ asset('frontend_assets/basic') }}/js/wow.min.js"></script>
    <script src="{{ asset('frontend_assets/basic') }}/js/main.js"></script>
    <script src="{{ asset('frontend_assets/basic') }}/js/custom.js"></script>
</body>
</html>

