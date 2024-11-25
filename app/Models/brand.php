<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    /** @use HasFactory<\Database\Factories\brandFactory> */
    use HasFactory;


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
