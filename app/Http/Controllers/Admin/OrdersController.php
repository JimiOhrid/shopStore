<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    /**
     * OrdersController constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Method for showing a list of orders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->paginate(10);
        return view('ecomm.admin.orders.index', compact('orders'));
    }

    /**
     * Method for showing the form for editing the status of the order.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $status = Order::statusDescriptions();
        return view('ecomm.admin.orders.edit', compact('order', 'status'));
    }

    /**
     * Method for updating the status of the order.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Order::find($id)->update($request->all());
        return redirect(route('orders'));
    }
}