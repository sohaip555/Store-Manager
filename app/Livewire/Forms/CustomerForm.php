<?php

namespace App\Livewire\Forms;

use App\Models\customer;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?customer $customer;

    #[Validate('required')]
    public $name = '';
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required')]
    public $phone = '';
    #[Validate('required')]
    public $address = '';


    public function store()
    {
        $this->validate();

        Customer::create($this->only([ 'name', 'email', 'phone', 'address']));

    }

    public function updata()
    {
        $this->validate();

        $this->customer->update($this->only([ 'name', 'email', 'phone', 'address']));

    }

    public function setCustomer(customer $customer)
    {

        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->address = $customer->address;

        $this->customer = $customer;

    }




}
