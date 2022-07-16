<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Array_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->numberBetween(0,10),

            'date_of_birth' => $this->faker->date(),
            'status' => 1,
            'gender' => 0,
            'address' => $this->faker->address(),
            'image_link' => 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp',
            'description' => $this->faker->realText(),

            'linkedin' => "https://github.com/YousefKhrais",
            'stack_overflow' => "https://github.com/YousefKhrais",
            'github' => "https://github.com/YousefKhrais",

            'courses_count' => 0,
            'requests_count' => 0,
            
            'interests'=>json_encode(['1'=>'ai' , '2'=>'data science']),

            'remember_token' => Str::random(10)
        ];
    }

}
