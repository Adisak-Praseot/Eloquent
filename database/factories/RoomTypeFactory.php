<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
{
    // กำหนดว่า factory นี้จะใช้กับโมเดล RoomType
    protected $model = RoomType::class;

    /**
     * กำหนดค่าของแต่ละฟิลด์ในตาราง room_types สำหรับการทดสอบ
     */
    public function definition()
    {
        return [
            // การสุ่มชื่อประเภทห้อง
            'type_name' => $this->faker->word(),
            // การสุ่มคำอธิบายประเภทห้อง
            'description' => $this->faker->sentence(),
        ];
    }
}
