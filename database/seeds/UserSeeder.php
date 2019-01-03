<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,5) as $index)
        {
            $name = $faker->firstName();
            DB::table('users')->insert([
                'roleid' => '1',
                'username' => $name,
                'gender' => 'male',
                'email' => $name.'@gmail.com',
                'password' => bcrypt('pass'),
                'phone' => '4567890678',
                'address' => $faker->address(),
                'image_url' => 'asd.jpg',
                'dob' => Carbon::parse('2000-01-01'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
    
            ]);
        }

            DB::table('users')->insert([
                'roleid' => '2',
                'username' => 'admin',
                'gender' => 'male',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('pass'),
                'phone' => '4567890678',
                'address' => $faker->address(),
                'image_url' => 'asd.jpg',
                'dob' => Carbon::parse('2000-01-01'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
    
            ]);
        
    }
}
