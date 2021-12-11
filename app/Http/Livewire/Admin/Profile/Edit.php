<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $user,$image;
    protected $rules=[
        "user.name"=>"required|max:20",
        "user.avatar"=>"nullable",
        "user.email"=>"required|email",
        "user.phone"=>"nullable|max:15",
        "user.address"=>"required|max:1000",
        "image"=>"nullable|image|max:20480"

    ];

    public function updated($field){
        $this->validateOnly($field,$this->rules);
    }

    public function render()
    {
        return view('livewire.admin.profile.edit');
    }

    public function mount(){
        $this->user=User::find(Auth::user()->id);
    }

    public function update(){
        $this->validate($this->rules);
        if($this->image){
            $this->user->avatar=updateFile($this->image,"avatars","public",$this->user->avatar);
        }
        $this->user->save();
    }
}
