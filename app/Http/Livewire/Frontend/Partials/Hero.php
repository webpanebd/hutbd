<?php

namespace App\Http\Livewire\Frontend\Partials;

use App\Models\Category;
use Livewire\Component;

class Hero extends Component
{

    public function render()
    {
        $categories = Category::all();
        return view('livewire.frontend.partials.hero', compact('categories'));
    }
}
