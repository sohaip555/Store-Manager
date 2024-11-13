<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;


    public function order()
    {
        return $this->belongsTo(order::class);
    }

//    public function product()
//    {
//        return $this->belongsTo(product::class);
//    }
}
