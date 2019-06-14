<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Order;
use App\Product;

class AccountController extends Controller
{
    function index() {
    	$user = auth()->user()->with(['successful_payments', 'paid_orders'])->first();
    	return view('accounts.index', compact('user'));
    }
    function change_password(Request $request) {
    	$old_pass = $request->old_password;
    	$new_pass = $request->new_password;
    	$confirm_pass = $request->confirm_password;

    	$user = auth()->user();

    	$isValid = password_verify($old_pass, $user->password);
    	if ($isValid == false) {
    		flash('Invalid Password. Please, check and try again.', 'danger');
    		return redirect()->back();
    	}
    	if ($new_pass !== $confirm_pass) {
    		flash('Passwords don\'t match. Please, check and try again.', 'danger');
    		return redirect()->back();
    	}

    	$user->password = bcrypt($new_pass);
    	$user->save();

    	//send mail to user informing them that they changed their password.
    	//If it's not them, you provide a mail they should reply to.

		flash('Password changed successfully', 'success');
		return redirect()->back();
    }
}
