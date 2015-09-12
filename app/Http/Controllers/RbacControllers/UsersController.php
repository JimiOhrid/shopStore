<?php

namespace App\Http\Controllers\RbacControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Constructor     *
     */
    public function __construct()
    {
        //
    }

    /**
     * List of users ordered by the date of creation.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::latest('created_at')->paginate(10);
        return view('rbac-gui.users.index', compact('users'));
    }

//    /**
//     * Show the form for creating a new resource.
//     * GET /roles/create
//     *
//     * @return Response
//     */
//    public function create()
//    {
//        /*$user_class = $this->config->get('auth.model');
//        $user = new $user_class;
//        $roles = $this->role->lists('name', 'id');
//
//        return view(
//            'entrust-gui::users.create',
//            compact(
//                'user',
//                'roles'
//            )
//        );*/
//        $user = new User();
//        $roles = Role::lists('name','id');
//        return view('rbac-gui.users.create', compact('user', 'roles'));
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     * POST /roles
//     *
//     * @return Response
//     */
//    public function store()
//    {
//        /*try {
//            $user = $this->gateway->create($this->request);
//        } catch (ValidationException $e) {
//            return back()->withErrors($e->getErrors());
//        }
//        return redirect(route('entrust-gui::users.index'))
//            ->withSuccess(trans('entrust-gui::users.created'));*/
//        $this->validate($this->request, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6',
//        ]);
//        $user = new \App\User($this->request->all());//($request->all());
//        $user->save();
//
//        $user->roles()->sync($this->request->get('roles'));
//        return redirect(route('rbac.users.index'))->withSuccess('You have successfully created a new user.');
//
//    }
//    /**
//     * Remove the specified resource from storage.
//     * DELETE /roles/{id}
//     *
//     * @param int $id
//     *
//     * @return Response
//     */
//    public function destroy($id)
//    {
//        $user=User::find($id);
//        $user->delete();
//        return redirect(route('rbac.users.index'))->withSuccess('You have successfully removed a user.');
//    }


    /**
     * Form for editing an existing user with the given id is shown with this method.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::lists('name', 'id');
        return view('rbac-gui.users.edit', compact('user','roles'));
    }

    /**
     * Method for updating an existing user with the given id in the database.
     * Only the role(s) of the user can be changed.
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->roles()->sync($request->get('roles'));
        return redirect(route('rbac.users.index'))->withSuccess('You have successfully updated a user.');
    }
}
