<?php

namespace App\Http\Livewire\Frontend\Components;

use App\Models\Product;
use Livewire\Component;

class LatestProducts extends Component
{
    public function render()
    {
        $latest_products = Product::latest()->limit(9)->get();

        return view('livewire.frontend.components.latest-products', compact("latest_products"));
    }
}
