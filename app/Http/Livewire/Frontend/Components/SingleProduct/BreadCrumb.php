<?php

namespace App\Http\Livewire\Frontend\Components\SingleProduct;

use Livewire\Component;

class BreadCrumb extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.frontend.components.single-product.bread-crumb');
    }

    public function mount($product)
    {
        $this->product = $product;
    }
}
