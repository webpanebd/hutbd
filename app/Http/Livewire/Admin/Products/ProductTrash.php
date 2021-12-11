<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTrash extends Component
{
    use WithPagination;
    public $paginationTheme = "bootstrap";
    public function render()
    {
        return view('livewire.admin.products.product-trash', ["products" => Product::onlyTrashed()->paginate(10)])->extends("admin.master")->section("content");
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->restore();
    }
    public function delete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->forceDelete();
    }
}
