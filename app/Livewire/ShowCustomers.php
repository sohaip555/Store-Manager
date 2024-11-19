<?php

namespace App\Livewire;

use App\Models\customer;
use Livewire\Attributes\Computed;
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
        return view('livewire.show-customers', [ 'customers' => $this->customers ]);
    }
}
