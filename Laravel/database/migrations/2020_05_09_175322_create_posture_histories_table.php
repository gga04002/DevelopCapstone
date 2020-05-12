<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostureHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posture_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('good_time');
            $table->unsignedBigInteger('cross_left_leg_time');
            $table->unsignedBigInteger('cross_right_leg_time');
            $table->unsignedBigInteger('edge_lean_time');
            $table->unsignedBigInteger('lean_toward_time');
            $table->unsignedBigInteger('lean_left_time');
            $table->unsignedBigInteger('lean_right_time');
            $table->timestamp('timestamp');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posture_histories');
    }
}
