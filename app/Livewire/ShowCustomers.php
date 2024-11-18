<?php

namespace App\Livewire;

use App\Models\customer;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ShowCustomers extends Component
{

    public $customers;

    public function mount()
    {
        $this->customers = Customer::all();
    }


    public function delete()
    {

    }

    public function render()
    {
        return view('livewire.show-customers', [ 'customers' => $this->customers ]);
    }
}
