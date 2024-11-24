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



    public order $order;

    #[Validate('required')]
    public $customer_id;
    #[Validate('required')]
    public $quantityOfOrder = 0;
    #[Validate('required')]
    public $total_price_order;





    public array $items = [];

    public order_item $order_item;



//  For modification or edit
    public ?product $product;

    public ?customer $customer;
//    select option
    public $customers = [];

    public $products = [];
//  for order_items story




    #[Validate('required')]
    public $order_id;
    #[Validate('required')]
    public $quantity = 1;
    #[Validate('required')]
    public $product_id;
    #[Validate('required')]
    public $total_price_item;








    public function calculatePriceAndQuantity()
    {

//        dd($this->items);

        foreach ($this->items as $item) {
            foreach ($item as $key => $value) {
                $name = $key;

            }

//            if (isset($item["product_id"]))
//                dd($item);



                $this->total_price_order += $item["quantity"] * $this->products->where('id', $item["product_id"])->first()->price;
            $this->quantityOfOrder++;

        }

//        dd($this->quantityOfOrder);

    }



    public function setOrderItem()
    {
        foreach ($this->items as $item) {

//            $this->product_id = $item['product_id'];
//            $this->quantity = $this->item['quantity'];
//            $this->total_price_item = $this->quantity * $this->products->where('product_id', $this->product_id)->first()->price;
//
//            $this->validate([
//                'product_id' => 'required',
//                'total_price_item' => 'required',
//                'order_id' => 'required',
//            ]);

            order_item::create($this->only(['product_id', 'quantity', 'total_price_item', 'order_id']));

        }

    }


    public function storeOrder()
    {
        $this->calculatePriceAndQuantity();

        $this->order->customer_id  = $this->customer_id;
        $this->order->quantity = $this->quantityOfOrder;
        $this->order->total_price_order = $this->total_price_order;


    }


    public function createOrder()
    {

        $this->storeOrder();


        $this->validate([
            'customer_id' => 'required',
            'quantityOfOrder' => 'required',
            'total_price_order' => 'required',

        ]);


        $this->order = order::create([
            'customer_id' => $this->customer_id,
            'quantity' => $this->quantityOfOrder,
            'total_price' => $this->total_price_order,
        ]);

        dd($this->order);

    }



    public function store()
    {

//        dd($this->only(["customer_id", "quantityOfOrder", 'total_price_order']));

        $this->createOrder();

        $this->setOrderItem();


    }



}
