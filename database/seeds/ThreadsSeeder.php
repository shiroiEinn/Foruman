<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ThreadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,35) as $index)
        {
            $name = $faker->firstName();
            DB::table('threads')->insert([
                'forumid' => $faker->numberBetween(1,7),
                'userid' => $faker->numberBetween(1,3),
                'thread' => $faker->realText(20),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
    
            ]);
        }
        
    }
}
