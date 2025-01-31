<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    // กำหนดว่า factory นี้จะใช้กับโมเดล Booking
    protected $model = Booking::class;

    /**
     * กำหนดค่าของแต่ละฟิลด์ในตาราง bookings สำหรับการทดสอบ
     */
    public function definition()
    {
        return [
            // การสุ่ม customer_id จากลูกค้าที่ยังมีอยู่ หรือสร้าง customer ใหม่หากไม่มี
            'customer_id' => Customer::inRandomOrder()->first()->id ?? Customer::factory(),
            // การสุ่ม room_id จากห้องที่มีอยู่ หรือสร้างห้องใหม่หากไม่มี
            'room_id' => Room::inRandomOrder()->first()->id ?? Room::factory(),
            // การสุ่มวันที่เช็คอิน
            'check_in_date' => $this->faker->date(),
            // การสุ่มวันที่เช็คเอาท์
            'check_out_date' => $this->faker->date(),
        ];
    }
}
