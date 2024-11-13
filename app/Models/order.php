<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

    public function items()
    {
        return $this->hasManyThrough(product::class,order_item::class);
    }
}
