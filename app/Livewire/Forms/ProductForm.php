<?php

namespace App\Livewire\Forms;

use App\Models\product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    public ?product $product;

    public $name = '';
    public $itemCode = '';
    public $brand = '';
    public $price;
    public $quantity;
    public $url = '';
    public $status = '';
    public $description = '';


    public $brands = [];   // for select option


    public function store()
    {
        $this->validate();

        Product::create($this->only([
            'name',
            'brand_id', // Note: Use the foreign key name
            'item_code',
            'price',
            'quantity',
            'url',
            'status',
            'description',
        ]));
    }

    public function updata()
    {
        $this->validate();

        $this->customer->update($this->only([
            'name',
            'brand_id', // Note: Use the foreign key name
            'item_code',
            'price',
            'quantity',
            'url',
            'status',
            'description',
        ]));

    }

    public function setProduct(product $product)
    {

        $this->name = $product->name;
        $this->brand = $product->brand;
        $this->itemCode = $product->itemCode;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->url = $product->url;
        $this->status = $product->status;
        $this->description = $product->description;

        $this->product = $product;

    }
}
