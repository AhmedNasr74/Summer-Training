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
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class , 100)->create();
        // factory(\App\Training::class , 50)->create();
        // factory(\App\TrainingRequirments::class , 100)->create();
    }
}
