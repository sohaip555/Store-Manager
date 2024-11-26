<?php

namespace App\Livewire\Customer;

use App\Models\customer;
use Livewire\Component;

class ShowCustomers extends Component
{

    public $customers;

//    public function mount()
//    {
//        $this->customers = customer::all();
//    }


    public function delete(customer $customer)
    {
        $customer->delete();
    }

    public function render()
    {
        $this->customers = customer::all();
        return view('livewire.customer.show-customers', [ 'customers' => $this->customers ]);
    }
}
