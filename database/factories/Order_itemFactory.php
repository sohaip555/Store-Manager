<?php

namespace Database\Factories;

use App\Models\order;
use App\Models\Order_item;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order_item>
 */
class Order_itemFactory extends Factory
{
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
