<?php

namespace App\Livewire\Forms;


use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Support\Collection;
use Livewire\Form;

class OrderForm extends Form
{
    public Collection $items;
    public order $order;

    public function __construct()
    {
        $this->items = collect(); // Initialize as an empty collection
    }


//  for the order property
    public $customer_id;
    public $quantity;
    public $total_price;


//    select option
    public $customers = [];
    public $products = [];



    public function createOrder()
    {

        if (!isset($this->customer_id))
        {
            dd('you need to select a customer');
        }

        $this->order = order::create([
            'customer_id' => $this->customer_id,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
        ]);

    }



    public function createOrderItem($item)
    {
        // Added validation to ensure data integrity
        if (!isset($item['product_id']) || !isset($item['quantity']) || $item['quantity'] <= 0) {
            throw new \Exception("Invalid item data: missing product ID or quantity, or quantity is not positive.");
        }

        $product = Product::find($item['product_id']);
        if (!$product) {
            throw new \Exception("Product not found: " . $item['product_id']);
        }

        $item->total_price = $item->quantity * $this->products->where('id', $item->product_id)->first()->price;

        order_item::create([
            'order_id' => $this->order->id,  //  the order_id is from $this not from $item
            'product_id' => $item->product_id,
            'total_price' => $item->total_price,
            'quantity' => $item->quantity,
        ]);

    }


    public function store()
    {

        $this->createOrder();

        foreach ($this->items as $item) {

            $this->createOrderItem($item);
        }


    }











    public function updateOrder()
    {
        if (!isset($this->customer_id))
        {
            dd('you need to select a customer');
        }

        $this->order->update([
            'customer_id' => $this->customer_id,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
        ]);

    }

    public function deleteOrderItem()
    {

        foreach ($this->order->items as $item) {

            $item->delete();
        }


    }


    public function update()
    {

        $this->updateOrder();

        $this->deleteOrderItem();


        foreach ($this->items as $item) {

//            $this->updateOrderItem($item);
            $this->createOrderItem($item);



        }


    }


    public function setOrder(order $order)
    {
        $items = [];

        $this->customer_id = $order->customer_id;
        $this->quantity = $order->quantity;
        $this->total_price = $order->total_price;
        $this->order = $order;

        foreach ($order->items as $item) {

            $items[] = [
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
            ];

//            $this->items->push($item);
        }


        return $items;

    }



    public function setForSave(array $items)
    {

        foreach ($items as $item) {

            if (!isset($item["quantity"]))
            {
                dd('you missed the quantity of product');
            }

            if (!isset($item["product_id"]))
            {
                dd('you forget to chose the product ');
            }

            $this->total_price +=  $item['quantity'] * $this->products->where('id', $item["product_id"])->first()->price;


            $this->items->push(new order_item($item));
        }


        $this->quantity = $this->items->count();


    }


//    public function setForUpdate(array $items)
//    {
////        dd( $items);
//
//        foreach ($items as $item) {
//
//            if (!isset($item["quantity"]))
//            {
//                dd('you missed the quantity of product');
//            }
//
//            if (!isset($item["product_id"]))
//            {
//                dd('you forget to chose the product ');
//            }
//
//            $this->total_price +=  $item['quantity'] * $this->products->where('id', $item["product_id"])->first()->price;
//
//
//
//        }
//
//
//        $this->quantity = collect($items)->count();
//
////        dd( $this->items);
//
//    }




}
