<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            "weight" => "text",
            "color" => "select",
            "size" => 'text',
            "length" => "text",
            "width" => "text",
            "height" => "text"
        ];
        foreach ($attributes as $attribute => $type) {
            Attribute::create([
                "name" => $attribute,
                "type" => $type
            ]);
        }
    }
}
