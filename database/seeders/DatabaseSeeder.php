<?php

namespace Database\Seeders;

use Database\Factories\categoryFactory;
use Database\Factories\course_registrationFactory;
use Database\Factories\courseFactory;
use Database\Factories\studentFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            category::class,
            teacher::class,
            studentSeeder::class,
        ]);

    }
}
