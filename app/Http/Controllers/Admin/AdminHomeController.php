<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;

class AdminHomeController extends Controller
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
        return view('ecomm.admin.home');
    }
}
