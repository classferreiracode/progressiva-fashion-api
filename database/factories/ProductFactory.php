<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(10),
            'slug' => fake()->unique->slug(),
            'category_id' => fake()->randomNumber(),
            'featured' => fake()->boolean(),
            'description' => fake()->sentence(15),
            'price_regular' => fake()->randomFloat(2, 0, 9999),
            'price_sale' => fake()->randomFloat(2, 0, 9999),
            'external_link' => fake()->text(255),
            'status' => fake()->word(),
            'deleted_at' => fake()->dateTime(),
        ];
    }
}
