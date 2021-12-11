<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Coupon;
use Livewire\WithPagination;

class Coupons extends Component
{
    use WithPagination;
    public $coupon = null;
    public $edit = false;
    public $paginationTheme = "bootstrap";


    protected $rules = [
        "coupon.code" => "required|unique:coupons,code|max:20",
        "coupon.discount" => "required|max:10",
        "coupon.starts_at" => "required",
        "coupon.expires_at" => "required"
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }
    public function render()
    {
        $this->coupns = Coupon::all();
        return view('livewire.admin.products.coupons', ['coupons' => Coupon::paginate(10)])->extends("admin.master")->section('content');
    }

    public function mount()
    {
        $this->coupon = new Coupon();
    }

    public function create()
    {
        $this->validate($this->rules);
        $this->coupon->save();
        $this->reset(['coupon', 'edit']);
    }

    public function edit($id)
    {
        $this->coupon = Coupon::find($id);
        $this->edit = true;
    }

    public function update()
    {
        $this->validate($this->rules);
        $this->coupon->save();
        $this->reset(['coupon', 'edit']);
    }

    public function delete($id)
    {
        Coupon::destroy($id);
    }
}
