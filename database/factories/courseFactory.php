<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class courseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            "title"=>$this->faker->title,
            "description"=>$this->faker->sentence,
            'image_link' => 'https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png',
            "price"=>$this->faker->numberBetween(100,1000),
            "num_of_hours"=>$this->faker->numberBetween(200,1521),
            "students_count"=>0,
            "teacher_id"=>$this->faker->numberBetween(1,Teacher::all()->count()),
            "category_id"=>$this->faker->numberBetween(1,Category::all()->count()),
        ];
        
    }
}
