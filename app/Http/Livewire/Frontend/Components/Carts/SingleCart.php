<?php

namespace App\Http\Livewire\Frontend\Components\Carts;

use Livewire\Component;
use App\Models\Cart;

class SingleCart extends Component
{

    public $cart, $count;
    public function render()
    {
        return view('livewire.frontend.components.carts.single-cart');
    }

    public function mount($cart)
    {
        $this->cart = $cart;
        $this->count = $cart->quantity;
    }

    public function productIncrement()
    {
        if ($this->cart->product->available > $this->count) {
            $this->count++;
            $this->cart->quantity = $this->count;
            $this->cart->save();
            $this->emit("quantityChanged");
        }
    }
    public function productDecrement()
    {
        if ($this->count > 1) {
            $this->count--;
            $this->cart->quantity = $this->count;
            $this->cart->save();
            $this->emit("quantityChanged");
        }
    }

    public function removeCart()
    {

        $cart = Cart::where("user_id", auth()->user()->id)->where("product_id", $this->cart->product->id)->firstOrFail();
        if ($cart) {
            Cart::destroy($cart->id);
            $this->emit("cartRemoved");
        }
    }
}
