<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class ChangeRole extends Component
{

    public $change_role,$roles=[],$user;
    protected $rules=[
        "change_role"=>"required",
    ];
    public function updated($field){
        $this->validateOnly($field,$this->rules);
    }

    public function updatedChangeRole($value){
        $this->user->removeRole($this->user->roleName());
        $this->user->assignRole($this->change_role);
    }
    public function render()
    {
        return view('livewire.admin.users.change-role');
    }

    public function mount($user){
        $this->user=$user;
        $this->roles=Role::all();


    }
}
