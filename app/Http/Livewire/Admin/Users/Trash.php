<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
class Trash extends Component
{
    use WithPagination;
    public $role;
    protected $paginationTheme="bootstrap";
    public $search_by="id",$search_term;
    public function render()
    {
        $search_term= '%'.$this->search_term.'%';
        $search_by=$this->search_by;
        return view('livewire.admin.users.trash',['users'=>User::role($this->role)->where($search_by,"like",$search_term)->onlyTrashed()->paginate(10)])->extends("admin.master")->section('content');
    }

   public function mount($role){
        if(!in_array($role,Role::all()->pluck(['name'])->toArray())){
            abort(404);
        }
        $this->role=$role;
    }

    public function permanentDelete($id){
        $user=User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
    }

    public function restore($id){
        $user=User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect(route("users.role",['role'=>$this->role]));
    }
}
