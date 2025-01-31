<?php

namespace Database\Factories;

use App\Models\Register;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegisterFactory extends Factory
{
    protected $model = Register::class;

    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
        ];
    }
}
