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


        App\User::create([
        	'name' => 'Gus',
        	'email' => 'admin@gymgram.link',
        	'password' => bcrypt('654321')
        ]);

        factory(App\Post::class, 3)->create();
    }
}
