<?php

namespace App\Http\Livewire\Admin\Subcategories;

use App\Models\Category;
use Livewire\Component;
use App\Models\SubCategory;
use Illuminate\Support\Str;
class Index extends Component
{
    public $category_name,$category_description,$category_id;
    public $categories=[],$edit=false,$category,$cats=[],$cat_id;


    protected $rules=[
        "category_name"=>"required|max:100|unique:sub_categories,name",
        "category_description"=>"required",
        "cat_id"=>"required"
    ];

    public function updated($field){
        $this->validateOnly($field,$this->rules);
    }
    public function render()
    {
        return view('livewire.admin.subcategories.index')->extends("admin.master")->section('content');
    }

    public function mount(){
        $this->cats=Category::all();
        $this->categories=SubCategory::all();
    }
    public function create(){
        $this->validate($this->rules);
        $this->categories[]=SubCategory::create([
            "category_id"=>$this->cat_id,
            "name"=>$this->category_name,
            "slug"=>Str::slug($this->category_name),
            "description"=>$this->category_description
        ]);
        $this->reset(["category_name","category_description","cat_id"]);

    }

    public function edit($id){
        $this->category=SubCategory::find($id);
        $this->cat_id=$this->category->category_id;
        $this->category_name=$this->category->name;
        $this->category_description=$this->category->description;
        $this->edit=true;
    }

    public function update(){
        $this->validate($this->rules);
        $this->category->category_id=$this->cat_id;
        $this->category->name=$this->category_name;
        $this->category->description=$this->category_description;
        $this->category->save();
        $this->edit=false;
        $this->reset(["category_name","category_description"]);
        $this->categories=SubCategory::all();
    }
    public function delete($id){
        /*=========== products should need to be transferred to uncategorized subcategory =====*/
        SubCategory::find($id)->delete();
        $this->categories=SubCategory::all();
    }
}

