<?php

namespace App\Http\Resources;

use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Order_ItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->product_id,
//            'product' => ProductResource::make($this->whenLoaded('product')),
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'order_id' => $this->order_id,
//            'order' => OrderResource::make($this->whenLoaded('order')),
        ];
    }
}
