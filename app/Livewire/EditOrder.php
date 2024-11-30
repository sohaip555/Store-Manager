<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Models\customer;
use App\Models\order;
use App\Models\product;
use Illuminate\Support\Arr;
use Livewire\Component;

class EditOrder extends Component
{

    public  OrderForm $form;



    public function mount( order $order)
    {

        $this->form->customers = customer::all();
        $this->form->products = product::all();


//        set defaults value for -->>( form.customer_id )<<---
        $this->form->customer_id = $this->form->customers[0]->id;


        $this->form->setOrder($order);


    }

    public function addItem()
    {
        $this->form->items[] = [];

    }

    public function delete($index)
    {
        Arr::forget($this->form->items, $index);

    }

    public function save()
    {

        $this->form->update();

        $this->redirect('/order/show');
    }

    public function render()
    {
        return view('livewire.edit-order');
    }
}
