<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Models\customer;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Support\Arr;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateOrder extends Component
{

    public OrderForm $form;
    public array $items = [];



    public function mount()
    {
       $this->form = new OrderForm();
        $this->form->customers = customer::all();
        $this->form->products = product::all();
        $this->form->items = collect();


//        set defaults value for -->>( form.customer_id )<<---
        $this->form->customer_id = $this->form->customers[0]->id;

    }



    public function save()
    {
        foreach ($this->items as $item) {

            if (!isset($item["quantity"]))
            {
                dd('you missed the quantity of product');
            }

            if (!isset($item["product_id"]))
            {
                dd('you forget to chose the product ');
            }

            $this->form->total_price_order +=  $item['quantity'] * $this->form->products->where('id', $item["product_id"])->first()->price;


            $this->form->items->push(new order_item($item));
        }

        $this->form->quantityOfOrder = $this->form->items->count();

        $this->validate();
        $this->form->store();

        $this->redirect('/order/show');
    }



    public function addItem()
    {
        $this->items[] = [
            'quantity' => 1,
            'product_id' => 1,
        ];


        dd('sdcsdc');

    }


    public function delete($index)
    {
        Arr::forget($this->form->items, $index);

    }



    public function render()
    {

        return view('livewire.create-order');
    }
}
