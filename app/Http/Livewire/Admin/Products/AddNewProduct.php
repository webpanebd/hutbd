<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Attribute;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddNewProduct extends Component
{

    use WithFileUploads;
    public $name;
    public $categories, $category_id;
    public $subcategories = [], $subcategory_id;
    public $brands = [], $brand_id;
    public $unit_price, $tax = 0, $discount = 0, $shipping_cost = 0;
    public $hasReview = 1, $isActive = 1;
    public $image;



    protected $rules = [
        "name" => "required|max:400",
        "category_id" => "required",
        "subcategory_id" => "required",
        "brand_id" => "required",
        "unit_price" => "required",
        "image" => "required|max:10240|mimes:jpeg,jpg,png,gif"

    ];

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }
    public function render()
    {
        return view('livewire.admin.products.add-new-product')->extends("admin.master")->section("content");
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }
    public function updatedCategoryId($value)
    {
        if ($value != "") {
            $this->subcategories = Category::find($value)->subcategories;
        }
    }

    public function create()
    {
        $this->validate($this->rules);
        $product = Product::create([
            "name" => $this->name,
            "slug" => uniqid() . "-" . Str::slug($this->name),
            "category_id" => $this->category_id,
            "subcategory_id" => $this->category_id,
            "brand_id" => $this->brand_id,
            "unit_price" => $this->unit_price,
            "tax" => $this->tax,
            "discount" => $this->discount,
            "isActive" => $this->isActive,
            "hasReview" => $this->hasReview,
            "shipping_cost" => $this->shipping_cost,
            "featured_image" => upload($this->image, "products", "public", null),
            "seller_id" => Auth::user()->id
        ]);

        return redirect("/product/add-properties/" . $product->id);
    }
}
