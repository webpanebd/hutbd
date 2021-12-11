<?php

namespace App\Http\Livewire\Frontend\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;

class Head extends Component
{

    public function render()
    {


        return view('livewire.frontend.partials.head');
    }
}
