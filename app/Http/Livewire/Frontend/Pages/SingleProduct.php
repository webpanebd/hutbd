<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.frontend.pages.single-product');
    }

    public function mount($slug)
    {
        $this->product = Product::where("slug", $slug)->firstOrFail();
    }
}
