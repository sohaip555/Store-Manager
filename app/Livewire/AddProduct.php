<?php

namespace App\Livewire;

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

        $this->redirect('/');
    }

    public function render()
    {
//        dd($this->form);
        return view('livewire.add-product');
    }
}
