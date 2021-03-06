<?php

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
         $this->call(UserSeeder::class);
         $this->call(ForumSeeder::class);
         $this->call(ThreadsSeeder::class);
         $this->call(RoleSeeder::class);
    }
}
