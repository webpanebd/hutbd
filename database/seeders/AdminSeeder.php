<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class AdminSeeder extends Seeder
{

    public function run()
    {
        User::create([
            "name"=>"Mr Admin",
            "email"=>"admin@gmail.com",
            "password"=>bcrypt("123456"),
            "avatar"=>createDefaultAvatar("Mr Admin")
        ])->assignRole('admin');
        $permissions=Permission::all();
         $role = Role::findByName('admin');            
        foreach($permissions as $permission){
            $role->givePermissionTo($permission->name);
        }
    }
}
