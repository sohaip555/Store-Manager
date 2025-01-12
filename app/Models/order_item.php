<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    /** @use HasFactory<\Database\Factories\order_itemFactory> */
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'price'];
    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function order()
    {
        return $this->belongsTo(order::class);
    }

//    public function product()
//    {
//        return $this->belongsTo(product::class);
//    }
}
