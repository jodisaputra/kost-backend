<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boarding_id');
            $table->string('name');
            $table->enum('status', ['available', 'not_available']);
            $table->bigInteger('price');
            $table->timestamps();
        });

        Schema::table('boarding_rooms', function(Blueprint $table){
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
        Schema::dropIfExists('boarding_rooms');
    }
}
