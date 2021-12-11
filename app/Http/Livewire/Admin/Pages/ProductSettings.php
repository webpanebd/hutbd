<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\ProductSettings as ModelsProductSettings;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductSettings extends Component
{
    use WithFileUploads;
    public $image;
    public $product_settings;
    protected $rules = [
        "product_settings.page_banner" => "nullable",
        "product_settings.currency" => "required",
        "product_settings.default_shipping_cost" => "nullable",
        "image" => "nullable|image|max:2048"
    ];
    public function render()
    {

        return view('livewire.admin.pages.product-settings')->extends("admin.master")->section("content");
    }


    public function mount()
    {
        $this->product_settings = ModelsProductSettings::firstOrFail();
    }
    public function update()
    {
        $this->validate($this->rules);
        if ($this->image) {
            $this->product_settings->page_banner = upload($this->image, "product_settings", "public", $this->product_settings->page_banner);
        }
        $this->product_settings->save();
    }
}
