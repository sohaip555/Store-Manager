<?php

namespace App\Livewire;

use App\Livewire\Forms\CustomerForm;
use Livewire\Component;

use function Livewire\store;

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
        return view('livewire.create-customer');
    }
}
