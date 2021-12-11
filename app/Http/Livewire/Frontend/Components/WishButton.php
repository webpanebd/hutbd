<?php

namespace App\Http\Livewire\Frontend\Components;

use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishButton extends Component
{

    public $product;
    public function render()
    {
        return view('livewire.frontend.components.wish-button');
    }

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToWishlist()
    {
        if (Auth::check()) {
            WishList::create([
                "user_id" => Auth::user()->id,
                "product_id" => $this->product->id,
            ]);
            $this->emit("wishAdded");
        } else {
            $this->emit("notLoggedIn");
        }
    }
}
