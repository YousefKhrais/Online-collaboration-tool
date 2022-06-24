<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\course;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\course>
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
            'title'=>$this->faker->title,
            'num_of_hours'=>$this->faker->numberBetween(10,100),
            'category_id'=>$this->faker->numberBetween(1,category::all()->count()),
            'teacher_id'=>$this->faker->numberBetween(1,teacher::all()->count()),
            'image'=>'https://source.unsplash.com/random',
            'description'=>$this->faker->sentence,
            'price'=>$this->faker->numberBetween(100,1000),
            ];
    }

}
