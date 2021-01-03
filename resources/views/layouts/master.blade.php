<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bloger</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your,Keywords">
    <meta name="author" content="ResponsiveWebInc">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


   {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">--}}

    <link href="{{\Illuminate\Support\Facades\URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{\Illuminate\Support\Facades\URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{\Illuminate\Support\Facades\URL::asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="#">
</head>

<body>

<div class="wrapper">

    <!-- header -->
    <header>
        <!-- navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img class="img-responsive" src="{{\Illuminate\Support\Facades\URL::asset('assets/logo.png')}}" alt="Logo" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                        @if(\Illuminate\Support\Facades\Route::has('register'))
                        <li><a href="{{ route('register') }}">Signup</a></li>
                        @endif
                        @if(\Illuminate\Support\Facades\Route::has('login'))
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @endif

                        @else

                            <li class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                    <ul class="dropdown-menu" role="menu">
                                   <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                   </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->roleId == 1)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('create')}}">Add Article</a></li>

                                    </ul>
                                </li>
                            @endif
                        @endguest

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>

    <!-- banner -->
    <div class="banner">
        <div class="container">
            <!-- heading -->
            <h2>Browse your favourite articles!</h2>
            <!-- paragraph -->
        </div>
    </div>
    <!-- banner end -->

    <!-- after banner -->

    <!-- after banner end-->

    <!-- events -->
@yield('content')
    <!-- events end -->

    <!-- blog -->

    <!-- blog end -->

    <!-- subscribe -->
    <div class="subscribe" id="subscribe">
        <div class="container">
            <!-- subscribe content -->
            <div class="sub-content">
                <h3>Subscribe Here for Updates</h3>
                <form role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email...">
                        <span class="input-group-btn">
										<button class="btn btn-default" type="button">Subscribe</button>
									</span>
                    </div><!-- /input-group -->
                </form>
            </div>
        </div>
    </div>
    <!-- subscribe end -->

    <!-- team -->

    <!-- team end -->

    <!-- footer -->
    <footer>
        <div class="container">
            <p><a href="{{route('index')}}">Home</a> | <a href="#contact">Contact</a></p>
            <div class="social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
            </div>
            <!-- copy right -->
            <!-- This theme comes under Creative Commons Attribution 4.0 Unported. So don't remove below link back -->
        </div>
    </footer>

</div>


<!-- Javascript files -->
<!-- jQuery -->
 {{--<script src="assets/js/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Respond JS for IE8 -->
<script src="assets/js/respond.min.js"></script>
<!-- HTML5 Support for IE -->
<script src="assets/js/html5shiv.js"></script>
<!-- Custom JS -->
<script src="assets/js/custom.js"></script>--}}

<script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/jquery.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/respond.min.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/custom.js')}}"></script>

</body>
</html>
