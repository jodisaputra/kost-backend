<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boarding_id');
            $table->integer('rate');
            $table->text('comment');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });

        Schema::table('reviews', function(Blueprint $table) {
            $table->foreign('boarding_id')
                ->references('id')
                ->on('boarding_houses')
                ->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
