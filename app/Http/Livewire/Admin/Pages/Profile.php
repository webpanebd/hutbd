<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.admin.pages.profile')->extends("admin.master")->section('content');
    }
}
