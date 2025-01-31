<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Booking;

class RoomSeeder extends Seeder
{
    public function run()
    {
        RoomType::factory(5)->create();  // สร้าง RoomType 5 รายการ
        Customer::factory(10)->create();  // สร้าง Customer 10 รายการ
        Room::factory(20)->create();  // สร้าง Room 20 รายการ
        Booking::factory(30)->create();  // สร้าง Booking 30 รายการ
    }
}
