<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\Expr\Array_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\teacher>
 */
class teacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->sentence(),
            'interests'=>json_encode(['1'=>'ai' , '2'=>'data science']),
            'profile_image'=>'https://source.unsplash.com/random',
            'facebook'=>$this->faker->randomElement([null,"https://www.facebook.com"]),
            'twitter'=>$this->faker->randomElement([null,"https://www.twitter.com"]),
            'instagram'=>$this->faker->randomElement([null,"https://www.instagram.com"]),
            'linkedin'=>$this->faker->randomElement([null,"https://www.linkedin.com"]),
        ];
    }

}
