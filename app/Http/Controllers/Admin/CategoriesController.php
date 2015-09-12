<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;

class CategoriesController extends Controller
{

    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Method for showing a table with categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('ecomm.admin.categories.index', compact('categories'));
    }


    /**
     * Method for showing a form for creating categories.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ecomm.admin.categories.create');
    }

    /**
     * Method for storing a category.
     *
     * @param CategoriesRequest $request
     * @return mixed
     */
    public function store(CategoriesRequest $request)
    {
        $category = new Category($request->all());
        $category->save();
        return redirect(route('categories'))->withSuccess('You have successfully created a new category.');
    }

    /**
     * Method for editing a category.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('ecomm.admin.categories.edit', compact('category'));
    }

    /**
     * Save category after editing.
     *
     * @param CategoriesRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoriesRequest $request, $id)
    {
        Category::find($id)->update($request->all());
        return redirect(route('categories'))->withSuccess('You have successfully updated a category.');
    }

    /**
     * Method for destroying a category.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect(route('categories'))->withSuccess('You have successfully removed a category.');
    }
}
