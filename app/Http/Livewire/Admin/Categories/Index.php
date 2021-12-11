<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Index extends Component
{

    use WithFileUploads;
    public $category_name, $category_image, $image;
    public  $edit = false, $category;


    protected $rules = [
        "category_name" => "required|max:100",
        "image" => "nullable|image|max:20480"
    ];

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.categories.index', compact("categories"))->extends("admin.master")->section('content');
    }


    public function create()
    {
        $this->validate($this->rules);
        $category = new Category();
        $category->name = $this->category_name;
        if ($this->image) {
            $category->image = upload($this->image, "categories", "public");
        }

        $category->slug = Str::slug($this->category_name);
        $category->save();
        $this->reset(["category_name", "image"]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        $this->category_name = $this->category->name;
        $this->edit = true;
    }

    public function update()
    {
        $this->validate($this->rules);
        $this->category->name = $this->category_name;
        if ($this->image) {
            $this->category->image = upload($this->image, "categories", "public", $this->category->image);
        }
        $this->category->save();
        $this->edit = false;
        $this->reset(["category_name", "image"]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $uncategory = Category::where('slug', 'uncategorized')->first();
        foreach ($category->subcategories as $subcat) {
            $uncategory->subcategories()->save($subcat);
        }
        $category->delete();
    }
}
