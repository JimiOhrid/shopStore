<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use App\OrderItem;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Session\Store as Session;
use App\Events\CheckoutEvent;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    /**
     * @var Session
     */
    private $session;

    private $auth;

    private $user;

    /**
     * CheckoutController constructor.
     */
    public function __construct(Session $session, Guard $auth,User $user)
    {
        $this->user=$user;
        $this->session=$session;
        $this->auth=$auth;
    }

    /**
     * Making a charge.
     *
     * @param Request $request
     * @param Order $orderModel
     * @return \Illuminate\View\View
     */
    public function charge(Request $request,Order $orderModel){
        $token=$request->get('stripeToken');
        $amount=$request->get('amount');
        if($this->auth->check()) {
            $this->auth->user()->charge($amount, ['source' => $token]);
        }else{
            $this->user->charge($amount, ['source' => $token]);
        }
        if (!$this->session->has('cart')) {
            abort(403,'There is no cart stored in the session!');
        }
        $cart = $this->session->get('cart');
        if ($cart->getTotal() > 0) {
            $order = $orderModel->create([
                'user_id' => $this->auth->user()->id,
                'total' => $cart->getTotal(),
            ]);
            foreach ($cart->all() as $k => $item) {
                $order->items()->create([
                    'product_id' => $k,
                    'price' => $item['price'],
                    'qty' => $item['qtty']
                ]);
            }
            $cart->clear();
            return view('ecomm.shop.orders', ['orders' => Auth::user()->orders]);
        }
        return view('ecomm.shop.cart',['cart' => $cart]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function pay()
    {
        $cart=$this->session->get('cart');
        return view('ecomm.shop.checkout',compact('cart'));
    }
}
