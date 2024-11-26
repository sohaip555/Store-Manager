<?php

namespace App\Livewire\Order;

use App\Models\order;
use Livewire\Component;

class ShowOrder extends Component
{

    public $orders;


    public function delete(order $order)
    {
        $order->delete();
    }


    public function render()
    {
        $this->orders = order::with('customer')->get();
        return view('livewire.order.show-order', [ 'orders' => $this->orders ]);
    }
}
