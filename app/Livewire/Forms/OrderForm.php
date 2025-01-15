<?php

namespace App\Livewire\Forms;

use App\Http\Resources\Order_ItemResource;
use App\Models\customer;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrderForm extends Form
{
    public $order;
    public $items;
    public $item;

    public function __construct()
    {
        $this->items = collect(); // Initialize as an empty collection
    }


    public function create($order, $items)
    {
//        dd($order, $items);
        $this->createOrder($order);


        $this->items = $items;
        foreach ($this->items as $item) {

            $item = $this->setItem($item);

            $this->createOrderItem($item);
        }
    }

    public function createOrder($order)
    {

        $this->order = new order($order);
        $this->order->save();
    }

    public function createOrderItem($item)
    {
        $this->item =  new order_item($item);
//        dd($item);
        $this->item->save($item);
    }

    public function setItem ($item)
    {
        return [
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'total_price' => $item['price'],
            'order_id' =>$this->order->id,
        ];
    }

    public function update($orderData, $itemsData)
    {
//        dd($orderData);
        $this->updateOrder($orderData);
        $this->syncOrderItems($itemsData);
    }

    public function updateOrder($orderData)
    {
        $this->order = order::query()->find($orderData['id']);
        $this->order->update($orderData);
    }

    public function syncOrderItems($itemsData)
    {
        $existingItemIds = $this->order->items->pluck('id')->toArray();
        $newItemIds = collect($itemsData)->where('id','!=',null)->pluck('id')->toArray();

        $itemsToDelete = array_diff($existingItemIds, $newItemIds);
//        dd($existingItemIds, $newItemIds, $itemsData, $itemsToDelete);

        order_item::destroy($itemsToDelete);

        foreach ($itemsData as $item) {
            $itemData = $this->setItem($item);
            if (isset($item['id'])) {
                order_item::query()->find($item['id'])->update($itemData);
            }else{
                $this->createOrderItem($itemData);
            }

        }

    }

    public function get_otder_item_as_array(order $order)
    {
        $items = [];

//        dd($order->items()->with('product')->get()[0]->product);
        foreach ($order->items()->with('product')->get() as $item) {
            $items[] = [
                'id' => $item['id'],
                'product_id' => $item['product_id'],
                'product' => $item->product,
                'quantity' => $item['quantity'],
                'price' => $item['total_price'],
                'order_id' => $order->id,
            ];
        }

//        dd($items);

        return $items;

    }




}
