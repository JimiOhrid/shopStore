<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Permission;
use App\PermissionRoute;

class Authorization
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * @var Permission
     */
    private $permission;

    /**
     * @var PermissionRoute
     */
    private $permissionRoute;

    /**
     * Constructor of the AuthorizeMiddleware class
     *
     * @param Guard $auth
     * @param Permission $permission
     * @param PermissionRoute $permissionRoute
     */
    public function __construct(Guard $auth, Permission $permission, PermissionRoute $permissionRoute)
    {
        $this->auth = $auth;
        $this->permission=$permission;
        $this->permissionRoute=$permissionRoute;
    }

    /**
     * Handle an incoming request.
     * If a user can't reference the request uri, and that uri belongs to a permission he doesn't have,
     * than the request is terminated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($this->auth->check()) {
            $user = $this->auth->user();
            $permissions = $this->permission->all();
            $uri = $request->route()->uri();
            if (!($this->canRefence($user, $uri))) {
                foreach ($permissions as $permission) {
                    if (!($user->can($permission->name))) {
                        $routes = $this->permissionRoute->where('permission_id', '=', $permission->id)->get();
                        foreach ($routes as $route) {
                            if ($route->route == $uri) {
                                abort(401);
                            }
                        }
                    }
                }
            }
        }else{
            abort(401);
        }
        return $next($request);
    }

    /**
     * Checking if the given user can reference the given uri.
     *
     * @param $user
     * @param $uri
     * @return bool
     */
    public function canRefence($user, $uri)
    {
        $permissions = $this->permission->all();
        foreach($permissions as $permission)
        {
            if($user->can($permission->name)) {
                $routes = $this->permissionRoute->where('permission_id', '=', $permission->id)->get();
                foreach ($routes as $route) {
                    if ($route->route == $uri) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

}
