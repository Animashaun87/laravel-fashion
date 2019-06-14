<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//PageController Section
Route::get('/', 'PageController@home');
Route::get('/home', 'PageController@home');
Route::get('about/founder', 'PageController@founder');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact'); 
Route::get('cart', 'CartController@index');
Route::get('category', 'PageController@category');
Route::get('checkout', 'CheckoutController@index');

//Category Routes
   
Route::get('categories/create', 'CategoryController@create')->middleware('admin');
Route::post('categories/create', 'CategoryController@store');
Route::get('category/{url}', 'CategoryController@show'); 

Route::get('categories/edit/{id}', 'CategoryController@edit');
Route::post('categories/edit/{id}', 'CategoryController@update');

Route::get('categories/delete/{id}', 'CategoryController@delete');
Route::post('categories/delete/{id}', 'CategoryController@destroy');

//Product Routes
Route::get('products/create', 'ProductController@create')->middleware('admin');
Route::post('products/create', 'ProductController@store');
Route::get('product/{url}', 'ProductController@show');
Route::get('products/edit/{id}', 'ProductController@edit');
Route::post('products/edit/{id}', 'ProductController@update');
Route::get('products/delete/{id}', 'ProductController@delete');
Route::post('products/delete/{id}', 'ProductController@destroy');

//cart Routes
Route::get('product/cart/{id}','CartController@add');
Route::get('cart/counter', 'CartController@count');
Route::get('product/cart/{id}/{qty}', 'CartController@add_with_qty');
Route::get('cart_table', 'CartController@cart_table');
Route::get('cart_table/{rowId}/{qty}', 'CartController@cart_table_update');
Route::get('remove_cart_item/{rowId}', 'CartController@remove_cart_item');

// Payment
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('invoice/{batch_code}', 'PaymentController@invoice');

Route::get('account', 'AccountController@index');
Route::post('change_password', 'AccountController@change_password');
Route::post('profile_update', 'ProfileController@update');

//newsletter route
Route::post('subscribe', 'PageController@subscribe');
    
 //Auth Section                      
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
