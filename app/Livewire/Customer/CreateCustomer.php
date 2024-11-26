<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use Livewire\Component;

class CreateCustomer extends Component
{
    public CustomerForm $form;

    public function save()
    {
        $this->form->store();

        $this->redirect('/customer/show');
    }
    public function render()
    {
        return view('livewire.customer.create-customer');
    }
}
