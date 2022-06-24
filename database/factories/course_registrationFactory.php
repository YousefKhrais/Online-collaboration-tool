<?php

namespace Database\Factories;

use App\Models\course;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\course_registration>
 */
class course_registrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "course_id"=>$this->faker->numberBetween(1,course::all()->count()),
            "teacher_id"=>$this->faker->numberBetween(1,teacher::all()->count()),
            "student_ID"=>$this->faker->numberBetween(1,student::all()->count())
        ];
    }
}
