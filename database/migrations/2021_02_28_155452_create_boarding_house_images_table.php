<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingHouseImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_house_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boarding_id');
            $table->string('image');
            $table->timestamps();
        });

        Schema::table('boarding_house_images', function(Blueprint $table) {
            $table->foreign('boarding_id')
                ->references('id')
                ->on('boarding_houses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boarding_house_images');
    }
}
