<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 500), // ราคาสินค้าระหว่าง 10-500
            'stock' => $this->faker->numberBetween(0, 100),   // จำนวนสินค้าระหว่าง 0-100
        ];
    }
}
