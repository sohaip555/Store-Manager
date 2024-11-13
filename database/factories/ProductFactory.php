<?php

namespace Database\Factories;

use App\Models\brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'brand_id' => brand::factory(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1000, 999999),
            'item_code' => $this->faker->numberBetween(1000, 999999),
            'quantity' => $this->faker->numberBetween(1000, 999999),
            'url' => $this->faker->url(),
            'status' => $this->faker->randomElements(['delivery', 'arrived']),

        ];
    }
}
