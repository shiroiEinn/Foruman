<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
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
        $faker = Faker::create();
        foreach(range(1,3) as $index)
        {
            $name = $faker->firstName();
            DB::table('users')->insert([
                'role' => 'user',
                'username' => $name,
                'gender' => 'male',
                'email' => $name.'@gmail.com',
                'password' => bcrypt('pass'),
                'phone' => '4567890678',
                'address' => $faker->address(),
                'upvote' => 0,
                'downvote' => 0,
                'image_url' => 'asd.jpg',
                'dob' => Carbon::parse('2000-01-01'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
    
            ]);
        }
        
    }
}
