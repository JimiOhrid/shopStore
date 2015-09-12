<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <style>
        body {
            margin-top: 80px;
        }
        .row{
            margin-bottom: 50px
        }
    </style>
</head>
<body bgcolor="#7fffd4">
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="collapse navbar-collapse col-sm-3">
            <a class="navbar-brand" href="{{ route('home') }}">E-SHOP <span
                        style="color: #0083C9">Online Store</span></a>

            <div class="social-icons pull-left">
                <ul class="nav navbar-nav">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse col-sm-9 pull-right">
            <ul class="list-inline nav navbar-nav">
                @if (Auth::check() && Auth::user()->hasRole('rbacAdmin'))
                    <li><a href="{{ route('rbac.index') }}"><i class="fa fa-lock"></i>RBAC</a></li>
                @endif
                    @if (Auth::check() && Auth::user()->hasRole('shopAdmin'))
                        <li><a href="{{ route('adminHome') }}"><i class="fa fa-lock"></i>ADMINISTRATION</a></li>
                @endif
                @if (Auth::guest())
                    <li><a href="{{ url('auth/register') }}"><i class="fa fa-pencil-square"></i>Sign up</a></li>
                @endif
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}"><i class="fa fa-lock"></i>Login</a></li>
                @else
                    <li><a href="{{ url('/auth/logout') }}">
                            <i class="fa fa-power-off"></i>Logout ({{ Auth::user()->name }})</a></li>
                @endif
                <li><a href="{{ route('account.orders') }}"><i class="fa fa-user"></i> My account</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Contact</a></li>
                <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            </ul>
        </div>
    </nav>
</header>
<section>
    <div class="container-fluid">
        <div class="row-fluid">
            @yield('categories')
            <div class="col-sm-10">
                <header class="jumbotron hero-spacer">
                    <h1 style="text-align: center">Welcome to our sport clothing store!</h1>
                    <p style="text-align: center">You can always count on us</p>
                    </p>
                </header>
                <hr/>
                @if(Route::getCurrentRoute()->uri() == '/' or Route::getCurrentRoute()->uri() == 'home')
                    <div class="row">
                        <div style="text-align: center;">
                            <h1>Latest Recomendations</h1>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @yield('content')
    </div>
</section>
<footer></footer>
<script src="{{elixir('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    (function () {
        $('select').select2();
    })();
</script>
@yield('script')
</body>
</html>