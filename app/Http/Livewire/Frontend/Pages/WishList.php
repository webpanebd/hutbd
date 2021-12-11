<?php

namespace App\Http\Livewire\Frontend\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList as ModelWishList;

class WishList extends Component
{


    public $wishes;
    protected $listeners = ["wishRemoved"];

    public function wishRemoved()
    {
        $this->wishes = ModelWishList::where('user_id', Auth::user()->id)->get();
    }
    public function render()
    {
        if (Auth::check()) {
            $this->wishes = ModelWishList::where('user_id', Auth::user()->id)->get();
        } else {
            $this->emit("notLoggedIn");
        }
        return view('livewire.frontend.pages.wish-list');
    }
}
