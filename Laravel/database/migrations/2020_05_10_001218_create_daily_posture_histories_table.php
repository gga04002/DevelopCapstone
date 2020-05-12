<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyPostureHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // 하루마다의 총 자세 이력 테이블을 만든 이유 : 일주일, 한달 통계낼 때 간편하라고
        Schema::create('daily_posture_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->unsignedBigInteger('good_time');
            $table->unsignedBigInteger('cross_left_leg_time');
            $table->unsignedBigInteger('cross_right_leg_time');
            $table->unsignedBigInteger('edge_lean_time');
            $table->unsignedBigInteger('lean_toward_time');
            $table->unsignedBigInteger('lean_left_time');
            $table->unsignedBigInteger('lean_right_time');
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
        Schema::dropIfExists('daily_posture_histories');
    }
}
