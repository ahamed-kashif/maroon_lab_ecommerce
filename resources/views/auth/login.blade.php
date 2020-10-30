<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesbox.in/admin-templates/orbiter/html/light-vertical/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Sep 2020 16:15:35 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="tidyfish, fish, mach">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Orbiter - Bootstrap Minimal & Clean Admin Template</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{asset('/images/favicon.ico')}}">
    <!-- Start css -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box login-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-6 col-lg-5">
                    <!-- Start Auth Box -->
                    <div class="auth-box-right">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-head">
                                        <a href="/" class="logo"><img src="{{asset('/logo/logo.png')}}" class="img-fluid" alt="logo"></a>
                                    </div>
                                    <h4 class="text-primary my-4">Log in !</h4>
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Enter password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox text-left">
                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label font-14" for="remember">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="forgot-psw">
                                                @if (Route::has('password.request'))
                                                    <a id="forgot-psw" href="{{ route('password.request') }}" class="font-14">Forgot Password?</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                </form>
                                <div class="login-or">
                                    <h6 class="text-muted">OR</h6>
                                </div>
                                <div class="social-login text-center">
                                    <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-primary-rgba font-18"><i class="mdi mdi-facebook mr-2"></i>Facebook</a>
                                    <a href="{{ route('social.oauth', 'google') }}" class="btn btn-danger-rgba font-18"><i class="mdi mdi-google mr-2"></i>Google</a>
                                </div>
                                <p class="mb-0 mt-3">Don't have a account? <a href="{{route('register')}}">Sign up</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- End Auth Box -->
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Container -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/modernizr.min.js')}}"></script>
<script src="{{asset('/js/detect.js')}}"></script>
<script src="{{asset('/js/jquery.slimscroll.js')}}"></script>
<!-- End js -->
</body>

<!-- Mirrored from themesbox.in/admin-templates/orbiter/html/light-vertical/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Sep 2020 16:15:35 GMT -->
</html>
