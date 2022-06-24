<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->integer("num_of_hours");
            $table->integer("category_id")->unsigned();
            $table->integer("teacher_id")->unsigned();
            $table->timestamps();
//            $table->foreign("teacher_id")->references("id")
//                ->on("teacher")->references("id")->cascadeOnDelete();
////
            $table->foreign("category_id")->references("id")
                ->on("categories")->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }

};
