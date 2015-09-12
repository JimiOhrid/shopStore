<?php namespace App\Http\Controllers\RbacControllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\PermissionRoute;

class RolesPermissionsController extends Controller
{
	/**
     * Constructor
     *
     */
    public function __construct()
	{
        //
	}

    /**
     * Table of all roles and their permissions
     *
     * @return \Illuminate\View\View
     */
    public function index()
	{
		$roles = Role::all();
		$permissions = Permission::all();
        $routes=PermissionRoute::select('route', 'id','permission_id')->get();
		return view('rbac-gui.roles_permissions.index', compact('roles', 'permissions','routes'));
	}

    /**
     * Method for attaching permissions to roles in the database.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
	{
		$input = $request->all();
		$roles = Role::all();
		foreach($roles as $role)
		{
			$permissions_sync = isset($input['roles'][$role->id]) ? $input['roles'][$role->id]['permissions'] : [];
			$role->permissions()->sync($permissions_sync);
		}
		return redirect('rbac/role_permission')->withSuccess('Permissions successfully updated');
	}
}