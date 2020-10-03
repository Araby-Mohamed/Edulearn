<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Edulearn" />
    <meta name="keywords" content="Edulearn" />
    <meta name="robots" content="index, follow" />
    <title>Edulearn</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="{{url('assets_front')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{url('assets_front')}}/css/jquery.scrollbar.css" />
    <link rel="stylesheet" href="{{url('assets_front')}}/css/style.css" />
    <link rel="stylesheet" href="{{url('assets_front')}}/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{url('assets_front')}}/css/font-awesome.min.css" />
    <link href="{{url('assets_front')}}/css/emoji.css" rel="stylesheet">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">


    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{url('assets_front')}}/images/fav.png"/>
    @yield('css')

</head>
<body>

<!-- Header
================================================= -->
<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('assets_front')}}/images/logo-white.png" style="margin-top: -6px" alt="logo" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-menu">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome {{auth()->user()->first_name}} <span>
                                <img src="{{asset('assets_front')}}/images/down-arrow.png" alt="" />
                            </span>
                        </a>
                        <ul class="dropdown-menu page-list">
                            <li><a href="{{url('student/profile')}}">Profile</a></li>
                            <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>
<!--Header End-->