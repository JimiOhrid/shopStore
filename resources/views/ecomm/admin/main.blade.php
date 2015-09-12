<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ADMINISTRATION | E-Shop</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <style>
        body {
            margin-top: 80px;
        }
    </style>
</head>
<body>
@include('ecomm.admin.partials.navigation')
<section>
    <div class="container-fluid">
        @yield('categories')
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <header class="jumbotron hero-spacer">
                    <h3 style="text-align: center"><i class="fa fa-lock"></i>This is the Administration account!</h3>
                </header>
                <hr/>
            </div>
        </div>
        @include('ecomm.admin.partials.notifications')
        @yield('content')
    </div>
</section>
<footer></footer>

<script src="{{elixir('js/app.js')}}"></script>
{{--<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>--}}
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