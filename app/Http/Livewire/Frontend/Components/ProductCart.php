<?php

namespace App\Http\Livewire\Frontend\Components;

use Livewire\Component;

class ProductCart extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.frontend.components.product-cart');
    }

    public function mount($product)
    {
        $this->product = $product;
    }
}
