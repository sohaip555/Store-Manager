<?php

namespace App\Livewire\product;

use App\Livewire\Forms\ProductForm;
use App\Models\product;
use Livewire\Component;

class EditProduct extends Component
{

    public ProductForm $form;

    public function mount(product $product)
    {
//        dd($product->item_code);
        $this->form->brands =  \App\Models\brand::all();
        $this->form->setProduct($product);
    }

    public function save()
    {
        $this->form->updata();

        $this->redirect('/product/show');
    }

    public function render()
    {
        return view('livewire.product.edit-product');
    }
}
