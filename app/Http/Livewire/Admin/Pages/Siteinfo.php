<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\SiteInfo as ModelSiteInfo;
use Illuminate\Database\Events\ModelsPruned;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Siteinfo extends Component
{
    use WithFileUploads;
    public $siteinfo,$roles=[],$logo,$favicon;

    protected $rules=[
        "siteinfo.name"=>"required|max:60",
        "siteinfo.title"=>"nullable|max:200",
        "siteinfo.description"=>"nullable|max:2000",
        "siteinfo.keywords"=>"nullable",
        "siteinfo.logo"=>"nullable",
        "siteinfo.favicon"=>"nullable",
        "siteinfo.email"=>"nullable|email",
        "siteinfo.phone"=>"nullable|max:20",
        "siteinfo.address"=>"nullable|max:2000",
        "siteinfo.default_role"=>"required",
        "siteinfo.can_register"=>"required|boolean",
        "logo"=>"nullable|mimes:png,jpg,jpeg,gif|max:20480",
        "favicon"=>"nullable|mimes:png,jpg,jpeg,gif|max:20480",

    ];

    public function updated($field){
        $this->validateOnly($field,$this->rules);
    }
    public function render()
    {
        return view('livewire.admin.pages.siteinfo')->extends("admin.master")->section("content");
    }

    public function mount(){
        $this->siteinfo=ModelSiteInfo::all()->first();
        $this->roles=Role::all();
    }

    public function update(){
        $this->validate($this->rules);
        if($this->logo){
            $this->siteinfo->logo=upload($this->logo,"logos","public");
        }
        if($this->favicon){
             $this->siteinfo->favicon=upload($this->favicon,"favicons","public");
        }
        $this->siteinfo->save();
    }


}
