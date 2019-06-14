<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subscribe;
use Newsletter;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

   function home() {
      $categories = Category::all();
      $products  = Product::orderBy('updated_at', 'desc')->take(4)->get();
   	return view ('welcome', compact('categories', 'products'));
   }
   function founder() {
   	$name = "BRTAHUB";
   	$role = "<em>Instructor</em>";
   	return view ('pages.founder', compact('name', 'role'));
   	// return view('pages.founder')->with(['name'=>$name, 'role' =>$founder]);

   }
   function about() {
   	return view ('pages.about');
   }
   function contact() {
   	return view ('pages.contact');
   }
   function category() {
   	return view ('pages.category');
   } 
   function cart() {
      return view ('pages.cart');
   }
   function checkout() {
      return view ('pages.checkout');
   }
   function subscribe(Request $request)
   {
      $subscribe = new Subscribe();
      $subscribe->email = $request->email;
      $subscribe->save();
      Newsletter::subscribe($request->email);
      flash('Thank you for subscribing, Expect awesome.', 'success');
      return redirect()->back();
   }
}
