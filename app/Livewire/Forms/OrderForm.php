<?php

namespace App\Livewire\Forms;

use App\Livewire\CreateOrder;
use App\Models\customer;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrderForm extends Form
{
//    public array $items = [];
//    #[Validate('required')]
    public Collection $items;
    public $order_id;

    public function __construct()
    {
        $this->items = collect(); // Initialize as an empty collection
    }


//  for the order property
    #[Validate('required')]
    public $customer_id;
    #[Validate('required')]
    public $quantityOfOrder;
    #[Validate('required')]
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

/*        dd($this->customer_id,$this->quantityOfOrder, $this->total_price_order);*/




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

//            $this->setOrderItem($item);


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
