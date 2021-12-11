<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Attribute;
use App\Models\AttributeProduct;
use App\Models\Property;
use App\Models\Product;

class AddProperties extends Component
{

    public $attributes = [], $attribute_id;
    public $properties = [], $value;
    public $key = "", $type = "text";
    public $product, $product_id;

    public function render()
    {
        return view('livewire.admin.products.add-properties')->extends("admin.master")->section("content");
    }


    public function updatedAttributeId($value)
    {
        if (!empty($value)) {
            $this->key = Attribute::find($value)->name;
            $this->type = Attribute::find($value)->type;
            $this->properties = Property::where("key", $this->key)->get();
            $this->reset(["value"]);
        }
    }
    public function mount($id)
    {
        $this->product_id = $id;
        $this->product = Product::find($id);
        $this->attributes = Attribute::all();
    }


    public function addAttribute()
    {
        $this->validate([
            "key" => "required",
            "value" => "required"
        ]);
        AttributeProduct::create(["product_id" => $this->product->id, "key" => $this->key, "value" => $this->value]);
        $this->product = Product::find($this->product_id);
        $this->reset(["value"]);
    }

    public function remove($id)
    {
        AttributeProduct::destroy($id);
        $this->product = Product::find($this->product_id);
    }
}
