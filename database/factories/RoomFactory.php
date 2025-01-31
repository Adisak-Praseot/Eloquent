<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    // กำหนดว่า factory นี้จะใช้กับโมเดล Room
    protected $model = Room::class;

    /**
     * กำหนดค่าของแต่ละฟิลด์ในตาราง rooms สำหรับการทดสอบ
     */
    public function definition()
    {
        return [
            // การสุ่ม room_type_id จากประเภทห้องที่มีอยู่ หรือสร้าง room_type ใหม่หากไม่มี
            'room_type_id' => RoomType::inRandomOrder()->first()->id ?? RoomType::factory(),
            // การสุ่มหมายเลขห้องที่เป็นตัวเลข เช่น 100 ถึง 999
            'room_number' => $this->faker->numberBetween(100, 999),
            // การสุ่มสถานะของห้อง (สามารถเป็น available, booked, หรือ maintenance)
            'status' => $this->faker->randomElement(['available', 'booked', 'maintenance']),
        ];
    }
}
