<?php

namespace App\Http\Livewire\Frontend\Components\Shop;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class Departments extends Component
{
    public $min, $max;

    public function render()
    {
        $brands = Brand::orderBy("name", "asc")->limit(10)->get();
        return view('livewire.frontend.components.shop.departments', compact('brands'));
    }
    public function mount()
    {
        $this->max = Product::max('unit_price');
        $this->min = Product::min("unit_price");
    }
}
