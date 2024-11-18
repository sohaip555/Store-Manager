<?php

use App\Livewire\Home;
use App\Models\customer;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('livewire.home');
});

Route::get('/customer/show', function ()
{
    return view('customers.show');
});

Route::get('/customer/create', function ()
{
    return view('customers.create');
});

Route::get('/customer/{customer}/edit', function (customer $customer)
{
    return view('customers.edit', ['customer' => $customer]);
});

//Route::get('/product/show', function () {
//    return view('product.show');
//});


Route::get('/product/add', function () {
    return view('product.add');
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
