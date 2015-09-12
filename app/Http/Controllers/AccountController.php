<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * View the account index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //
    }

    /**
     * Methid that returns list of all the orders made bythe authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function orders()
    {
        $orders = Auth::user()->orders;
        return view('ecomm.shop.orders', compact('orders'));
    }
}
