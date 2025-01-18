<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Livewire\Customer\ShowCustomers;
use App\Livewire\Customer\CreateCustomer;
use App\Livewire\Customer\EditCustomer;
use App\Livewire\Home;
use App\Models\customer;

use App\Models\order;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::Resource('/customer', CustomerController::class);
    Route::Resource('/order', OrderController::class);
    Route::Resource('/product', ProductController::class);
    Route::get('/', function ()
    {
        return view('livewire.home');
    });

});


Route::get('/logout', function ()
{
    Auth::logout();

    return redirect('/');
});
//Route::get('/register', function ()
//{
//    return view('auth.register');
//});

Route::get('/', function ()
{
    return view('livewire.home');
});

//Route::get('/customer/show', function ()
//{
//    return view('customers.show');
//});
//
//Route::get('/customer/create', function ()
//{
//    return view('customers.create');
//});
//
//Route::get('/customer/{customer}/edit', function (customer $customer)
//{
//    return view('customers.edit', ['customer' => $customer]);
//});
//
//Route::get('/product/show', function () {
//    return view('product.show');
//});
//
//
//Route::get('/product/create', function () {
//    return view('product.add');
//});
//
//Route::get('/product/{product}/edit', function (product $product)
//{
//    return view('product.edit', ['product' => $product]);
//});

//Route::get('/order/show', function () {
//    return view('order.show');
//});
//
//Route::get('/order/create', function () {
//    return view('order.create');
//});
//
//Route::get('/order/{order}/edit', function (order $order)
//{
//    return view('order.edit', ['order' => $order]);
//});



