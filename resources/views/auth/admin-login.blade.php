<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>Edulearn Admin Login</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{url('/')}}/assets/css/login-4.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles -->
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{url('/')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{url('/')}}/assets/media/logos/fav5.png" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{url('/')}}/assets/2519376-.jpg); background-size:cover">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{url('/')}}/assets/logo-white.png">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Sign In To Admin</h3>
                        </div>
                        @include('admin.layouts.message')
                        <form class="kt-form" method="post" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="input-group">
                                <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid ' : '' }}" type="text" placeholder="Email" name="email" autocomplete="off">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row kt-login__extra">
                                <div class="col">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                        <span></span>

                                    </label>
                                </div>

                            </div>
                            <div class="kt-login__actions">
                                <button class="btn btn-brand btn-pill kt-login__btn-primary" style="background-color: #03979d;border-color: #03979d;">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->
</body>
<!-- end::Body -->
</html>
