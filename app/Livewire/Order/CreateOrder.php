<?php

namespace App\Livewire\Order;

use App\Livewire\Forms\OrderForm;
use App\Models\customer;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Livewire\Component;

class CreateOrder extends Component
{
    public OrderForm $form;
    public $Update_Or_Add = 'Add';

    // Property of <<Order>>
    public $customer_id;
    public $quantity = 0;
    public $price = 0;


    // Property of <<Order_Item>>
    public $product_id;
    public $quantityOfProduct;
    public $price_Of_Item;


    public $itemsOfOrder;
    public $customers = [];
    public $products = [];


    public function rules(): array
    {
        return [
            'quantityOfProduct' => ['required'], // Must be a positive integer
            'product_id' => ['required'], // For each item, product_id must exist
        ];
    }

    public function mount()
    {
        $this->customers = customer::query()->select('id', 'name')->get();
        $this->products = product::all();
        $this->price = 0;
        $this->itemsOfOrder = [];
//        dd($this->customers );



    }

    public function setOrderValue()
    {

        return [
            'customer_id' => $this->customer_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
    }

    public function setItemValue()
    {
        $product = $this->products->firstWhere('id', $this->product_id);
        $this->price_Of_Item = $product->price * $this->quantityOfProduct;

        return  [
            'product' => $product,
            'product_id' => $product->id,
            'quantity' => $this->quantityOfProduct,
            'price' => $this->price_Of_Item,
        ];
    }

    public function resetItem()
    {
        $this->product_id = '';
        $this->quantityOfProduct = 0;
    }

    public function addItem()
    {
//        dd($this->product_Selected, $this->quantityOfProduct);
//        dd($this->itemsOfOrder->first()->product);

        $this->validate();
        $item = $this->setItemValue();
        $this->itemsOfOrder[] = $item;

        $this->price += $this->price_Of_Item;
        $this->quantity += $this->quantityOfProduct;

        $this->resetItem();

        $this->Update_Or_Add = 'Add';

    }

    public function edit($index)
    {
        $item = $this->itemsOfOrder[$index];

//        dd( $item);
        $this->price -= $item['price'];
        $this->quantity -= $item['quantity'];
        $this->quantityOfProduct = $item['quantity'];
        $this->product_id = $item['product_id'];

        Arr::forget($this->itemsOfOrder, $index);
        $this->Update_Or_Add = 'Update';

    }

    public function delete($index)
    {
        $item = $this->itemsOfOrder[$index];

//        dd( $item);
        $this->price -= $item['price'];
        $this->quantity -= $item['quantity'];

        Arr::forget($this->itemsOfOrder, $index);
    }

    public function save()
    {
//        dd();
        $this->validate([
            'customer_id' => ['required'], // Check if customer ID exists
        ]);
//        dd($this->form->customer_id, $this->form->);

        $order = $this->setOrderValue();
        $this->form->create($order, $this->itemsOfOrder);
        $this->redirect('/order/show');
    }

    public function render()
    {

        return view('livewire.order.create-order');
    }


}
