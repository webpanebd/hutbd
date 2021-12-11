<?php

namespace App\Http\Livewire\Frontend\Components;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        $categories = Category::whereNotIn("name", ["Uncategorized"])->inRandomOrder()->get();
        return view('livewire.frontend.components.categories', compact('categories'));
    }
}
