<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.admin.products.single-product')->extends("admin.master")->section("content");
    }

    public function mount($id)
    {
        $this->product = Product::find($id);
    }
}
