<?php
namespace Database\Seeders;

use App\Models\course_registration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class course_registration_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        course_registration::factory()->count(3)->create();
    }

}
