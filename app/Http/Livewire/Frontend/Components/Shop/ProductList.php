<?php

namespace App\Http\Livewire\Frontend\Components\Shop;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;


class ProductList extends Component
{



    protected $listeners = ["priceRangerChanged", "colorChanged"];
    public $products, $total_products;
    public $limit = 12;

    public function priceRangerChanged($min, $max)
    {
        $this->products = Product::whereBetween('unit_price', [$min, $max])->limit($this->limit)->get();
    }

    public function colorChanged($color)
    {

        $this->products = Product::whereHas('attributeProducts', function (Builder $query) use ($color) {
            $query->where("value", "=", $color);
        })->limit($this->limit)->get();
    }

    public function render()
    {

        $products = $this->products;
        return view('livewire.frontend.components.shop.product-list', compact('products'));
    }

    public function mount()
    {
        $this->total_products = Product::all()->count();
        $this->products = Product::limit($this->limit)->get();
    }

    public function more()
    {
        $this->limit += 12;

        $this->products = Product::limit($this->limit)->get();
    }

    public function less()
    {

        $this->limit -= 12;
        $this->products = Product::limit($this->limit)->get();
    }

    public function gotoSingle($id)
    {

        return redirect("/product/" . Product::find($id)->slug);
    }
}
