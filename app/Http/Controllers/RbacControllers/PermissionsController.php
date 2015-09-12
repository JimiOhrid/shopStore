<?php

namespace App\Http\Controllers\RbacControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Permission;
use App\Role;

class PermissionsController extends Controller
{
    /**
     * Constructor of the PermissionsController.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * List of permissions ordered by the date of creation.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::latest('created_at')->paginate(10);

        return view('rbac-gui.permissions.index', compact('permissions'));
    }


    /**
     * Form for creating new permssion is shown with this method.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $permission = new Permission();
        $roles = Role::lists('name', 'id');
        $routes = array_unique($this->getAuthorizedRoutes());
        return view('rbac-gui.permissions.create', compact('permission', 'roles', 'routes'));
    }

    /**
     * Method for stroring a new permission in the database.
     *
     * @param PermissionRequest $request
     * @return mixed
     */
    public function store(PermissionRequest $request)
    {
        $permission = new Permission($request->all());
        $permission->save();
        if(is_null($request->get('roles')))
        {
            $permission->roles()->sync([]);
        }
        else
        {
            $permission->roles()->sync($request->get('roles'));
        }
        $routes = $request->get('routes');
        foreach ($routes as $route)
        {
            $permission->routes()->create(['route' => $route]);
        }
        return redirect(route('rbac.permissions.index'))->withSuccess('You have successfully created a new permission.');
    }

    /**
     * Form for editing an existing permission with the given id is shown with this method.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        $roles = Role::lists('name', 'id');
        $routes = array_unique($this->getAuthorizedRoutes());
        return view('rbac-gui.permissions.edit', compact('permission', 'roles', 'routes'));
    }

    /**
     * Method for updating an existing permission with the given id in the database.
     *
     * @param $id
     * @param UpdatePermissionRequest $request
     * @return mixed
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = Permission::find($id);
        $permission->update($request->all());
        if(is_null($request->get('roles')))
        {
            $permission->roles()->sync([]);
        }
        else
        {
            $permission->roles()->sync($request->get('roles'));
        }
        $permission->routes()->delete();
        $routes = $request->get('routes');
        foreach ($routes as $route)
        {
            $permission->routes()->create(['route' => $route]);
        }
        return redirect(route('rbac.permissions.index'))->withSuccess('You have successfully updated a permission.');
    }

    /**
     *Method for destroying an existing permission with the given id in the database.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect(route('rbac.permissions.index'))->withSuccess('You have successfully removed a permission.');
    }

    /**
     * Get the referencable uri's from the App/routes.php.
     *
     * @return array
     */
    public function getAuthorizedRoutes()
    {
        $routeList = Route::getRoutes();
        $routes = array();
        foreach ($routeList as $route)
        {
            if (!is_null($route->getName()))
            {
                if (in_array('authorize', $route->middleware()) === true)
                {
                    array_push($routes, $route->uri());
                }
            }
        }
        $newRoutes = array_unique($routes);
        return array_values($newRoutes);
    }
}
