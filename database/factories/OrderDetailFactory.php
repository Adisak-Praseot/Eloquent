<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    protected $model = OrderDetail::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(), // เชื่อมกับ Order
            'product_id' => Product::factory(), // เชื่อมกับ Product
            'quantity' => $this->faker->numberBetween(1, 5),
            'subtotal' => function (array $attributes) {
                $product = Product::find($attributes['product_id']);
                return $product ? $product->price * $attributes['quantity'] : 0;
            },
        ];
    }

}
