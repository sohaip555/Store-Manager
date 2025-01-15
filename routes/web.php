<?php

use App\Livewire\Home;
use App\Models\customer;
use App\Models\order;
use App\Models\product;
use Illuminate\Support\Facades\Route;

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


Route::resource('customer', customer::class);

Route::get('/product/show', function () {
    return view('product.show');
});


Route::get('/product/add', function () {
    return view('product.add');
});

Route::get('/product/{product}/edit', function (product $product)
{
    return view('product.edit', ['product' => $product]);
});

Route::get('/order/show', function () {
    return view('order.show');
});

Route::get('/order/create', function () {
    return view('order.create');
});

Route::get('/order/{order}/edit', function (order $order)
{
    return view('order.edit', ['order' => $order]);
});



//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
