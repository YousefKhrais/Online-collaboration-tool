<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();
            $table->string('password');

            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->integer('phone_number');

            $table->date('date_of_birth');
            $table->boolean('status')->default(true);
            $table->boolean('gender');
            $table->string('address');
            $table->string('image_link')->nullable(false)->default("img/user.png");

            $table->string("facebook")->nullable(true);
            $table->string("twitter")->nullable(true);
            $table->string("instagram")->nullable(true);
            $table->string("linkedin")->nullable(true);

            $table->integer('courses_count')->default(0);
            $table->integer('requests_count')->default(0);

            $table->text("description")->nullable(true);
            $table->json('interests')->nullable(true);

            $table->string("remember_token")->nullable(true);

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
        Schema::dropIfExists('teachers');
    }
}
