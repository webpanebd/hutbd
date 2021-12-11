<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Advertisement;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageAds extends Component
{
    use WithFileUploads;

    public  $bold_text, $light_text, $image, $location = 1, $link;
    public $ads;

    protected $listeners = ["adDeleted"];
    protected $rules = [
        "bold_text" => "nullable|max:100",
        "light_text" => "nullable|max:100",
        "link" => "nullable|url",
        "image" => "nullable|image|max:20480",
        "location" => "required"
    ];



    public function adDeleted()
    {
        $this->ads = Advertisement::all();
    }
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }

    public function render()
    {
        $this->ads = Advertisement::all();
        return view('livewire.admin.pages.manage-ads')->extends("admin.master")->section("content");
    }



    public function create()
    {
        $this->validate($this->rules);
        $ad = new Advertisement();
        $ad->bold_text = $this->bold_text;
        $ad->light_text = $this->light_text;
        $ad->location = $this->location;
        $ad->link = $this->link;
        if ($this->image) {
            $ad->image = upload($this->image, "advertisements", "public");
        }
        $ad->save();
        $this->reset(["bold_text", "location", "image", "link", "light_text"]);
    }
}
