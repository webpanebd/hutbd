<?php

namespace App\Http\Livewire\Frontend\Components\Shop;

use App\Models\Property;
use Livewire\Component;

class ColorFilter extends Component
{
    public $color;
    public function render()
    {
        $colors = Property::where('key', 'color')->get();
        return view('livewire.frontend.components.shop.color-filter', compact('colors'));
    }
    public function updatedColor($value)
    {
        $this->emit("colorChanged", $value);
    }
}
