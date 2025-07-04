<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => fake()->text(255),
            'answer' => fake()->text(255),
            'status' => fake()->word(),
        ];
    }
}
