<?php

namespace App\Http\Resources;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'customer_id' => $this->customer_id,
            'customer' => CustomersResource::make($this->whenLoaded('customer')),
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];
    }
}






