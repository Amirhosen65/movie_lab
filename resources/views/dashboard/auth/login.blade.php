<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your custom CSS -->
    <style>
        /* styles.css */
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
}

.login-background {
    /* background: linear-gradient(45deg, #181461, #0d0b3f); */
    background-image: url({{ asset('uploads/default/login.jpg') }});
}

.login-card {
    background-color: #1a1741;
    border-radius: 10px;
    max-width: 400px;
    width: 100%;
}

.login-card h2 {
    font-size: 1.8rem;
    font-weight: 700;
}

.login-card p {
    font-size: 1rem;
    font-weight: 500;
}

.form-control {
    background-color: #1a1741;
    border: 1px solid #4a44f2;
    color: white;
}

.form-control:focus {
    background-color: #1a1741;
    border-color: #715aff;
    box-shadow: none;
    color: white;
}

.form-label {
    font-size: 0.9rem;
}

.form-check-input {
    background-color: #4a44f2;
    border-color: #4a44f2;
}

.form-check-label {
    font-size: 0.9rem;
}

.forgot-password {
    font-size: 0.9rem;
    text-decoration: underline;
}

.btn-primary {
    background-color: #4a44f2;
    border-color: #4a44f2;
}

.btn-primary:hover {
    background-color: #715aff;
    border-color: #715aff;
}

.text-white {
    color: #ffffff !important;
}

    </style>
</head>
<body>
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center login-background">
        <div class="login-card p-4 shadow">
            <h2 class="text-center text-white mb-4">Welcome to PlayLab</h2>
            <p class="text-center text-white mb-4">Admin Login to PlayLab Dashboard</p>
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email*</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Password*</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember_token">
                        <label class="form-check-label text-white" for="rememberMe">Remember Me</label>
                    </div>
                    <a href="#" class="text-white forgot-password">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">LOGIN</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/assets/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('dashboard_assets') }}/assets/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dashboard_assets') }}/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard_assets') }}/assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="">Sign Up</a></p>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Email address</label>
                <input type="email" class="form-control m-b-md @error('email') is-invalid @enderror" name="email" id="signInEmail" aria-describedby="signInEmail" placeholder="example@neptune.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="remember_token" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                        Remember Me
                        </label>
                    </div>
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Sign In</button type="submit">
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <div class="divider"></div>
            </form>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('dashboard_assets') }}/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/js/main.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/assets/js/custom.js"></script>
</body>
</html> --}}
