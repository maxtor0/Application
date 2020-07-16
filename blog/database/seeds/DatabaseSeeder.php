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
        // $this->call(UserSeeder::class);

        //create 10 users with 10 posts for each user//
        factory('App\User',10)->create()->each(function($user){
            $user->posts()->save(factory('App\Post')->make());
        });
    }
}
