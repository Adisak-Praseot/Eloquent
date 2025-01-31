<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;   // เพิ่มการใช้งานโมเดล Product
use App\Models\Customer;  // เพิ่มการใช้งานโมเดล Customer
use App\Models\Order;     // เพิ่มการใช้งานโมเดล Order
use App\Models\OrderDetail; // เพิ่มการใช้งานโมเดล OrderDetail

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // สร้างข้อมูลสินค้า
        Product::factory(10)->create();

        // สร้างข้อมูลลูกค้า
        Customer::factory(5)->create();

        // สร้างข้อมูลคำสั่งซื้อ
        Order::factory(3)->create();

        // สร้างข้อมูลรายละเอียดคำสั่งซื้อ
        OrderDetail::factory(10)->create();
    }
}
