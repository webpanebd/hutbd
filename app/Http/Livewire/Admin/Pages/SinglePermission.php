<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;

class SinglePermission extends Component
{
    public $permission,$status,$role,$checked;
    public function updatedStatus($value){
        if($value){
              $this->role->givePermissionTo($this->permission->name);
            }else{
                $this->role->revokePermissionTo($this->permission->name);
            }
        
    }
    public function render()
    {
        return view('livewire.admin.pages.single-permission');
    }

    public function mount($permission,$role){
        $this->permission=$permission;
        $this->role=$role;
        if($this->role->hasPermissionTo($permission->name)){
            $this->status=$permission->name;
        }else{
            $this->status="";
        }
    }
}
