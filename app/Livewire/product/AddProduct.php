<?php

namespace App\Livewire\product;

use App\Livewire\Forms\ProductForm;
use Livewire\Component;

class AddProduct extends Component
{

    public ProductForm $form;

    public function mount()
    {
        $this->form->brands =  \App\Models\brand::all();
    }

    public function save()
    {
        $this->form->store();

        $this->redirect('/product/show');
    }

    public function render()
    {
        return view('livewire.product.add-product');
    }
}
