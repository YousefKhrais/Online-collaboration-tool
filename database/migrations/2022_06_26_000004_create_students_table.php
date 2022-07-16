<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->date('date_of_birth')->nullable(true);;
            $table->boolean('status')->default(true);
            $table->boolean('gender');

            $table->string('image_link')->nullable(false)->default("https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp");
            $table->string("description")->nullable(true);

            $table->string("linkedin")->nullable(true);
            $table->string("stack_overflow")->nullable(true);
            $table->string("github")->nullable(true);

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
        Schema::dropIfExists('students');
    }
}
