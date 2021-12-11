<?php

namespace App\Http\Livewire\Frontend\Components\Wishes;

use App\Models\WishList;
use Livewire\Component;

class SingleWish extends Component
{

    public $wish;
    public function render()
    {
        return view('livewire.frontend.components.wishes.single-wish');
    }
    public function mount($wish)
    {
        $this->wish = $wish;
    }

    public function removeWish()
    {
        $wish = WishList::where("user_id", auth()->user()->id)->where("product_id", $this->wish->product->id)->firstOrFail();
        if ($wish) {
            WishList::destroy($wish->id);
            $this->emit("wishRemoved");
        }
    }
}
