<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;
use App\Models\Advertisement;
use Livewire\WithFileUploads;

class EditAd extends Component
{
    use WithFileUploads;

    public  $bold_text, $light_text, $image, $location = 1, $link;
    public $ad;


    protected $rules = [
        "bold_text" => "nullable|max:100",
        "light_text" => "nullable|max:100",
        "link" => "nullable|url",
        "image" => "nullable|image|max:20480",
        "location" => "required"
    ];



    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }

    public function render()
    {

        return view('livewire.admin.components.edit-ad')->extends("admin.master")->section("content");
    }

    public function mount($id)
    {
        $this->ad = Advertisement::findOrFail($id);

        $this->bold_text = $this->ad->bold_text;
        $this->light_text = $this->ad->light_text;
        $this->location = $this->ad->location;
        $this->link = $this->ad->link;
    }



    public function update()
    {
        $this->validate($this->rules);
        $this->ad->bold_text = $this->bold_text;
        $this->ad->light_text = $this->light_text;
        $this->ad->location = $this->location;
        $this->ad->link = $this->link;
        if ($this->image) {
            $this->ad->image = upload($this->image, "advertisements", "public");
        }
        $this->ad->save();
        return redirect("/manage-ads");
    }
}
