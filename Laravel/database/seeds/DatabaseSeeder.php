<?php

use App\DailyPostureHistory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PostureHistoriesTableSeeder::class);
        $this->call(DailyPostureHistoriesTableSeeder::class);
        // $this->call(ChallengesTableSeeder::class);
    }
}
