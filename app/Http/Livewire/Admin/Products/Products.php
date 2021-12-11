<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Products extends Component
{
    use WithPagination;
    public $paginationTheme = "bootstrap";
    public $trashed_items = 0;
    public $search_by = "name", $search_term;
    public function render()
    {

        $this->trashed_items = Product::onlyTrashed()->count();
        if ($this->search_by == "category") {
            $search_term = $this->search_term;
            $products = Product::whereHas("category", function ($query) use ($search_term) {
                $query->where("name", "like", "%{$search_term}%");
            })->paginate(10);
            return view('livewire.admin.products.products', compact('products'))->extends("admin.master")->section('content');
        }

        if ($this->search_by == "subcategory") {
            $search_term = $this->search_term;
            $products = Product::whereHas("subcategory", function ($query) use ($search_term) {
                $query->where("name", "like", "%{$search_term}%");
            })->paginate(10);
            return view('livewire.admin.products.products', compact('products'))->extends("admin.master")->section('content');
        }
        if ($this->search_by == "brand") {
            $search_term = $this->search_term;
            $products = Product::whereHas("brand", function ($query) use ($search_term) {
                $query->where("name", "like", "%{$search_term}%");
            })->paginate(10);
            return view('livewire.admin.products.products', compact('products'))->extends("admin.master")->section('content');
        }
        return view('livewire.admin.products.products', ['products' => Product::where($this->search_by, "like", "%" . $this->search_term . "%")->paginate(10)])->extends("admin.master")->section('content');
    }

    public function delete($id)
    {
        Product::destroy($id);
    }

    public function addProperties($id)
    {

        return redirect("/product/add-properties/" . $id);
    }

    public function edit($id)
    {
        return redirect("/product/edit/" . $id);
    }

    public function show($id)
    {
        return redirect("/product/show/" . $id);
    }
}
