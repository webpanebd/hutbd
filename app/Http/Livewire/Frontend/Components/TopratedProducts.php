<?php

namespace App\Http\Livewire\Frontend\Components;

use App\Models\Product;
use Livewire\Component;

class TopratedProducts extends Component
{
    public function render()
    {
        $toprated_products = Product::orderBy('ratings', 'desc')->limit(9)->get();
        return view('livewire.frontend.components.toprated-products', compact('toprated_products'));
    }
}
