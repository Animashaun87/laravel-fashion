<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends  Controller
{
    function index() 
    {
        $carts = Cart::content();
        return view('pages.cart', compact('carts'));
    }

    function add($id)
     {
     	$product = Product::where('id', $id)->first();
     	if (!$product) {
     		$result = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Product not found.</div>';
     		return $result;
     	}
     	$cart = Cart::add($product->id, $product->name, 1, $product->price/100)->associate('\App\Product');
    	$result = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Product added to cart successfully.</div>';
    	return $result;
    }
    
    function add_with_qty($id, $qty) 
     {
        $product = Product::where('id', $id)->first();
        if (!$product) {
            $result = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Product added to cart successfully.</div>';
            return $result;
        }
        $cart = Cart::add($product->id, $product->name, $qty, $product->price/100)->associate('\App\Product');
        $result = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Product added to Cart successfully.</div>';
        return $result;
    }
    
    function count() {
    	$count = Cart::count();
    	if ($count == 0) {
    		return "";
    	} else {
    		return '<span class="badge badge-danger">'.$count.'</span>';
    	}
    }

    function cart_table()
    {
        $carts = Cart::content();
        return view('partials.cart_table', compact('carts'));
    }
    
    function cart_table_update($rowId, $qty) {
        Cart::update($rowId, ['qty' => $qty]);
        $carts = Cart::content();
        return view('partials.cart_table', compact('carts'));
    }

    function remove_cart_item($rowId) {
        Cart::remove($rowId);
        $carts = Cart::content();
        return view ('partials.cart_table', compact('carts'));
    }
}

