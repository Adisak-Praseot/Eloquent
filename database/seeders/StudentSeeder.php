<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Register;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Teacher::factory(5)->create();
        Course::factory(10)->create();
        Student::factory(20)->create();

        // สร้างการลงทะเบียนนักศึกษา
        Register::factory(20)->create();
    }
}
