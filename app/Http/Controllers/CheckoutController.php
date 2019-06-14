<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    
    function index()
    {
    	$carts = Cart::content();
    	$orderId = 'FSH'.uniqid().time();
    	return view('checkout.index', compact('carts', 'orderId'));
    }
}
