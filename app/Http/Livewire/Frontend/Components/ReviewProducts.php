<?php

namespace App\Http\Livewire\Frontend\Components;

use Livewire\Component;
use App\Models\Product;

class ReviewProducts extends Component
{
    public function render()
    {
        $review_products = Product::orderBy('ratings', 'asc')->limit(9)->get();
        return view('livewire.frontend.components.review-products', compact('review_products'));
    }
}
