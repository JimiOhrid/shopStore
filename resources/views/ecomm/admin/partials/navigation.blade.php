<nav class="navbar navbar-default navbar-fixed-top">
    <div class="collapse navbar-collapse col-sm-3">
        <a class="navbar-brand" href="{{ route('home') }}">E-SHOP <span
                    style="color: #0083C9">Online Store</span></a>
    </div>
    <div class="collapse navbar-collapse col-sm-9 pull-right">
        <ul class="list-inline nav navbar-nav">
            <li><a href="{{ route('adminHome') }}">Home</a></li>
            <li><a href="{{ route('categories') }}">Categories</a></li>
            <li><a href="{{ route('products') }}">Products</a></li>
            <li><a href="{{ route('orders') }}">Orders</a></li>
            @if (Auth::guest())
                <li><a href="{{ url('/auth/login') }}"><i class="fa fa-lock"></i>Login</a></li>
            @else
                <li><a href="{{ url('/auth/logout') }}">
                        <i class="fa fa-power-off"></i>Logout ({{ Auth::user()->name }})</a></li>
            @endif
        </ul>
    </div>
</nav>
