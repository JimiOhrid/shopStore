<html>
<head>
    <meta charset="UTF-8">
    <title>RBAC Administration</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        body {
            margin-top: 60px;
        }
    </style>
</head>
<body>
@include('rbac-gui.partials.navigation')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-xs-12">
            <h1>@yield('heading')</h1>
            @include('rbac-gui.partials.notifications')
            @yield('content')
        </div>
    </div>
</div>
<script src="{{elixir('js/app.js')}}"></script>
<script>
    (function() {
        $('select').select2();
    })();
</script>
</body>
</html>
