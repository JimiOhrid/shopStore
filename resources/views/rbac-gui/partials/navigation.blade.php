<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">E-SHOP</a>
      <a class="navbar-brand" href="{{ route('rbac.index') }}">Rbac GUI</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ (Request::is('*users*') ? 'active' : '') }}"><a href="{{ route('rbac.users.index') }}">Users</a></li>
        <li class="{{ (Request::is('*roles*') ? 'active' : '') }}"><a href="{{ route('rbac.roles.index') }}">Roles</a></li>
        <li class="{{ (Request::is('*permissions*') ? 'active' : '') }}"><a href="{{ route('rbac.permissions.index') }}">Permissions</a></li>
        <li class="{{ (Request::is('*role_permission*') ? 'active' : '') }}"><a href="{{ route('rbac.role_permission.index') }}">Roles/Permissions</a></li>
      </ul>
    </div>
  </div>
</nav>
