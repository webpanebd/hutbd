<?php

namespace Database\Seeders;

use App\Models\SocialIcon;
use Illuminate\Database\Seeder;

class SocialIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $icons = [
            [
                "icon" => "facebook",
                "link" => "#",
            ],
            [
                "icon" => "twitter",
                "link" => "#",
            ],
            [
                "icon" => "linkedin",
                "link" => "#",
            ],
            [
                "icon" => "pinterest",
                "link" => "#",
            ],
        ];
        foreach ($icons as $icon) {
            SocialIcon::create([
                "icon" => $icon['icon'],
                "link" => $icon["link"]
            ]);
        }
    }
}
