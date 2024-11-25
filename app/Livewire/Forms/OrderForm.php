<?php

namespace App\Livewire\Forms;

use App\Models\customer;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrderForm extends Form
{
    public array $items = [];
//    public order_item $items;


//    select option
    public $customers = [];
    public $products = [];



//    For modification or edit
//    public ?product $product;
//
//    public ?customer $customer;




    public $customer_id;
    public $quantityOfOrder = 0;
    public $total_price_order;



    public $order_id;
    public $quantityOfItem = 1;
    public $product_id = null;
    public $total_price_item;


    public function calculatePrice()
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

            $this->total_price_order += $item["quantity"] * $this->products->where('id', $item["product_id"])->first()->price;

        }

    }


    public function storeOrder()
    {
        $this->calculatePrice();
        $this->quantityOfOrder = collect($this->items)->count();

    }


    public function createOrder()
    {

        if (!isset($this->customer_id))
        {
            dd('you need to select a customer');
        }


        $this->storeOrder();

        $this->validate([
            'customer_id' => 'required',
            'quantityOfOrder' => 'required',
            'total_price_order' => 'required',

        ]);


        $this->order_id = order::create([
            'customer_id' => $this->customer_id,
            'quantity' => $this->quantityOfOrder,
            'total_price' => $this->total_price_order,
        ])->id;

    }

    public function setOrderItem($item)
    {

        $this->product_id = $item['product_id'];
        $this->quantityOfItem = $item['quantity'];
        $this->total_price_item = $this->quantityOfItem * $this->products->where('id', $item['product_id'])->first()->price;


    }


    public function createOrderItem()
    {

        foreach ($this->items as $item) {

            $this->setOrderItem($item);


            $this->validate([
                'product_id' => 'required',
                'quantityOfItem' => 'required',
                'total_price_item' => 'required',
                'order_id' => 'required',
            ]);

            order_item::create([
                'order_id' => $this->order_id,
                'product_id' => $this->product_id,
                'total_price' => $this->total_price_item,
                'quantity' => $this->quantityOfItem,
            ]);

        }


    }



    public function store()
    {

        $this->createOrder();

        $this->createOrderItem();


    }








































    public function setOrder(order $order)
    {
        $counter = 0;


        $this->customer_id = $order->customer_id;
        $items = $order->items;
        foreach ($items as $item) {

            $this->items[$counter]['quantity'] = $item['quantity'];
            $this->items[$counter]['product_id'] = $item['product_id'];
            $this->total_price_order += $item["quantity"] * $this->products->where('id', $item["product_id"])->first()->price;



            $counter++;
        }

        $this->order_id = $order->id;

    }


    public function update()
    {

    }


}
