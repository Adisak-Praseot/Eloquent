<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    // กำหนดว่า factory นี้จะใช้กับโมเดล Customer
    protected $model = Customer::class;

    /**
     * กำหนดค่าของแต่ละฟิลด์ในตาราง customers สำหรับการทดสอบ
     */
    public function definition()
    {
        return [
            // การสุ่มชื่อของลูกค้า
            'name' => $this->faker->name(),
            // การสุ่มอีเมลที่ไม่ซ้ำกันสำหรับลูกค้า
            'email' => $this->faker->unique()->safeEmail(),
            // การสุ่มหมายเลขโทรศัพท์ของลูกค้า
            'phone' => $this->faker->phoneNumber(),
            // การสุ่มที่อยู่ของลูกค้า
            'address' => $this->faker->address(),
        ];
    }
}
