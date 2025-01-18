<?php

namespace App\Http\Controllers;

use App\Models\customer;

class CustomerController extends Controller
{

    public function show()
    {
        return view('customers.show');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function edit(customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }
}
