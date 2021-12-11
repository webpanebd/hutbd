<?php

namespace App\Http\Livewire\Frontend\Components\Shop;

use App\Models\Product;
use Livewire\Component;

class DiscountedProduct extends Component
{
    public function render()
    {
        $discounted_products = Product::where('discount', "!=", 0)->limit(20)->get();
        return view('livewire.frontend.components.shop.discounted-product', compact('discounted_products'));
    }
    public function gotoSingle($id)
    {
        return redirect("/product/" . Product::find($id)->slug);
    }
}
