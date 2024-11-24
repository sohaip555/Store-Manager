<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Models\customer;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateOrder extends Component
{

    public OrderForm $form;

    public function mount()
    {

        $this->form->customers = customer::all();
        $this->form->products = product::all();
        $this->form->order = new order();




//        set defaults value for -->>( form.customer_id )<<---
        $this->form->customer_id = $this->form->customers[0]->id;

    }
    public function save()
    {

        $this->form->store();

        $this->redirect('/order/show');
    }

    public function addItem()
    {
        $this->form->items[] = [];


    }



    public function render()
    {

        return view('livewire.create-order');
    }
}
