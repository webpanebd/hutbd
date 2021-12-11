<?php

namespace App\Http\Livewire\Frontend\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Coupon;

class CartList extends Component
{

    public $msg = "";
    public $coupon;
    public $code;
    public $carts;
    protected $listeners = ["cartRemoved", "quantityChanged"];
    public function cartRemoved()
    {
        $this->carts = Cart::where('user_id', Auth::user()->id)->get();
    }
    public function quantityChanged()
    {
        $this->carts = Cart::where('user_id', Auth::user()->id)->get();
    }

    public function render()
    {
        if (Auth::check()) {
            $this->carts = Cart::where('user_id', Auth::user()->id)->get();
        } else {
            $this->emit("notLoggedIn");
        }
        return view('livewire.frontend.pages.cart-list');
    }

    public function applyCoupon()
    {
        $this->validate([
            "code" => "required|exists:coupons,code"
        ]);

        $coupon = Coupon::whereDate("starts_at", "<=", today())->where('code', $this->code)->first();
        if ($coupon) {
            if ($coupon->usedBy(Auth::user()->id)) {
                $this->msg = "This coupon has been already used by you";
            } else {
                DB::table("coupon_user")->insert([
                    "user_id" => Auth::user()->id,
                    "coupon_id" => $coupon->id
                ]);
                $this->coupon = $coupon;
                $this->msg = "Coupon applied";
            }
        }
    }
}
