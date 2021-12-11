<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            "admin", "editor", "customer", "seller"
        ];
        for ($i = 0; $i < 50; $i++) {
            $user = User::factory()->create();
            $user->assignRole($roles[random_int(0, 3)]);
        }
    }
}
