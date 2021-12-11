<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $roles=[],$permissions=[];
    public function render()
    {
        return view('livewire.admin.pages.roles')->extends("admin.master")->section("content");
    }

    public function mount(){
        $this->roles=Role::all();
        $this->permissions=Permission::all();
    }
}
