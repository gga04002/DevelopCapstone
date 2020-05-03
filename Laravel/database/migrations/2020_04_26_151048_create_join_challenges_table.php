<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_challenges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challenge_id');
            $table->unsignedBigInteger('user_id');
            $table->date('start_date'); //챌린지 시작 날짜
            $table->date('end_date'); //챌린지 마지막 날짜
            // $table->unsignedBigInteger('term');
            $table->unsignedBigInteger('entry_fee')->nullable(); // 참가비

            $table->bigInteger('good_rate')->nullable();// 오늘 바른자세 비율; 자세이력 테이블을 참조하여 쿼리조작으로 나온 결과값
            $table->bigInteger('achivement_rate')->nullable(); // 현재까지 달성률; 전체기간을 기준으로 지금까지 바른자세 달성한 날짜가 얼마나 몇% 되는지를 계산함

            $table->timestamps(); // 추가/갱신 날짜

            $table->foreign('challenge_id')->references('id')->on('challenges')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_challenges');
    }
}
