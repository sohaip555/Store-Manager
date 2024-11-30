<?php

namespace App\Livewire;

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
        $this->orders = order::all();
        return view('livewire.show-order', [ 'orders' => $this->orders ]);
    }
}
