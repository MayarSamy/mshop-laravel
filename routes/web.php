<?php

use Illuminate\Support\Facades\Route;

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

 /*Route::get('/', function(){
     return 'INDEX';
 })->name('index');*/
Route::get('/', function(){
     return redirect('login');
 });
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DashboardController')->name('dashboard');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');  
    
    Route::get('/get-products', 'ProductController@getProudcts')->name('get-products');

    Route::resource('customers', 'customerController');
    Route::resource('payments', 'PaymentController');
    Route::resource('orders', 'OrderController');
    //Route::resource('/inventories', 'inventoryController');

});

Auth::routes();


Route::get('/customers/register', 'Auth\RegisterController@customerRegisterForm')
        ->name('customer-register-form');
Route::post('/customers/register', 'Auth\RegisterController@registerCustomer')
        ->name('register-customer');

Route::get('/customers/login', 'Auth\LoginController@customerLoginForm')
        ->name('customer-login-form');
Route::post('/customers/login', 'Auth\LoginController@LoginCustomer')
        ->name('login-customer');
        
