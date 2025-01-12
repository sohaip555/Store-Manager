<?php

namespace App\Http\Resources;

use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'brand_id' => $this->brand_id,
            'description' => $this->description,
            'price' => $this->price,
            'item_code' => $this->item_come,
            'quantity' => $this->quantity,
            'url' => $this->url,
//            'status' => $this->faker->randomElements(['delivery', 'arrived']),
        ];
    }
}
