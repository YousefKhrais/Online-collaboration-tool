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
        Schema::table("teacher",function (Blueprint $table){
            $table->string("image")->nullable(false);
            $table->string("facebook")->nullable(true);
            $table->string("twitter")->nullable(true);
            $table->string("instagram")->nullable(true);
            $table->string("linkedin")->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("teacher",function (Blueprint $tabla){
            $tabla->dropColumn("image") ;
            $tabla->dropColumn("facebook") ;
            $tabla->dropColumn("twitter") ;
            $tabla->dropColumn("instagram") ;
            $tabla->dropColumn("linkedin") ;
        });
    }
};
