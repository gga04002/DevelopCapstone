<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\User::create([
        'name' => '이혜진',
        'email' => '2hj@waistand.com',
        'pwd' => 'password',
        'gender' => 'female',
        'birth' => '1999/09/22'
      ]);
    }
}
