<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('image_link')->nullable(false)->default("https://dashboard.programming-mentor.site/Home/assets/img/course-2.jpg");
            $table->integer("price")->nullable(false);
            $table->integer('num_of_hours')->nullable(false);//Credits (hours)
            $table->integer('students_count')->default(0);

            $table->integer('teacher_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->json("schedule")->nullable(true);
            $table->json("requirements")->nullable(true);
            $table->json("syllabus")->nullable(true);
            $table->json("outline")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
