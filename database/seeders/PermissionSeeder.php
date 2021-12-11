<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            "user", "product", "category", "subcategory", "brand", "coupon", "attribute"
        ];
        foreach ($permissions as $permission) {
            foreach (["create", "view", "edit", "delete"] as $option) {
                Permission::create([
                    "name" => $option . "-" . $permission
                ]);
            }
        }
    }
}
