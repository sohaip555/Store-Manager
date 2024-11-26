<?php

namespace App\Livewire\Order;

use App\Livewire\Forms\OrderForm;
use App\Models\customer;
use App\Models\order;
use App\Models\product;
use Illuminate\Support\Arr;
use Livewire\Component;

class EditOrder extends Component
{

    public  OrderForm $form;
    public array $items = [];



    public function rules(): array
    {
        return [
            'form.customer_id' => ['required'], // Check if customer ID exists
//            'form.quantityOfOrder' => ['required'], // Must be a positive integer
//            'form.total_price_order' => ['required'], // Must be a non-negative number
//            'form.items.*.product_id' => ['required'], // For each item, product_id must exist
//            'form.items.*.quantity' => ['required'],    // Each item must have a quantity
        ];
    }

    public function mount(order $order)
    {

        $this->form = new OrderForm();
        $this->form->customers = customer::all();
        $this->form->products = product::all();
        $this->form->items = collect();


        $this->items = $this->form->setOrder($order);


    }

    public function addItem()
    {
        $this->items[] = [
            'quantity' => 1,
            'product_id' => 1,
        ];

    }

    public function delete($index)
    {
        Arr::forget($this->items, $index);
    }

    public function save()
    {

        $this->form->setForUpdate($this->items);

//        dd($this->items, $this->items);
        $this->validate();
        $this->form->update();

        $this->redirect('/order/show');
    }

    public function render()
    {
        return view('livewire.order.edit-order');
    }
}