<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edulearn | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets_front')}}/login/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets_front')}}/login/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets_front')}}/login/fonts/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets_front')}}/login/css/style-login.css">
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<section class="fxt-template-animation fxt-template-layout13 has-animation" style="opacity:1;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-12 order-md-2 fxt-bg-wrap">
                <div class="fxt-bg-img" data-bg-image="{{asset('assets_front')}}/images/login.jpg">
                    <div class="fxt-header">
                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                            <a href="login-13.html" class="fxt-logo"><img src="{{asset('assets_front')}}/images/logo-white.png" alt="Logo"></a>
                        </div>
                        <div class="fxt-transformY-50 fxt-transition-delay-2">
                            <h1>Welcome To Our Edulearn</h1>
                        </div>
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <p>Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur elit. Vesti at bulum nec odio aea the dumm ipsumm ipsum that dolocons rsus mal suada and fadolorit to the dummy consectetur elit the Lorem Ipsum genera.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 order-md-1 fxt-bg-color">
                <div class="fxt-content">
                    <h2>Login</h2>
                    <div class="fxt-form">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="input-label">{{ __('E-Mail Address') }}</label>
                                <input type="email" placeholder="demo@gmail.com" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus >
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="input-label">{{ __('Password') }}</label>
                                <input id="password" type="password" placeholder="********" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="fxt-checkbox-area">
                                    <div class="checkbox">
                                        <input id="checkbox1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="checkbox1">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="fxt-btn-fill">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- jquery-->
<script src="{{asset('assets_front')}}/login/js/jquery-3.3.1.min.js"></script>
<!-- Popper js -->
<script src="{{asset('assets_front')}}/login/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset('assets_front')}}/login/js/bootstrap.min.js"></script>
<!-- Imagesloaded js -->
<script src="{{asset('assets_front')}}/login/js/imagesloaded.pkgd.min.js"></script>
<!-- Validator js -->
<script src="{{asset('assets_front')}}/login/js/validator.min.js"></script>
<!-- Custom Js -->
<script src="{{asset('assets_front')}}/login/js/main-login.js"></script>

</body>
</html>

