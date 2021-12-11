<?php

namespace App\Http\Livewire\Frontend\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\WishList;

class Header extends Component
{

    protected $listeners = ["cartAdded", "cartRemoved", "quantityChanged", "wishAdded", "wishRemoved"];

    public $carts, $wishes;

    public function cartAdded()
    {
        $this->carts = Cart::where("user_id", Auth::user()->id)->get();
    }

    public function cartRemoved()
    {
        $this->carts = Cart::where("user_id", Auth::user()->id)->get();
    }

    public function quantityChanged()
    {
        $this->carts = Cart::where("user_id", Auth::user()->id)->get();
    }


    public function wishAdded()
    {
        $this->wishes = WishList::where("user_id", Auth::user()->id)->get();
    }

    public function wishRemoved()
    {
        $this->wishes = WishList::where("user_id", Auth::user()->id)->get();
    }

    public function render()
    {
        if (Auth::check()) {
            $this->carts = Cart::where("user_id", Auth::user()->id)->get();
            $this->wishes = WishList::where("user_id", Auth::user()->id)->get();
        }
        return view('livewire.frontend.partials.header');
    }
}
