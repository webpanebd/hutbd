<?php

namespace App\Http\Livewire\Admin\Components;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SingleAd extends Component
{
    public $ad;
    public function render()
    {

        return view('livewire.admin.components.single-ad');
    }

    public function mount($ad)
    {
        $this->ad = $ad;
    }

    public function delete()
    {
        $this->ad->deleteWithFile();
        $this->emit("adDeleted");
    }

    public function edit()
    {
        return redirect("/ad/edit/" . $this->ad->id);
    }
}
