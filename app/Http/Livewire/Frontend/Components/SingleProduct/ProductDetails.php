<?php

namespace App\Http\Livewire\Frontend\Components\SingleProduct;

use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetails extends Component
{

    public $product;
    public $count = 1;
    protected $listeners = ["newCommentAdded", "commentDeleted"];
    public $total_comments;

    public function newCommentAdded()
    {
        $this->total_comments++;
    }


    public function commentDeleted($id)
    {
        Comment::destroy($id);
        $this->total_comments--;
    }
    public function render()
    {
        return view('livewire.frontend.components.single-product.product-details');
    }

    public function mount($product)
    {
        $this->product = $product;
        $this->total_comments = count($this->product->comments);
        if (Auth::check()) {
            $cart = Cart::where("user_id", auth()->user()->id)->where("product_id", $this->product->id)->first();
            if ($cart) {
                $this->count = $cart->quantity;
            }
        }
    }

    public function productIncrement()
    {
        if ($this->product->available > $this->count) {
            $this->count++;
        }
    }
    public function productDecrement()
    {
        if ($this->count > 1) {
            $this->count--;
        }
    }

    public function addToCart()
    {
        Cart::create([
            "user_id" => Auth::user()->id,
            "product_id" => $this->product->id,
            "quantity" => $this->count,

        ]);

        $this->emit("cartAdded");
    }

    public function removeCart()
    {

        $cart = Cart::where("user_id", auth()->user()->id)->where("product_id", $this->product->id)->firstOrFail();
        if ($cart) {
            Cart::destroy($cart->id);
            $this->emit("cartRemoved");
        }
    }
}
