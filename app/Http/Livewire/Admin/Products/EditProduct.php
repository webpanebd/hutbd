<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EditProduct extends Component
{
    use WithFileUploads;
    public $name;
    public $categories, $category_id;
    public $subcategories = [], $subcategory_id;
    public $brands = [], $brand_id;
    public $unit_price, $tax, $discount, $shipping_cost;
    public $hasReview = 1, $isActive = 1;
    public $image;
    public $product;



    protected $rules = [
        "name" => "required|max:400",
        "category_id" => "required",
        "subcategory_id" => "required",
        "brand_id" => "required",
        "unit_price" => "required",
        "image" => "nullable|max:10240|mimes:jpeg,jpg,png,gif"

    ];

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }


    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->name = $this->product->name;
        $this->category_id = $this->product->category_id;
        $this->subcategory_id = $this->product->subcategory_id;
        $this->brand_id = $this->product->brand_id;
        $this->unit_price = $this->product->unit_price;
        $this->tax = $this->product->tax;
        $this->discount = $this->product->discount;
        $this->shipping_cost = $this->product->shipping_cost;
        $this->hasReview = $this->product->hasReview;
        $this->isActive = $this->product->isActive;
        $this->seller_id = $this->product->seller_id;
        $this->featured_image = $this->product->featured_image;


        $this->categories = Category::all();
        $this->brands = Brand::all();
    }
    public function updatedCategoryId($value)
    {
        if ($value != "") {
            $this->subcategories = Category::find($value)->subcategories;
        }
    }

    public function update()
    {
        $this->validate($this->rules);
        $this->product->name = $this->name;
        $this->product->category_id = $this->category_id;
        $this->product->subcategory_id = $this->subcategory_id;
        $this->product->brand_id = $this->brand_id;
        $this->product->seller_id = $this->seller_id;
        $this->product->unit_price = $this->unit_price;
        $this->product->tax = $this->tax;
        $this->product->discount = $this->discount;
        $this->product->hasReview = $this->hasReview;
        $this->product->isActive = $this->isActive;
        if ($this->image) {
            $this->product->featured_image = upload($this->image, "products", "public", $this->product->featured_image);
        }


        $this->product->save();
        return redirect("/products");
    }

    public function render()
    {
        return view('livewire.admin.products.edit-product')->extends("admin.master")->section("content");
    }
}
