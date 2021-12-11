<?php

namespace App\Http\Livewire\Frontend\Components;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;

class FeaturedProducts extends Component
{
    public function render()
    {

        $categories = Category::whereNotIn('name', ['Uncategorized'])->inRandomOrder()->limit(4)->get();
        return view('livewire.frontend.components.featured-products', compact('categories'));
    }

    public function gotoSingle($id)
    {
        return redirect("/product/" . Product::find($id)->slug);
    }
}
