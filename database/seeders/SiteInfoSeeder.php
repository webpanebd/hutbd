<?php

namespace Database\Seeders;


use App\Models\SiteInfo;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\ProductSettings;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteInfo::create(
            [
                "name" => config("app.name"),
            ]
        );
        Category::create([
            "name" => "Uncategorized",
            "slug" => "uncategorized",
            "image" => "",
        ]);

        ProductSettings::create([
            "page_banner" => null,
            "currency" => "TK.",
            "default_shipping_cost" => 0
        ]);
    }
}
