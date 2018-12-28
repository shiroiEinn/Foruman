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
    	foreach (range(1,10) as $index) {
            DB::table('forums')->insert([
                'userid' => '1',
                'postname' => $faker->realText(20),
                'categoryid' => $faker->numberBetween(1,2),
                'postdesc' => $faker->realText(100),
                'poststatus' => 'open',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        
        foreach (range(1,2) as $index) {
            DB::table('categories')->insert([
                'categoryname' => $faker->word,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        
    }
}
