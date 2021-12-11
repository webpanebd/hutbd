<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\User;
class Show extends Component
{
    public $user;
    public function render()
    {
        return view('livewire.admin.profile.show')->extends("admin.master")->section('content');
    }

    public function mount($id){
        $this->user=User::find($id);
    }
}
