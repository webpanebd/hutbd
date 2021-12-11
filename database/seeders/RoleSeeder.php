<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            "admin","editor","customer","seller"
        ];
        foreach($roles as $role){
            Role::create(["name"=>$role]);
        }
    }
}
