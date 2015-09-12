<?php

namespace App\Http\Controllers\RbacControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Permission;
use App\Role;

class RolesController extends Controller
{

    /**
     * Constructor of the RolesController.
     *
     */
    public function __construct()
    {
        //
    }


    /**
     * List of roles ordered by the date of creation.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::latest('created_at')->paginate(10);
        return view('rbac-gui.roles.index',compact('roles'));
    }


    /**
     * Form for creating new role is shown with this method.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $role = new Role();
        $permissions = Permission::lists('name','id');
        return view('rbac-gui.roles.create', compact('role', 'permissions'));
    }


    /**
     * Method for stroring a new role in the database.
     *
     * @param RoleRequest $request
     * @return mixed
     */
    public function store(RoleRequest $request)
    {
        $role = new Role($request->all());

        $role->save();
        if(is_null($request->get('permissions')))
        {
            $role->permissions()->sync([]);
        }
        else
        {
            $role->permissions()->sync($request->get('permissions'));
        }
        return redirect(route('rbac.roles.index'))->withSuccess('You have successfully created a new role.');
    }

    /**
     * Form for editing an existing role with the given id is shown with this method.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::lists('name', 'id');
        return view('rbac-gui.roles.edit', compact('role','permissions'));
    }

    /**
     * Method for updating an existing role with the given id in the database.
     *
     * @param $id
     * @param UpdateRoleRequest $request
     * @return mixed
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = Role::find($id);
        $role->update($request->all());
        if(is_null($request->get('permissions')))
        {
            $role->permissions()->sync([]);
        }
        else
        {
            $role->permissions()->sync($request->get('permissions'));
        }

        return redirect(route('rbac.roles.index'))->withSuccess('You have successfully updated a role.');
    }

    /**
     * Method for destroying an existing role with the given id in the database.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $role=Role::find($id);
        $role->delete();
        return redirect(route('rbac.roles.index'))->withSuccess('You have successfully removed a role.');
    }
}
