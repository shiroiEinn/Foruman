<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'role' => 'user',
            'username' => 'tester',
            'gender' => 'male',
            'email' => 'tester@gmail.com',
            'password' => bcrypt('pass'),
            'phone' => '4567890678',
            'address' => 'sdfsdfsdfsfsfs',
            'upvote' => 0,
            'downvote' => 0,
            'image_url' => 'asd.jpg',
            'dob' => Carbon::parse('2000-01-01'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()

        ]);
    }
}
