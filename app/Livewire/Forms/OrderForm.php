<?php

namespace App\Livewire\Forms;


use App\Models\order;
use App\Models\order_item;
use Illuminate\Support\Collection;
use Livewire\Form;

class OrderForm extends Form
{
    public Collection $items;
    public $order_id;

    public function __construct()
    {
        $this->items = collect(); // Initialize as an empty collection
    }


//  for the order property
    public $customer_id;
    public $quantityOfOrder;
    public $total_price_order;


//    select option
    public $customers = [];
    public $products = [];



    public function createOrder()
    {

        if (!isset($this->customer_id))
        {
            dd('you need to select a customer');
        }

        $this->order_id = order::create([
            'customer_id' => $this->customer_id,
            'quantity' => $this->quantityOfOrder,
            'total_price' => $this->total_price_order,
        ])->id;

    }



    public function createOrderItem()
    {
        foreach ($this->items as $item) {

            $item->total_price = $item->quantity * $this->products->where('id', $item->product_id)->first()->price;


            order_item::create([
                'order_id' => $this->order_id,  //  the order_id is from $this not from $item
                'product_id' => $item->product_id,
                'total_price' => $item->total_price,
                'quantity' => $item->quantity,
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
