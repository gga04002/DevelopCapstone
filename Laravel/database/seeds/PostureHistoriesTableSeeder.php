<?php

use Illuminate\Database\Seeder;

class PostureHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tenMin = 0;

      for($i = 1; $i <= 5; $i++){
        App\PostureHistory::create([
          'user_id' => 1,
          'good_time' => 120,
          'cross_left_leg_time' => 120,
          'cross_right_leg_time' => 60,
          'edge_lean_time' => 60,
          'lean_toward_time' => 60,
          'lean_left_time' => 60,
          'lean_right_time' => 120,
          'timestamp' => '2020-05-10 09:'.$tenMin.':00',
        ]);
        $tenMin +=10;
      }
      
      $tenMin = 0;

      for($i = 1; $i <= 5; $i++){
        App\PostureHistory::create([
          'user_id' => 1,
          'good_time' => 120,
          'cross_left_leg_time' => 120,
          'cross_right_leg_time' => 60,
          'edge_lean_time' => 60,
          'lean_toward_time' => 60,
          'lean_left_time' => 60,
          'lean_right_time' => 120,
          'timestamp' => '2020-05-10 10:'.$tenMin.':00',
        ]);
        $tenMin +=10;
      }

      $tenMin = 0;

      for($i = 1; $i <= 5; $i++){
        App\PostureHistory::create([
          'user_id' => 1,
          'good_time' => 120,
          'cross_left_leg_time' => 120,
          'cross_right_leg_time' => 60,
          'edge_lean_time' => 60,
          'lean_toward_time' => 60,
          'lean_left_time' => 60,
          'lean_right_time' => 120,
          'timestamp' => '2020-05-10 11:'.$tenMin.':00',
        ]);
        $tenMin +=10;
      }

      $tenMin = 0;

      for($i = 1; $i <= 5; $i++){
        App\PostureHistory::create([
          'user_id' => 1,
          'good_time' => 120,
          'cross_left_leg_time' => 120,
          'cross_right_leg_time' => 60,
          'edge_lean_time' => 60,
          'lean_toward_time' => 60,
          'lean_left_time' => 60,
          'lean_right_time' => 120,
          'timestamp' => '2020-05-10 12:'.$tenMin.':00',
        ]);
        $tenMin +=10;
      }

      $tenMin = 0;

      for($i = 1; $i <= 5; $i++){
        App\PostureHistory::create([
          'user_id' => 1,
          'good_time' => 120,
          'cross_left_leg_time' => 120,
          'cross_right_leg_time' => 60,
          'edge_lean_time' => 60,
          'lean_toward_time' => 60,
          'lean_left_time' => 60,
          'lean_right_time' => 120,
          'timestamp' => '2020-05-10 13:'.$tenMin.':00',
        ]);
        $tenMin +=10;
      }

    }
}
