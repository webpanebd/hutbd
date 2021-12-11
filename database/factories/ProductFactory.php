<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    protected $model = Product::class;


    public function definition()
    {
        $name = $this->faker->word();
        return [
            "name" => $name,
            "slug" => uniqid() . "-" . Str::slug($name),
            "unit_price" => $this->faker->numberBetween(5, 10000),
            "tax" => $this->faker->numberBetween(0, 20),
            "discount" => $this->faker->numberBetween(0, 20),
            "shipping_cost" => $this->faker->numberBetween(0, 100),
            "ratings" => $this->faker->numberBetween(0, 100),
            "hasReview" => $this->faker->boolean(),
            "isActive" => $this->faker->boolean(),
            "category_id" => $this->faker->numberBetween(1, 8),
            "subcategory_id" => $this->faker->numberBetween(1, 200),
            "brand_id" => $this->faker->numberBetween(1, 5),
            "seller_id" => $this->faker->numberBetween(1, 50),
            "featured_image" => $this->faker->imageUrl(),
            "available" => $this->faker->numberBetween(1, 5),
            "description" => $this->faker->realText(),


        ];
    }
}
