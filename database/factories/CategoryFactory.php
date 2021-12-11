<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = [
            "Electronics", "Sports", "Fashions", "Vegetables", "Meats", "Toys", "Fruits", "Bags", "Oils", "Grocery"
        ];
        return [
            "name" => $this->faker->word(),
            "image" => $this->faker->imageUrl(),
            "slug" => $this->faker->slug(),
        ];
    }
}
