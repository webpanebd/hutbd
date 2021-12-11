<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\User;
use Livewire\Component;

class AddNewUser extends Component
{
    public $role,$name,$email,$password,$password_confirmation;
    protected $rules=[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
    ];
    public function updated($field){
        $this->validateOnly($field,$this->rules);
    }
    public function render()
    {
        return view('livewire.admin.modals.add-new-user');
    }

    public function mount($role){
        $this->role=$role;
    }

    public function create(){
        $this->validate($this->rules);
        User::create([
            "name"=>$this->name,
            "email"=>$this->email,
            "password"=>bcrypt($this->password),
            "avatar"=>createDefaultAvatar($this->name)
        ])->assignRole($this->role);
       return  redirect("/users/".$this->role);
    }
}
