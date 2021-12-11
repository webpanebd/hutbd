<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BrandComponent extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search_term,$search_by="name",$edit=false,$name,$description,$brand;
    protected $rules=[
        "name"=>"required|max:100|unique:brands,name",
        "description"=>"nullable|max:5000"
    ];

    public function updated($field){
        $this->validateOnly($field,$this->rules);
    }
    public function render()
    {
        $search_term= '%'.$this->search_term.'%';
        $search_by=$this->search_by;
        return view('livewire.admin.brand-component',["brands"=>Brand::where($search_by,"like",$search_term)->paginate(10)])->extends("admin.master")->section('content');
    }

    public function mount(){
        
    }

    public function create(){
        $this->validate($this->rules);
        Brand::create([
            "user_id"=>Auth::user()->id,
            "slug"=>Str::slug($this->name),
            "name"=>$this->name,
            "description"=>$this->description
        ]);
        $this->reset(["name","description"]);
    }

    public function edit($id){
        $this->brand=Brand::find($id);
        $this->name=$this->brand->name;
        $this->description=$this->brand->description;
        $this->edit=true;
    }

    public function update(){
        $this->validate([
            "name"=>"required|max:100|unique:brands,name,".$this->brand->id,
            "description"=>"nullable|max:5000"
        ]);
        $this->brand->name=$this->name;
        $this->brand->description=$this->description;
        $this->brand->slug=Str::slug($this->name);
        $this->edit=false;
        $this->reset(["name","description"]);
        
    }

    public function delete($id){
        Brand::destroy($id);
        
    }

}
