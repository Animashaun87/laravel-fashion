<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function update(Request $request)
    {
    	$user = auth()->user();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone_number = $request->phone_number;
    	$user->address = $request->address;
    	$user->town = $request->town;
    	$user->state = $request->state;
    	$user->country = $request->country;
    	$user->save();
    	flash('User updated successfully.', 'success');
    	return redirect()->back();
    }
}
