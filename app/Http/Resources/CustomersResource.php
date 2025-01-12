<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->where($this->id == $request->user()?->id, $this->email),
            'phone' => $this->phone,
            'address' => $this->address,
        ];
    }
}
