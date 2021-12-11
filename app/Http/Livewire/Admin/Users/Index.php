<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    public $role;
    protected $paginationTheme="bootstrap";
    public $search_by="id",$search_term,$no_of_trashed_user;
    
    public function render()
    {
        $search_term= '%'.$this->search_term.'%';
        $search_by=$this->search_by;
         $this->no_of_trashed_user=User::role($this->role)->onlyTrashed()->count();
        return view('livewire.admin.users.index',['users'=>User::role($this->role)->where($search_by,"like",$search_term)->paginate(10)])->extends("admin.master")->section('content');
    }

    public function mount($role){
        if(!in_array($role,Role::all()->pluck(['name'])->toArray())){
            abort(404);
        }
        $this->role=$role;

       
    }

    public function delete($id){
        User::destroy($id);
    }
}
