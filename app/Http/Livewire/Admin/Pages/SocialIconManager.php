<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\SocialIcon;
use Livewire\Component;
use Illuminate\Support\Str;

class SocialIconManager extends Component
{

    public $icons = [], $icon, $link;
    protected $rules = [
        "icon" => "required|max:64",
        "link" => "required|url"
    ];

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }
    public function render()
    {
        return view('livewire.admin.pages.social-icon-manager')->extends("admin.master")->section('content');
    }

    public function mount()
    {
        $this->icons = SocialIcon::all();
    }

    public function create()
    {
        $this->validate($this->rules);
        $social_icon = SocialIcon::create([
            "icon" => Str::lower($this->icon),
            "link" => $this->link
        ]);

        $this->icons[] = $social_icon;
        $this->reset(["icon", "link"]);
    }

    public function delete($id)
    {
        SocialIcon::destroy($id);
        $this->icons = SocialIcon::all();
    }
}
