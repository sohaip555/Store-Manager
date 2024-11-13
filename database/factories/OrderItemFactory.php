<?php

namespace Database\Factories;

use App\Models\order;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order_item>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'quantity' => $this->faker->randomDigit(),
            'total_price' => $this->faker->randomDigit(),
            'order_id' => Order::factory(),
        ];
    }
}
