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
            'userid' => 1,
            'role' => 'user',
            'name' => 'tester',
            'email' => 'tester@gmail.com',
            'password' => bcrypt('pass'),
            'phone' => '4567890678',
            'address' => 'sdfsdfsdfsfsfs',
            'upvote' => 0,
            'downvote' => 0,
            'dob' => Carbon::parse('2000-01-01')

        ]);
    }
}
