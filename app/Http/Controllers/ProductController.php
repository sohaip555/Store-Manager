<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\product;

class ProductController extends Controller
{
    public function show()
    {
        return view('product.show');
    }

    public function create()
    {
        return view('product.add');
    }

    public function edit(product $product)
    {
        return view('product.edit', ['product' => $product]);
    }
}
