<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,30) as $index) {
            DB::table('forums')->insert([
                'userid' => $faker->numberBetween(1,3),
                'postname' => $faker->realText(20),
                'categoryid' => $faker->numberBetween(1,4),
                'postdesc' => $faker->realText(100),
                'poststatus' => 'open',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        
        foreach (range(1,4) as $index) {
            DB::table('categories')->insert([
                'categoryname' => $faker->word,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        
    }
}
