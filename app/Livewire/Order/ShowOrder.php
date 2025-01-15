<?php

namespace App\Livewire\Order;

use App\Models\customer;
use App\Models\order;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOrder extends Component
{
    use WithPagination;


    public function delete(order $order)
    {
        $order->delete();
    }


    public function render()
    {

        $orders = order::query()
            ->addSelect(['customer_name' => customer::select('name')
                ->whereColumn('id', 'orders.customer_id')
            ])
//            ->with('product')
            ->paginate(10);

//        dd($orders->links());
        return view('livewire.order.show-order', [
            'orders' => $orders,
//            'links' => $orders->links(),
        ]);
//        return view('livewire.order.show-order');
//        return view('livewire.order.show-order', [ 'orders' => order::with(['customer' => fn ($query) => $query->select('id', 'name')])->paginate(10)]);
    }
}
