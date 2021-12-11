<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Attribute;
use App\Models\Property;
use Livewire\Component;


class Attributes extends Component
{

    public $attributes = [];
    public $attribute = "";
    public $value = "";
    public $properties = [];
    public $property;
    public $search_attribute;
    protected $rules = [
        "attribute" => "required",
        "value" => "required|unique:properties,value|max:100"
    ];
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }
    public function render()
    {

        return view('livewire.admin.products.attributes')->extends("admin.master")->section("content");
    }

    public function mount()
    {
        $this->attributes = Attribute::where("type", "select")->get();
    }

    public function add()
    {
        $this->validate($this->rules);
        $property = Property::create([
            "key" => $this->attribute,
            "value" => strtolower($this->value)
        ]);

        $this->reset(["value"]);
        $this->properties = Property::where("key", $this->search_attribute)->get();
    }

    public function updatedSearchAttribute($value)
    {
        $this->properties = Property::where("key", $value)->get();
    }

    public function delete($id)
    {
        Property::destroy($id);
        $this->properties = Property::where("key", $this->search_attribute)->get();
    }
}
