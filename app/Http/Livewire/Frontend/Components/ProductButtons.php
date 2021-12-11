<?php

namespace App\Http\Livewire\Frontend\Components;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductButtons extends Component
{

    public $product;
    public function render()
    {
        return view('livewire.frontend.components.product-buttons');
    }

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        if (Auth::check()) {
            Cart::create([
                "user_id" => Auth::user()->id,
                "product_id" => $this->product->id,
                "quantity" => 1,

            ]);
            $this->emit("cartAdded");
        } else {
            $this->emit("notLoggedIn");
        }
    }
}
