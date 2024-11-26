<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\customer;
use Livewire\Component;

class EditCustomer extends Component
{

    public CustomerForm $form;


    public function mount(customer $customer)
    {
        $this->form->setCustomer($customer);

    }

    public  function save()
    {
        $this->form->updata();

        $this->redirect('/customer/show');
    }

    public function render()
    {
        return view('livewire.customer.edit-customer');
    }
}
