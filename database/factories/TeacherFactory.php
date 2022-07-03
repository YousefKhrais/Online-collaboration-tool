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
            'image_link' => 'https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png',
            'description' => $this->faker->realText(),

            'linkedin' => "linkedin",
            'twitter' => "website",
            'instagram' => "instagram",
            'facebook' => "facebook",

            'courses_count' => 0,
            'requests_count' => 0,

            'interests'=>json_encode(['1'=>'ai' , '2'=>'data science']),

            'remember_token' => Str::random(10)
        ];
    }

}
