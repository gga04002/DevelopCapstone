<?php

use Illuminate\Database\Seeder;

class DailyPostureHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // 애초에 이것만 가지고 통계를 낼 수 있나..? 
      // => 아니지.. 애초에 이 데일리포스쳐히스토리 테이블은 일주일/한달치 통계 쉽게 내기 위함이기때문에
      // 하루치 통계 낼 때 각 시간대별 분석 리포트는 그냥 포스쳐 히스토리 테이블로 해결보는 거지

      for($i = 1; $i < 31; $i++){
        App\DailyPostureHistory::create([
          'user_id' => 1,
          'date' => '2020/05/'.$i,
          'good_time' => 7000,
          'cross_left_leg_time' => 10800,
          'cross_right_leg_time' => 3600,
          'edge_lean_time' => 2400,
          'lean_toward_time' => 7200,
          'lean_left_time' => 600,
          'lean_right_time' => 600,
        ]);
      }
    }
}
