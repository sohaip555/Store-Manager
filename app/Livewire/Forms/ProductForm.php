<?php

namespace App\Livewire\Forms;

use App\Models\brand;
use App\Models\product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    public ?product $product;

    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $item_code = '';
    #[Validate('required')]
    public $brand_id = '';
    #[Validate('required')]
    public $price;
    #[Validate('required')]
    public $quantity;

    public $url = '';
    public $status = '';
    public $description = '';


    public $brands = [];   // for select option

    public function setProduct(product $product)
    {

        $this->name = $product->name;
        $this->brand_id = $product->brand_id;
        $this->item_code = $product->item_code;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->url = $product->url;
        $this->status = $product->status;
        $this->description = $product->description;

        $this->product = $product;

    }


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

        $this->product->update($this->only([
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


}
