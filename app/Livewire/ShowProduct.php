<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\product;
use Livewire\Component;


class ShowProduct extends Component
{
    public ProductForm $form;
    public $products;


    public function save()
    {
        $this->form->updata();

        $this->redirect('/product/show');
    }

    public function delete(product $product)
    {
        $product->delete();
//        product::destroy($product);
    }


    public function render()
    {
        $this->products =  Product::all();
        return view('livewire.show-product');
    }
}
