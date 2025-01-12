<?php

namespace Database\Seeders;

use App\Models\customer;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        $order_item = order_item::factory(500)->create();
        Customer::factory(3000)->has(order::factory(4)->recycle($order_item))->create();
        product::factory(10)->create();


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
