<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\order;

class OrderController extends Controller
{
    public function show()
    {
        return view('order.show');
    }

    public function create()
    {
        return view('order.create');
    }

    public function edit(order $order)
    {
        return view('order.edit', ['order' => $order]);
    }
}
