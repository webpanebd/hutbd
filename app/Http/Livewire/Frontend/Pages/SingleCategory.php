<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use PDO;

class SingleCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $category;

    public function render()
    {
        $products = Product::where("category_id", $this->category->id)->paginate(6);
        return view('livewire.frontend.pages.single-category', compact('products'));
    }

    public function mount($slug)
    {
        $this->category = Category::where("slug", $slug)->first();
        if (!$this->category) {
            abort(404);
        }
    }
}
